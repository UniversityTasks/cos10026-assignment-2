<?php
// Start the session
session_start();
?>

<?php
error_reporting(E_ERROR | E_PARSE);
//Login 
require_once("settings.php"); //for aweb's database

//Login for testing
// $host = "localhost";
// $user = "root";
// $pwd = "";
// $dbName = "cos10026_as2";

//Create connection
$conn = @mysqli_connect($host, $user, $pwd, $dbName);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//Create table
//Change database name cos10026_as2.order for testing
$query = "CREATE TABLE s103574757_db.orders (
     order_id int(6) AUTO_INCREMENT,
     order_cost int(25) NOT NULL,
     order_time datetime default now(),
     order_status varchar(255) DEFAULT 'PENDING',
     firstname varchar(50) NOT NULL,
     lastname varchar(50) NOT NULL,
     email varchar(50) NOT NULL,
     street varchar(50) NOT NULL,
     states varchar(30) NOT NULL,
     postcode int(4) NOT NULL,
     phone int(10) NOT NULL,
     contactMethod char(5) NOT NULL,
     tickets int(10) NOT NULL,
     products varchar(50) NOT NULL,
     options varchar(50) NOT NULL,
     ccType varchar(50) NOT NULL,
     cName varchar(50) NOT NULL,
     ccNum int(25) NOT NULL,
     expDate char(5) NOT NULL,
     cvv int(3) NOT NULL,
     PRIMARY KEY  (order_id)
     )";

if ($conn->query($query) === TRUE) {
    echo "Table 'cart' created successfully";
} else {
    echo "Table 'cart' already exist";
}

//Initialize variables
if (isset($_POST["firstname"])) {
    $firstname = $_POST["firstname"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["lastname"])) {
    $lastname = $_POST["lastname"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["street"])) {
    $street = $_POST["street"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["states"])) {
    $states = $_POST["states"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["postcode"])) {
    $postcode = $_POST["postcode"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["contactMethod"])) {
    $contactMethod = $_POST["contactMethod"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["tickets"])) { //quantity
    $tickets = $_POST["tickets"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["products"])) {
    $products = $_POST["products"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["options"])) {
    $options = $_POST["options"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["ccType"])) {
    $ccType = $_POST["ccType"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["cName"])) {
    $cName = $_POST["cName"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["ccNum"])) {
    $ccNum = $_POST["ccNum"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["expmonth"])) {
    $expmonth = $_POST["expmonth"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["expyear"])) {
    $expyear = $_POST["expyear"];
} else {
    header("location: fix_order.php");
}

if (isset($_POST["cvv"])) {
    $cvv = $_POST["cvv"];
} else {
    header("location: fix_order.php");
}

