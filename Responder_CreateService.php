<?php 
session_start();
    if(!isset($_SESSION["userEmail"])){
        header("location:LoginForm.php?msg=Please Login First");
    }

    if(isset($_SESSION["userType"])){
        $usertype = $_SESSION["userType"];
        if($usertype != "Responder"){
            header("location: User_Profile.php?msg= Not a Reponder");
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="manifest" href="manifest.json">
    
    <meta content='yes' name='apple-mobile-web-app-capable'/>
    <meta content='yes' name='mobile-web-app-capable'/>
    

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/Responder_CreateService.css">

    <script src="js/createService.js"> </script>


    <title> Offer a Service </title>
</head>

<body onload="getServices()" id="Responder_CreateServiceBackground">
    <?php
                require_once("imports/ResponderNavBar.php");
    ?>
<img src="img/b.jpg" id="BodyBackgroundImg"/>


<!-- forms -->

    <form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="regularServicesForm" class="ServicePopUp"> 
        <input type="hidden" name="formType" value="regularServices">
        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="serviceCategory" id="serviceCategoryRegular">
            <div id="closeButton" onclick="closeForms()"> X </div>
            <table>
                <tr>
     
                    <td> Service Position </td>
              
                        <select name="servicePosition" id="servicePositionDropDown" onchange="otherPosition()">
                            <option value="Delivery"> Delivery </option>
                        </select><br/>
               
          
                        <input name="otherServicePosition" id="otherServicePosition" type="text" placeholder="Please enter"/>

           
                    <td> Rate </td>
                    <td>
                        <input type="number" name="rate">
                    </td> <br/>
                </tr>

                <tr>
                    <td>Training/Certificate</td>
                    <td> <input type="text" name="certification"> </td> <br/>
                </tr>

                <tr>
                    <td>Training/Certificate File </td>
                    <td> <input type="file" name="certificateFile"> </td><br/>
                </tr>
        
            </table>
            <br/> <br/> <br/> <br/>
        <input type="submit"/>
    </form>


<!-- For Pasabuy -->

    <form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="pasabuyForm" class="ServicePopUp"> 
        <input type="hidden" name="formType" value="pasabuy">
        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="serviceCategory" id="serviceCategory" value="Pasabuy">
        <div id="closeButton" onclick="closeForms()"> X </div>
        
        <h3> Add Item </h3>

        <table>

            <tr> 
                
                <td> Category </td>
                <td>
                    <select name="itemCategory">
                        <option value= "Groceries"> Groceries </option>
                        <option value= "FastFood"> FastFood </option>
                    </select>
                </td>

            </tr>
            <tr>
                <td> Product Name </td>
                <td> <input name="productName" type="text"/></td>
            </tr>

            <tr>
                <td> Product Brand </td>
                <td> <input name="productBrand" type="text"/></td>
            </tr>

            <tr>
                <td> Product Description </td>
                <td> <input name="productDescription" type="text"/></td>
            </tr>

            <tr>
                <td> Product Price </td>
                <td> Php <input name="productPrice" type="number"/></td>
            </tr>

            <tr>
                <td> Delivery fee </td>
                <td> <input type="number" name="rate"> </td> 
            </tr>

            <tr>
                <td> Product Picture </td>
                <td> <input name="productImage" type="file"/> </td>
            </tr>


        </table>

        <br/> <br/> <br/>
        <input type="submit">
    </form>

<!-- For other categories -->

    <form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="otherCategoriesForm" class="ServicePopUp"> 

        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="formType" value="otherCategories">
        <div id="closeButton" onclick="closeForms()"> X </div>
            <table>
                <tr>
                    <td> Category </td>
                    <td> <input type="text" name="serviceCategory" id="serviceCategory"> </td>
                </tr>

                <tr>
                    <td> Service Position </td>
                    <td> 
                        <input type="text" name="servicePosition"/>
                    </td>
                </tr>

                <tr>
                    <td> Rate </td>
                    <td> <input type="number" name="rate"> </td> 
                </tr>

                <tr>
                    <td>Training/Certificate</td>
                    <td> <input type="text" name="certification"> </td> 
                </tr>

                <tr>
                    <td>Training/Certificate File </td>
                    <td> <input type="file" name="certificateFile"> </td>
                </tr>

                <tr>
                    <td>Banner Image </td>
                    <td> <input type="file" name="bannerImage" accept="image/*"> </td>
                </tr>
        
            </table>

            <input type="submit"/>
    </form>


<!-- Main -->
<div id="Responder_CreateServiceMainBack">
    
        <br/>
            <center> <h1 id="RequestOrdersTitle"> Offer a Service</h1> </center>
        <br/>

        
 <div id="Responder_CreateServiceMain">

    <center>


        <?php
            if(isset($_GET['newUser'])){
                echo" <a href='Responder_Home.php'> <div class='createRequestButton'> Skip for now </div> <a/>";
            }
        ?>



       
            <div id="CreateServiceMainSearchContainer">
                <form method="GET" action="Backend/Get_products.php"> 
                    <button id="CreateServiceSearchButton">🔍</button>
                    <span>
                        <input type="Search" name="q" id="CreateServiceSearch">
                    </span>
                </form>
            <div>
      

    </center>
    



    <div id="createServiceMain"> 

     <ul>
        <li class="serviceCard-main" onclick="setCategory('Home Service')"> 
            <image src="img/work-icon.png" class="bannerImage"> 
            <span class="categoryTitle"> Home Services </span> 
        </li> 


        <li class="serviceCard-main" onclick="setCategory('Pasabuy')"> 
            <image src="img/work-icon.png" class="bannerImage"> 
             <span class="categoryTitle"> Pasabuy </span> 
        </li>


        <li class="serviceCard-main" onclick="setCategory('Computer related work')">
            <image src="img/work-icon.png" class="bannerImage"> 
             <span class="categoryTitle"> Computer Related </span>  
        </li>

        <li class="serviceCard-main" onclick="setCategory('Other')"> 
            <image src="img/work-icon.png" class="bannerImage"> 
             <span class="categoryTitle"> Other </span> 
        </li>
     </ul>

    </div>


    <h4> Other Services </h4>

    <div id="OtherServicesContainer">
        
    </div>

 </div>
</div>
    



</body>
</html>