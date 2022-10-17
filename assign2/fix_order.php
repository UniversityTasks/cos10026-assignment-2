<?php 
session_start()
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="GOI Cinemas - Payment" />
    <meta name="keywords" content="HTML,CSS,Javascript" />
    <meta name="author" content="Gang of Islands" />
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>GOI Cinemas - Fix Order</title>
</head>

<body>
    <?php include_once 'includes/menu.php'; ?>
    <?php echo "<script type='text/javascript'>alert('Hello World');</script>"  ?>
    <div id="paymentContainer">
        <form id="paymentForm" method='post' action="process_order.php" novalidate>
        <h3>Select Tickets</h3>

        <?php       
              
            if($_SESSION["fixProducts"]  == "P1"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';
            echo "<option value='P1' selected>Bullet Train</option>";
            echo "<option value='P2' >Thor: Love and Thunder</option>";
            echo "<option value='P3' >Topgun: Maverick</option>";
            echo "<option value='P4' >Avatar the Way of Water</option>";
            echo "<option value='P5' >Paws of Fury</option>";
            echo "<option value='P6' >Black Panther</option>";
            echo "</select>";

            }
            else if($_SESSION["fixProducts"]  == "P2"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';
            echo "<option value='P1' >Bullet Train</option>";
            echo "<option value='P2' selected >Thor: Love and Thunder</option>";
            echo "<option value='P3' >Topgun: Maverick</option>";
            echo "<option value='P4' >Avatar the Way of Water</option>";
            echo "<option value='P5' >Paws of Fury</option>";
            echo "<option value='P6' >Black Panther</option>";
            echo "</select>";

            }
            else if($_SESSION["fixProducts"]  == "P3"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';
            echo "<option value='P1' >Bullet Train</option>";
            echo "<option value='P2'  >Thor: Love and Thunder</option>";
            echo "<option value='P3'selected >Topgun: Maverick</option>";
            echo "<option value='P4' >Avatar the Way of Water</option>";
            echo "<option value='P5' >Paws of Fury</option>";
            echo "<option value='P6' >Black Panther</option>";
            echo "</select>";

            }
            else if($_SESSION["fixProducts"]  == "P4"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';
            echo "<option value='P1' >Bullet Train</option>";
            echo "<option value='P2'  >Thor: Love and Thunder</option>";
            echo "<option value='P3' >Topgun: Maverick</option>";
            echo "<option value='P4' selected>Avatar the Way of Water</option>";
            echo "<option value='P5' >Paws of Fury</option>";
            echo "<option value='P6' >Black Panther</option>";
            echo "</select>";

            }
            else if($_SESSION["fixProducts"]  == "P5"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';
            echo "<option value='P1' >Bullet Train</option>";
            echo "<option value='P2'  >Thor: Love and Thunder</option>";
            echo "<option value='P3' >Topgun: Maverick</option>";
            echo "<option value='P4' >Avatar the Way of Water</option>";
            echo "<option value='P5' selected>Paws of Fury</option>";
            echo "<option value='P6' >Black Panther</option>";
            echo "</select>";

            }
            else if($_SESSION["fixProducts"]  == "P5"){
                echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo '<option value="">Please Select</option>';

            echo "<option value='P1' >Bullet Train</option>";
            echo "<option value='P2'  >Thor: Love and Thunder</option>";
            echo "<option value='P3' >Topgun: Maverick</option>";
            echo "<option value='P4' >Avatar the Way of Water</option>";
            echo "<option value='P5' selected>Paws of Fury</option>";
            echo "<option value='P6'selected >Black Panther</option>";
            echo "</select>";

            }
            else{
                echo "<label for='products'>Movies </label>";
                echo "<select name='products' id='products'>";
                echo '<option value="" selected>Please Select</option>';
                echo "<option value='P1' >Bullet Train</option>";
                echo "<option value='P2'  >Thor: Love and Thunder</option>";
                echo "<option value='P3' >Topgun: Maverick</option>";
                echo "<option value='P4' >Avatar the Way of Water</option>";
                echo "<option value='P5'>Paws of Fury</option>";
                echo "<option value='P6'>Black Panther</option>";
                echo "</select>";
    
            }
        ?>

            <label for="options">Ticket type </label>
            <select name="options" id="options">
                <option value="Adults" selected>Adults $20</option>
                <option value="Seniors">Seniors $15</option>
                <option value="Children">Children $10</option>
            </select>

            <label for="tickets">  </label>
            <input type="text" name="tickets" id="tickets" pattern="[0-9]" placeholder="1" />
        
        <h3>Billing Address</h3>
            <label for="firstname">FirstName</label>
            <?php 
            if(isset($_SESSION["fixFname"])){
                $Fname = $_SESSION["fixFname"];
            } else{
                $Fname = "";            }
            
            ?> 
            <input type="text" name="firstname" value = "<?=$Fname?>" id="firstname" placeholder="FirstName" />

            <label for="lastname">LastName</label>
            <?php 
            if(isset($_SESSION["fixLname"])){
                $Lname = $_SESSION["fixLname"];
            } else{
                $Lname = "";
            }
            
            ?>
            <input type="text" name="lastname" value = "<?=$Lname?>" id="lastname" placeholder="LastName" />

            <label for="email">Email</label>
            <?php 
            if(isset($_SESSION["fixEmail"])){
              $email = $_SESSION["fixEmail"];
            } else{
                $email = "";
            }
            
            ?>
            <input type="email" name="email" value = "<?=$email?>"  id="email" placeholder="name@email.com" />

            <label for="street">Street</label>
            <?php 
            if(isset(  $_SESSION["fixStreet"])){
                   $street = $_SESSION["fixStreet"];

            } else{
                $street = "";
            }
            ?>
            <input type="text" name="street" value = "<?=$street?>" id="street" placeholder="Street Name" />

            <label for="states">State: </label>
            <select name="states" id="states">
               <?php 
              if($_SESSION["fixStates"] == "NSW"){
                echo '<option value="">Please Select</option>';
                echo '<option value="NSW" selected>New South Wales</option>';
                echo '<option value="VIC">Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD">Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }else if($_SESSION["fixStates"] == "VIC"){
                echo '<option value="">Please Select</option>';
                echo '<option value="NSW" >New South Wales</option>';
                echo '<option value="VIC" selected>Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD">Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "WA"){
                echo '<option value="">Please Select</option>';
                echo '<option value="NSW" >New South Wales</option>';
                echo '<option value="VIC" >Victoria</option>';
                echo '<option value="WA" selected>Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD">Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "TAS"){
                echo '<option value="">Please Select</option>';
                echo '<option value="NSW" >New South Wales</option>';
                echo '<option value="VIC" >Victoria</option>';
                echo '<option value="WA" >Western Australia</option>';
                echo '<option value="TAS" selected>Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD">Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "NT"){
                echo '<option value="">Please Select</option>';

                echo '<option value="NSW" >New South Wales</option>';
                echo '<option value="VIC" >Victoria</option>';
                echo '<option value="WA" >Western Australia</option>';
                echo '<option value="TAS" >Tasmania</option>';
                echo '<option value="NT" selected>Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD">Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "ACT"){
                echo '<option value="">Please Select</option>';

                echo '<option value="NSW">New South Wales</option>';
                echo '<option value="VIC">Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT" selected>Australian Capital Territory</option>';
                echo  '<option value="QLD>Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "QLD"){
                echo '<option value="">Please Select</option>';
                echo '<option value="NSW">New South Wales</option>';
                echo '<option value="VIC">Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD selected>Queensland</option>';
                echo '<option value="SA">South Australia</option>';
            }
            else if($_SESSION["fixStates"] == "SA"){
                echo '<option value="">Please Select</option>';

                echo '<option value="NSW">New South Wales</option>';
                echo '<option value="VIC">Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD>Queensland</option>';
                echo '<option value="SA" selected>South Australia</option>';
            }
              else{
                echo '<option value="" selected>Please Select</option>';
                echo '<option value="NSW">New South Wales</option>';
                echo '<option value="VIC">Victoria</option>';
                echo '<option value="WA">Western Australia</option>';
                echo '<option value="TAS">Tasmania</option>';
                echo '<option value="NT">Northern Territory</option>';
                echo' <option value="ACT">Australian Capital Territory</option>';
                echo  '<option value="QLD>Queensland</option>';
                echo '<option value="SA" >South Australia</option>';
              }
                ?>
            </select>

            <label for="postcode">PostCode</label>
            <?php if(isset( $_SESSION["fixPostcode"] )){
               $post = $_SESSION["fixPostcode"] ;
            } else{
                $post = "";
            }
            ?>
            <input type="text" name="postcode" value = "<?=$post?>" id="postcode" pattern="[0-9]{4}" placeholder="0123" />

            <label for="phone">Phone:</label>
            <?php if(isset(  $_SESSION["fixPhone"] )){
                $phone =  $_SESSION["fixPhone"] ;
            } else{
                $phone = "";
            }
            ?>
            <input type="text" name="phone"  value = "<?=$phone?>" id="phone" placeholder="0123456789" />


            <label for="contactMethod">Contact Method: </label>
            <select name="contactMethod" id="contactMethod">
                <option value="Phone" selected>Phone</option>
                <option value="Email">Email</option>
                <option value="Post">Post</option>
            </select>

            <h3>Payment</h3>

            <label for="card">Accepted Cards</label>
            <div class="icon-container">
                <i class="fa fa-cc-visa" style="color:navy;"></i>
                <i class="fa fa-cc-amex" style="color:blue;"></i>
                <i class="fa fa-cc-mastercard" style="color:red;"></i>
                <i class="fa fa-cc-discover" style="color:orange;"></i>
            </div>

            <label for="ccType">Card Type: </label>
            <select name="ccType" id="ccType">
                <option value="creditCard" selected>Credit Card</option>
                <option value="debitCard">Debit Card</option>
            </select>


            <label for="cName">Name on Card </label>
            <input type="text" name="cName" id="cName" placeholder="Name" />

            <label for="ccNum">Credit card number</label>
            <input type="text" id="ccNum" name="ccNum" placeholder="1111-2222-3333-4444">

            <label for="expmonth">Expiry Month</label>
            <select name="expmonth" id="expmonth">
                <option value="01" selected>01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
            </select>

            <label for="expyear">Expiry Year</label>
            <select name="expyear" id="expyear">
                <option value="22" selected>22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
            </select>

            <label for="cvv">CVV</label>
            <input type="text" id="cvv" name="cvv" placeholder="123">

            <label>
                <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <div class="paymentSubmitBtn">
                    <input type="submit" value="Book Now">
                </div>
        </form>
    </div>
    
    <?php include_once 'includes/footer.php'; ?>  
</body>

</html>