//Functions
function sanitise_input($data)
{ //sanitise inputs
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

//Sanitise variables
$firstname = sanitise_input($firstname);
$lastname = sanitise_input($lastname);
$email = sanitise_input($email);
$street = sanitise_input($street);
//$states - sanitisation not need
$postcode = sanitise_input($postcode);
$phone = sanitise_input($phone);
//$contactMethod - sanitisation not need
$tickets = sanitise_input($tickets); //quantity
//$products - sanitisation not need
//$options - sanitisation not need
//$totalCost - sanitisation not need
//$ccType - sanitisation not need
$cName = sanitise_input($cName);
$ccNum = sanitise_input($ccNum);
//$expmonth - sanitisation not need
//$expyear - sanitisation not need
$cvv = sanitise_input($cvv);

//Conditions
$ValidateInsert = 0;
$validate = 1;

if ($validate == 1) {
    $errMsg = "";

    //Validate Name 
    if ($firstname == "") {
        $errMsg .= "<b>First Name Error:</b>You must enter your first name.<br>";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
        $errMsg .= "<b>First Name Error:</b>Only alpha letters allowed in your first name(no spaces).<br>";
    } else if (strlen($firstname) > 25) {
        $errMsg .= "<b>First Name Error:</b>First Name is limited to 25Characters.<br>";
    } else {
        $ValidateInsert += 1;
    }

    if ($lastname == "") {
        $errMsg .= "<b>Last Name Error:</b>You must enter your last name.<br>";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
        $errMsg .= "<b>Last Name Error:</b>Only alpha letters allowed in your last name(no spaces).<br>";
    } else if (strlen($lastname) > 25) {
        $errMsg .= "<b>Last Name Error:</b>Last Name is limited to 25Characters.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Email
    $email = filter_var($email, FILTER_SANITIZE_EMAIL); // Remove illegal characters
    if ($email == "") {
        $errMsg .= "<b>Email Error:</b>You must enter your email.<br>";
    } else if ((filter_var($email, FILTER_VALIDATE_EMAIL)) == false) {
        $errMsg .= "<b>Email Error:</b>$email is not a valid email address.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Street 
    if ($street == "") {
        $errMsg .= "<b>Street address Error:</b>You must enter your Street address.<br>";
    } else if (!preg_match("/^[A-Za-z0-9'\.\-\s\,\/]*$/", $street)) {
        $errMsg .= "<b>Street address Error:</b>Only Characters such as['A-Z', 'a-z', '0-9', '.', '-', '/'] are allowed for Street.<br>";
    } else if (strlen($street) > 40) {
        $errMsg .= "<b>Street address Error:</b>Street is limited to 40Characters.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate States
    if ($states == "") {
        $errMsg .= "<b>States Error:</b>You must choose a state.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Postcode
    if ($postcode == "") {
        $errMsg .= "<b>Postcode Error:</b>You must enter your Postcode.<br>";
    } else if (!preg_match("/^[0-9]*$/", $postcode)) {
        $errMsg .= "<b>Postcode Error:</b>Postcode only accepts integers.<br>";
    } else if (strlen($postcode) != 4) {
        $errMsg .= "<b>Postcode Error:</b>$postcode is not a valid Postcode in Australia(4digits).<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Postcode  with State
    $splitPostcode = explode("    ", $postcode);
    if ($states == "NSW" && $postcode[0] != 1 || $states != "NSW" && $postcode[0] == 1) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>New South Wales postcode's starts with 1.<br>";
    } else if ($states == "ACT" && $postcode[0] != 2 || $states != "ACT" && $postcode[0] == 2) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Australian Capital Territory postcode's starts with 2.<br>";
    } else if ($states == "VIC" && $postcode[0] != 3 || $states != "VIC" && $postcode[0] == 3) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Victoria postcode's starts with 3.<br>";
    } else if ($states == "QLD" && $postcode[0] != 4 || $states != "QLD" && $postcode[0] == 4) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Queensland postcode's starts with 4.<br>";
    } else if ($states == "SA" && $postcode[0] != 5 || $states != "SA" && $postcode[0] == 5) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>South Australia postcode's starts with 5.<br>";
    } else if ($states == "WA" && $postcode[0] != 6 || $states != "WA" && $postcode[0] == 6) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Western Australia postcode's starts with 6.<br>";
    } else if ($states == "TAS" && $postcode[0] != 7 || $states != "TAS" && $postcode[0] == 7) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Tasmania postcode's starts with 7.<br>";
    } else if ($states == "NT" && $postcode[0] != 0 || $states != "NT" && $postcode[0] == 0) {
        $errMsg .= "<b>Incorrect Postcode State combination:</b>Northern Territory postcode's starts with 0.<br>";
    } else {
        $ValidateInsert += 1;
    }


    //Validate Phone Number
    if ($phone == "") {
        $errMsg .= "<b>Phone number Error:</b>You must enter your phone number.<br>";
    } else if (!preg_match("/^[0-9]*$/", $phone)) {
        $errMsg .= "<b>Phone number Error:</b>$phone is not a valid phone number.<br>";
    } else if (strlen($phone) != 10) {
        $errMsg .= "<b>Phone number Error:</b>$phone is not within the legal range(10digits).<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Preferred Contact //Not needed since default value is set
    if ($contactMethod == "") {
        $errMsg .= "<b>Contact Method Error:</b>You must choose a Contact Method.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Tickets //quantity
    if ($tickets == "") {
        $errMsg .= "<b>Tickets Error:</b>You must enter ticket quantity.<br>";
    } else if (!preg_match("/^[0-9]*$/", $tickets)) {
        $errMsg .= "<b>Tickets Error:</b>$tickets is not a valid quantity.<br>";
    } else if ($tickets > 10) {
        $errMsg .= "<b>Tickets Error:</b>You can't book more than 10 tickets.<br>";
    } else if ($tickets < 1) {
        $errMsg .= "<b>Tickets Error:</b>You must enter ticket quantity.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Products //Not needed since default value is set
    if ($products == "") {
        $errMsg .= "<b>Product Error:</b>You must choose a Product.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Options //Not needed since default value is set
    if ($options == "") {
        $errMsg .= "<b>Options Error:</b>You must choose an Option.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Credit Card Type //Not needed since default value is set
    if ($ccType == "") {
        $errMsg .= "<b>Credit Card Type Error:</b>You must choose a Credit Card Type.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Credit Card Name 
    if ($cName == "") {
        $errMsg .= "<b>Credit Card Name Error:</b>You must enter your Credit Card name.<br>";
    } elseif (!preg_match("/^[a-zA-Z]*$/", $cName)) {
        $errMsg .= "<b>Credit Card Name Error:</b>Only alpha letters allowed in your Credit Card name.<br>";
    } else if (strlen($cName) > 25) {
        $errMsg .= "<b>Credit Card Name Error:</b>Credit Card name is limited to 25Characters.<br>";
    } else {
        $ValidateInsert += 1;
    }

    //Validate Credit Card Num 
    $ccNum = preg_replace('/\s+/', '', $ccNum); //remove all spacing tabs and line ends  \s+ will match one or more whitespace characters.
    $firstNum = $ccNum[0];
    $secNum = $ccNum[1];
    if ($ccNum == "") {
        $errMsg .= "<b>Credit Card number Error:</b>You must enter your Credit Card number.<br>";
    } else if (!preg_match("/^[0-9]*$/", $ccNum)) {
        $errMsg .= "<b>Credit Card number Error:</b>Credit Card number only accepts integers.<br>";
    } else if ($ccType == "visa") {
        if ($firstNum != "4") //Check if 1st number is 3
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 16 digits) .<br>";
        } else if (strlen($ccNum) != 16) //Check length
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 16 digits) .<br>";
        } else {
            $ValidateInsert += 1;
        }
    } else if ($ccType == "mastercard") {
        if ($firstNum != "5") //Check if 1st number is 3
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 16 digits) .<br>";
        } else if (($secNum < "1" || $secNum > "5")) //Check 1st and 2nd 
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 16 digits) .<br>";
        } else if (strlen($ccNum) != 16) //Check length
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 16 digits) .<br>";
        } else {
            $ValidateInsert += 1;
        }
    } else if ($ccType == "americanExpress") {
        if ($firstNum != "3") //Check if 1st number is 3
        {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be start with 3) .<br>";
        }

        if ($firstNum == "3" && $secNum == "4") {
            if (strlen($ccNum) != 15) //Check length
            {
                $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 15 digits) .<br>";
            } else {
                $ValidateInsert += 1;
            }
        }

        if ($firstNum == "3" && $secNum == "7") {
            if (strlen($ccNum) != 15) //Check length
            {
                $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 15 digits) .<br>";
            } else {
                $ValidateInsert += 1;
            }
        }
        $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number for $ccType (must be 15 digits and should start with 34/37) .<br>";
    }

    //Validate Expiry Date 
    if ($expmonth == "") {
        $errMsg .= "<b>Credit Card Expiry Error:</b>You must choose a Expiry Month.<br>";
    } else if ($expyear ==  "") {
        $errMsg .= "<b>Credit Card Expiry Error:</b>You must choose a Expiry Year.<br>";
    } else if ($expmonth <=  date("m") and $expyear <= date("y")) {
        $errMsg .= "<b>Credit Card Expiry Error:</b>Card Expired.<br>";
    } else {
        //Show expiry as MM/YY
        $expDate = "$expmonth" . "/" . "$expyear";
        $ValidateInsert += 1;
    }

    //Validate Card CVV
    if ($cvv == "") {
        $errMsg .= "<b>Credit Card CVV Error:</b>You must enter Card CVV.<br>";
    } else if (!preg_match("/^[0-9]*$/", $cvv)) {
        $errMsg .= "<b>Credit Card CVV Error:</b>Credit Card CVV only accepts integers.<br>";
    } else if (strlen($cvv) != 3) {
        $errMsg .= "<b>Credit Card CVV Error:</b>$cvv is not a valid Card CVV(must be 3 digits).<br>";
    } else {
        $ValidateInsert += 1;
    }
}

