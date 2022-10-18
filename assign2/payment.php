<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="GOI Cinemas - Payment" />
    <meta name="keywords" content="HTML,CSS,Javascript" />
    <meta name="author" content="Gang of Islands" />
    <link rel="stylesheet" href="./styles/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>GOI Cinemas - Payment</title>
</head>

<body>
    <?php include_once 'includes/menu.php'; ?>

    <div id="paymentContainer">
        <form id="paymentForm" method='post' action="process_order.php" novalidate>
        <h3>Select Tickets</h3>

        <?php       
            $movie = $_GET['movie'];
            $isBulletTrain = $movie == 'bullet_train' ? "selected" : "";
            $isThor = $movie == 'thor' ? "selected" : "";
            $isTopgun = $movie == 'topgun' ? "selected" : "";
            $isAvatar = $movie == 'avatar' ? "selected" : "";
            $isPaws = $movie == 'paws_of_fury' ? "selected" : "";
            $isBlackPanther = $movie == 'black_panther' ? "selected" : "";

            echo "<label for='products'>Movies </label>";
            echo "<select name='products' id='products'>";
            echo "<option value='P1' $isBulletTrain>Bullet Train</option>";
            echo "<option value='P2' $isThor>Thor: Love and Thunder</option>";
            echo "<option value='P3' $isTopgun>Topgun: Maverick</option>";
            echo "<option value='P4' $isAvatar>Avatar the Way of Water</option>";
            echo "<option value='P5' $isPaws>Paws of Fury</option>";
            echo "<option value='P6' $isBlackPanther>Black Panther</option>";
            echo "</select>";
        ?>

            <label for="options">Ticket type </label>
            <select name="options" id="options">
                <option value="Adults" selected>Adults $20</option>
                <option value="Seniors">Seniors $15</option>
                <option value="Children">Children $10</option>
            </select>

            <label for="tickets">Quantity </label>
            <input type="text" name="tickets" id="tickets" pattern="[0-9]" placeholder="1" />
        
        <h3>Billing Address</h3>
            <label for="firstname">First Name: </label>
            <input type="text" name="firstname" id="firstname" placeholder="FirstName" />

            <label for="lastname">Last Name: </label>
            <input type="text" name="lastname" id="lastname" placeholder="LastName" />

            <label for="email">Email: </label>
            <input type="email" name="email" id="email" placeholder="name@email.com" />

            <label for="street">Street: </label>
            <input type="text" name="street" id="street" placeholder="Street Name" />

            <label for="states">State: </label>
            <select name="states" id="states">
                <option value="">Please Select</option>
                <option value="NSW">New South Wales</option>
                <option value="VIC" selected>Victoria</option>
                <option value="WA">Western Australia</option>
                <option value="TAS">Tasmania</option>
                <option value="NT">Northern Territory</option>
                <option value="ACT">Australian Capital Territory</option>
                <option value="QLD">Queensland</option>
                <option value="SA">South Australia</option>
            </select>

            <label for="postcode">Post code: </label>
            <input type="text" name="postcode" id="postcode" pattern="[0-9]{4}" placeholder="0123" />

            <label for="phone">Phone: </label>
            <input type="text" name="phone" id="phone" placeholder="0123456789" />


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
                <option value="visa" selected>Visa</option>
                <option value="mastercard">Mastercard</option>
                <option value="americanExpress">American Express</option>
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
