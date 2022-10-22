<?php
// Start the session
session_start();
?>

<?php
require_once("db.php");

// If table doesn't already exists, create it.
if ($conn->query('select * from s103574757_db.orders') == false) {
    $query = "CREATE TABLE s103574757_db.orders (
        order_id int(6) AUTO_INCREMENT,
        order_cost int(25) NOT NULL,
        order_time timestamp default current_timestamp,
        order_status varchar(255) DEFAULT 'PENDING',
        
        first_name varchar(50) NOT NULL,
        last_name varchar(50) NOT NULL,
        email varchar(50) NOT NULL,
        
        street varchar(50) NOT NULL,
        state varchar(30) NOT NULL,
        post_code int(4) NOT NULL,
        
        phone int(10) NOT NULL,

        -- quantity of tickets ordered
        tickets_quantity int(10) NOT NULL,
        
        -- TODO (Andrew): FK to respective tables
        contact_method_name varchar(255) NOT NULL,
        movie_name varchar(255) NOT NULL,
        option_name varchar(255) NOT NULL,
        
        cc_type varchar(50) NOT NULL,
        cc_name varchar(50) NOT NULL,
        cc_num int(25) NOT NULL,
        exp_date char(5) NOT NULL,
        cvv int(3) NOT NULL,
        FOREIGN KEY (contact_method_name) REFERENCES contact_method(contact_method_name)
        FOREIGN KEY (movie_name) REFERENCES movies(movie_name)
        FOREIGN KEY (option_name) REFERENCES options(option_name)
        PRIMARY KEY  (order_id)
     )";
}

// Associative array that stores errors for each form field
$errors = array();

//Initialize variables
if (isset($_POST["first_name"])) {
    $first_name = $_POST["first_name"];
} else {
    $errors["first_name"] = "Please enter your first name";
}

if (isset($_POST["last_name"])) {
    $last_name = $_POST["last_name"];
} else {
    $errors["last_name"] = "Please enter your last name";
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
} else {
    $errors["email"] = "Please enter your email";
}

if (isset($_POST["street"])) {
    $street = $_POST["street"];
} else {
    $errors["street"] = "Please enter your street";
}

if (isset($_POST["state"])) {
    $state = $_POST["state"];
} else {
    $errors["state"] = "Please enter your state";
}

if (isset($_POST["post_code"])) {
    $post_code = $_POST["post_code"];
} else {
    $errors["post_code"] = "Please enter your postcode";
}

if (isset($_POST["phone"])) {
    $phone = $_POST["phone"];
} else {
    $errors["phone"] = "Please enter your phone";
}

if (isset($_POST["options"])) {
    $options = $_POST["options"];
} else {
    $errors["options"] = "Please select an option";
}

if (isset($_POST["contact_method"])) {
    $contact_method = $_POST["contact_method"];
} else {
    $errors["contact_method"] = "Please select a contact method";
}

if (isset($_POST["tickets_quantity"])) {
    $tickets_quantity = $_POST["tickets_quantity"];
} else {
    $errors["tickets_quantity"] = "Please select a ticket quantity";
}

// TODO: Get the movie id from query

if (isset($_POST["cc_type"])) {
    $cc_type = $_POST["cc_type"];
} else {
    $errors["cc_type"] = "Please enter your credit card type";
}

if (isset($_POST["cc_name"])) {
    $cc_name = $_POST["cc_name"];
} else {
    $errors["cc_name"] = "Please enter your credit card name";
}

if (isset($_POST["cc_num"])) {
    $cc_num = $_POST["cc_num"];
} else {
    $errors["cc_num"] = "Please enter your credit card number";
}

if (isset($_POST["exp_month"])) {
    $exp_month = $_POST["exp_month"];
} else {
    $errors["exp_month"] = "Please enter your credit card expiry month";
}

if (isset($_POST["exp_year"])) {
    $exp_year = $_POST["exp_year"];
} else {
    $errors["exp_year"] = "Please enter your credit card expiry year";
}