if ($ValidateInsert < 17) {
    $_SESSION["total"] = $ValidateInsert;
    $_SESSION["fixErrMsg"] = $errMsg;
    $_SESSION["fixFname"] = $firstname;
    $_SESSION["fixLname"] = $lastname;
    $_SESSION["fixEmail"] = $email;
    $_SESSION["fixStreet"] = $street;
    $_SESSION["fixStates"] = $states;
    $_SESSION["fixPostcode"] = $postcode;
    $_SESSION["fixPhone"] = $phone;
    $_SESSION["fixContactMethod"] = $contactMethod;
    $_SESSION["fixTickets"] = $tickets;
    $_SESSION["fixProducts"] = $products; //doesnt need fixing
    $_SESSION["fixOption"] = $options; //doesnt need fixing
    $_SESSION["fixCcType"] = "";
    $_SESSION["fixCName"] = "";
    $_SESSION["fixCcNum"] = "";
    $_SESSION["fixExpmonth"] = "";
    $_SESSION["fixExpyear"] = "";
    $_SESSION["fixCvv"] = "";

    header("location: fix_order.php");
}

//Set productsPrice based on options
if ($options == "Adults") {
    $productsPrice = 20;
}
if ($options == "Seniors") {
    $productsPrice = 15;
}
if ($options == "Children") {
    $productsPrice = 10;
}
$order_cost = $productsPrice * $tickets; //price * quantity

