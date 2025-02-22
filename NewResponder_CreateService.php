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

    if(isset($_SESSION["specialization"])){
        $specialization = $_SESSION["specialization"];

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

    <script src="js/NewResponderCreateService.js"> </script>


    <title> Offer a Service </title>
</head>

<body onload="getServices()" id="Responder_CreateServiceBackground">
    <?php
                require_once("imports/ResponderNavBar.php");
    ?>
<img src="img/b.jpg" id="BodyBackgroundImg"/>


<!-- forms -->
<div id="regularServicesFormBack" class="formBack">

    <form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="regularServicesForm" class="ServicePopUp"> 
        <input type="hidden" name="formType" value="regularServices">
        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="serviceCategory" id="serviceCategoryRegular">
            <div id="closeButton" onclick="closeForms()" > X </div>
            <table>
                <tr>
     
                    <td> Service Position </td>
              
                    <td>
                        <select name="servicePosition" id="servicePositionDropDown" onchange="otherPosition()">
                            <option value="Delivery"> Delivery </option>
                        </select><br/>
                    </td>
               
                </tr>
                <tr>
                    <td>
                        Other Service Position:
                    </td>

                    <td>
                        <input name="otherServicePosition" id="otherServicePosition" type="text" placeholder="Please enter"/>
                    </td>
                </tr>

                <tr>
          
            

           
                    <td> Rate </td>
                    <td>
                        <input type="number" name="rate">
                    </td> 
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
</div>

<!-- For Pasabuy -->

<div id="pasabuyFormBack" class="formBack">
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
</div>
<!-- For other categories -->

<div id="otherCategoriesFormBack" class="formBack" style="display:grid;">
    <form action="Backend/CreateServiceBackend.php" method="post" enctype="multipart/form-data" id="otherCategoriesForm" class="ServicePopUp"> 

        <input type="hidden" name="responderID" value="<?php echo $_SESSION["userID"];?>"> 
        <input type="hidden" name="formType" value="otherCategories">

        <center> <h1> <?php echo $specialization; ?> </h1> </center>
        <div id="closeButton" onclick="closeForms()" style="display:none;"> X </div>
            <table>
                <tr style="display:none;">
                    <td> Category </td>
                    <!--<td> <input type="text" name="serviceCategory" id="serviceCategory"> </td>-->
                    <input type="hidden" name="serviceCategory" id="serviceCategory" value="<?php echo $specialization; ?>">
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
</div>


    



</body>
</html>