if (isset($_POST["cvv"])) {
    $cvv = $_POST["cvv"];
} else {
    $errors["exp_year"] = "Please enter your credit card CVV";
}

require_once("./functions/functions.php");

// Sanitise variables
// Need to sanitase even if select input
// since use can make API request with any value
$first_name = sanitise_input($firstname);
$last_name = sanitise_input($lastname);
$email = sanitise_input($email);
$street = sanitise_input($street);
$post_code = sanitise_input($postcode);
$phone = sanitise_input($phone);
$cc_name = sanitise_input($cc_name);
$cc_num = sanitise_input($cc_num);
$exp_month = sanitise_input($exp_month);
$exp_year  = sanitise_input($exp_year);
$cvv = sanitise_input($cvv);

// Validate First name 
if (!preg_match("/^[a-zA-Z]*$/", $firstname)) {
    $errors["first_name"] = "Only alpha letters allowed in your first name(no spaces).";
} else if (strlen($firstname) > 25) {
    $errors["first_name"] = "First Name is limited to 25 characters.";
}

// Validate Last name 
if (!preg_match("/^[a-zA-Z]*$/", $lastname)) {
    $errors["last_name"] =  "Only alpha letters allowed in your last name(no spaces).";
} else if (strlen($lastname) > 25) {
    $errors["last_name"] =  "Last Name is limited to 25 characters.";
}

// Validate Email
$email = filter_var($email, FILTER_SANITIZE_EMAIL); // Remove illegal characters
if ($email == "") {
    $errors["email"] =  "You must enter your email.";
} else if ((filter_var($email, FILTER_VALIDATE_EMAIL)) == false) {
    $errors["email"] =  "Invalid email address.";
}

// Validate Street 
if (!preg_match("/^[A-Za-z0-9'\.\-\s\,\/]*$/", $street)) {
    $errors["street"] =  "Only Characters such as ['A-Z', 'a-z', '0-9', '.', '-', '/'] are allowed for street.";
} else if (strlen($street) > 40) {
    $errors["street"] =  "Street is limited to 40 characters.";
}

// Validate Postcode
if (!preg_match("/^[0-9]*$/", $postcode)) {
    $errors["post_code"] =   "Postcode only accepts integers.";
} else if (strlen($postcode) != 4) {
    $errors["post_code"] =  "Invalid Postcode in Australia(4 digits).";
}

// Validate postcode with state if post code has no errors
if (array_key_exists("post_code", $errors) == false) {
    if ($state == "NSW" && $postcode[0] != 1 || $state != "NSW" && $postcode[0] == 1) {
        $errors['state'] = "New South Wales postcode's starts with 1.";
    } else if ($state == "ACT" && $postcode[0] != 2 || $state != "ACT" && $postcode[0] == 2) {
        $errors['state'] = "Australian Capital Territory postcode's starts with 2.";
    } else if ($state == "VIC" && $postcode[0] != 3 || $state != "VIC" && $postcode[0] == 3) {
        $errors['state'] = "Victoria postcode's starts with 3.";
    } else if ($state == "QLD" && $postcode[0] != 4 || $state != "QLD" && $postcode[0] == 4) {
        $errors['state'] = "Queensland postcode's starts with 4.";
    } else if ($state == "SA" && $postcode[0] != 5 || $state != "SA" && $postcode[0] == 5) {
        $errors['state'] = "South Australia postcode's starts with 5.";
    } else if ($state == "WA" && $postcode[0] != 6 || $state != "WA" && $postcode[0] == 6) {
        $errors['state'] = "Western Australia postcode's starts with 6.";
    } else if ($state == "TAS" && $postcode[0] != 7 || $state != "TAS" && $postcode[0] == 7) {
        $errors['state'] = "Tasmania postcode's starts with 7.";
    } else if ($state == "NT" && $postcode[0] != 0 || $state != "NT" && $postcode[0] == 0) {
        $errors['state'] = "Northern Territory postcode's starts with 0.";
    }
}