if ($ValidateInsert == 17) { // when all the fields are correct then only the data will be inserted

    $sql = "INSERT INTO orders (firstname, lastname, email, street, states, postcode, phone, contactMethod, tickets, products, options, 
        order_cost, ccType, cName, ccNum, expDate, cvv)
        VALUES ('$firstname', '$lastname', '$email', '$street', '$states', '$postcode', '$phone', '$contactMethod', '$tickets', '$products', '$options', 
        '$order_cost', '$ccType', '$cName', '$ccNum', '$expDate','$cvv')";

    //For Receipt
    $_SESSION["errMsg"] = $errMsg;
    $_SESSION["firstname"] = $firstname;
    $_SESSION["lastname"] = $lastname;
    $_SESSION["email"] = $email;
    $_SESSION["street"] = $street;
    $_SESSION["states"] = $states;
    $_SESSION["postcode"] = $postcode;
    $_SESSION["phone"] = $phone;
    $_SESSION["contactMethod"] = $contactMethod;
    $_SESSION["tickets"] = $tickets;
    $_SESSION["products"] = $products;
    $_SESSION["options"] = $options;
    $_SESSION["order_cost"] = $order_cost;
    $_SESSION["ccType"] = $ccType;
    $_SESSION["cName"] = $cName;
    $_SESSION["ccNum"] = $ccNum;
    $_SESSION["expDate"] = $expDate;
    $_SESSION["cvv"] = $cvv;

    header("location: receipt.php");
}


$conn->close();
?>