// Validate Phone Number
if (!preg_match("/^[0-9]*$/", $phone)) {
    $errors['phone'] = "Phone number is not a valid phone number.";
} else if (strlen($phone) != 10) {
    $errors['phone'] = "Phone number is not within the legal range(10 digits).";
}

if (!preg_match("/^[a-zA-Z]*$/", $cc_name)) {
    $errors['cc_name'] = "Only alpha letters allowed in your Credit Card name.";
} else if (strlen($cc_name) > 25) {
    $errors['cc_name'] = "Credit Card name is limited to 25 characters.";
}

// Validate Credit Card Num 
// Remove all spacing tabs and line ends.  \s+ will match one or more whitespace characters.
$cc_num = preg_replace('/\s+/', '', $cc_num);
$first_num = $cc_num[0];
$sec_num = $cc_num[1];

if ($cc_num == "") {
    $errors['cc_num'] = "You must enter your Credit Card number.";
} else if (!preg_match("/^[0-9]*$/", $cc_num)) {
    $errors['cc_num'] = "Credit Card number only accepts integers.";
} else if ($cc_type == "visa") {
    // Visa should start with 4 and be 16 digits long
    if ($first_num != "4") {
        $errors['cc_num'] = "Invalid card number (must start with 4).";
    } else if (strlen($cc_num) != 16) {
        $errors['cc_num'] = "Invalid card number (must be 16 digits).";
    }
} else if ($cc_type == "mastercard") {
    // Mastercard should start with 51-55 and be 16 digits long
    if ($first_num != "5") {
        $errors['cc_num'] = "Invalid card number (must start with 51-55).";
    } else if (($sec_num < "1" || $sec_num > "5")) {
        $errors['cc_num'] = "Invalid card number (must start with 51-55).";
    } else if (strlen($cc_num) != 16) {
        $errors['cc_num'] = "Invalid card number (must be 16 digits).";
    }
} else if ($cc_type == "americanExpress") {
    // American express should start with 34/37 and be 15 digits long
    if (strlen($cc_num) != 15) {
        $errors['cc_num'] = "Invalid card number (must be 15 digits).";
    } else if ($first_num != "3" || ($sec_num != "4" || $sec_num != 4)) {
        $errors['cc_num'] = "Invalid card number (must start with 34/37).";
    }
}

//Validate Expiry Date 
if ($expmonth <=  date("m") and $expyear <= date("y")) {
    // Seperate error message
    $errors['exp'] = "Card is expired. Try another one.";
} else {
    //Show expiry as MM/YY
    $expDate = "$expmonth" . "/" . "$expyear";
}

//Validate Card CVV
if (!preg_match("/^[0-9]*$/", $cvv)) {
    $errors['cvv'] = "Credit Card CVV only accepts integers.";
} else if (strlen($cvv) != 3) {
    $errors['cvv'] = "Invalid Card CVV (must be 3 digits).";
}

// If any errors, redirect to fix order
if (empty($errors) == false) {
    $_SESSION["errors"] = $errors;
    header("location: fix_order.php");

    // Do we need to return?
    return;
}

// Get the price of the option from database
$res = $conn->query('SELECT option_price FROM s103574757_db.options WHERE option_id = ' . $options  . ';');

$option_detail = mysqli_fetch_assoc($res);
$price = intval($option_detail['option_price']);

$order_cost = $price * intval($tickets_quantity);

// Used to populate fix_order.php fields and receipt
$values = array(
    'first_name' => $first_name,
    'last_name' => $last_name,
    'email' => $email,
    'phone' => $phone,
    'street' => $street,
    'state' => $state,
    'post_code' => $post_code,
    'options' => $options,
    'tickets_quantity' => $tickets_quantity,
    'order_cost' => $order_cost
);

$_SESSION['values'] = $values;

?>