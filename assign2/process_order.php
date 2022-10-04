<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="description" content="ProcessBooking" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Yap Zhe Wei" />

    <title>Booking Confirmation</title>

</head>
<!-- This is a comment. Indenting child elements makes the markup much more readable -->

<body>
    <h1>Booking Confirmation</h1>

    <?php
    // //Login 
    // // require_once("settings.php");
     $host = "localhost";
     $user = "root";
     $pwd = "";
     $dbName = "cos10026_as2";

   //Create connection
    $conn = @mysqli_connect($host, $user, $pwd, $dbName);

    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " . $conn->connect_error);
    }

//Create table

 $query = "CREATE TABLE cos10026_as2.orders (
     order_id int(6) AUTO_INCREMENT,
     order_cost int(25) NOT NULL,
     order_time date DEFAULT GETDATE()
     order_status varchar(255) DEFAULT 'PENDING'
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
     expmonth int(2) NOT NULL,
     expyear int(2) NOT NULL,
     cvv int(3) NOT NULL,
     PRIMARY KEY  (order_id)
     )";

 if ($conn->query($query) === TRUE) {
    echo "Table 'cart' created successfully";
  }
  else {
    echo "Error creating table: " . $conn->error;
  }
  

    //Initialize variables
    if (isset($_POST["firstname"])) {
        $firstname = $_POST["firstname"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["lastname"])) {
        $lastname = $_POST["lastname"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["email"])) {
        $email = $_POST["email"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["street"])) {
        $street = $_POST["street"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["states"])) {
        $states = $_POST["states"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["postcode"])) {
        $postcode = $_POST["postcode"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["phone"])) {
        $phone = $_POST["phone"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["contactMethod"])) {
        $contactMethod = $_POST["contactMethod"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["tickets"])) {
        $tickets = $_POST["tickets"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["products"])) {
        $products = $_POST["products"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["options"])) {
        $options = $_POST["options"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["ccType"])) {
        $ccType = $_POST["ccType"];
    } else {
        header("location: register.html");
    }
    
    if (isset($_POST["cName"])) {
        $cName = $_POST["cName"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["ccNum"])) {
        $ccNum = $_POST["ccNum"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["expmonth"])) {
        $expmonth = $_POST["expmonth"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["expyear"])) {
        $expyear = $_POST["expyear"];
    } else {
        header("location: register.html");
    }

    if (isset($_POST["cvv"])) {
        $cvv = $_POST["cvv"];
    } else {
        header("location: register.html");
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
    $states = sanitise_input($states);
    $postcode = sanitise_input($postcode);
    $phone = sanitise_input($phone);
    $contactMethod = sanitise_input($contactMethod);
    $tickets = sanitise_input($tickets);
    $products = sanitise_input($products);
    $options = sanitise_input($options);   
    //$totalCost
    $ccType = sanitise_input($ccType);
    $cName = sanitise_input($cName);
    $ccNum = sanitise_input($ccNum);
    //$expmonth
    //$expyear
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

        //Validate states
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

        //Validate Preferred Contact
        if ($contactMethod == "") {
            $errMsg .= "<b>Contact Method Error:</b>You must choose a Contact Method.<br>";
        } else {
            $ValidateInsert += 1;
        }

        //Validate Tickets
        if ($tickets == "") {
            $errMsg .= "<b>Tickets Error:</b>You must enter ticket quantity.<br>";
        } else if (!preg_match("/^[0-9]*$/", $tickets)) {
            $errMsg .= "<b>Tickets Error:</b>$tickets is not a valid quantity.<br>";
        } else if ($tickets > 10) {
            $errMsg .= "<b>Tickets Error:</b>You can't book more than 10 tickets.<br>";
        } else {
            $ValidateInsert += 1;
        }

        //Validate Products
        if ($products == "") {
            $errMsg .= "<b>Product Error:</b>You must choose a Product.<br>";
        } else {
            $ValidateInsert += 1;
        }

        //Validate Options


        //Validate Credit Card Type


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
        if ($ccNum == "") {
            $errMsg .= "<b>Credit Card number Error:</b>You must enter your Credit Card number.<br>";
        } else if (!preg_match("/^[0-9]*$/", $ccNum)) {
            $errMsg .= "<b>Credit Card number Error:</b>Credit Card number only accepts integers.<br>";
        } else if (strlen($ccNum) != 15 || strlen($ccNum) != 16) {
            $errMsg .= "<b>Credit Card number Error:</b>$ccNum is not a valid card number(must be 15-16 digits).<br>";
        } else {
            $ValidateInsert += 1;
        }

        //Validate Expiry Date 
        if ($expmonth == "") {
            $errMsg .= "<b>Credit Card Expiry Error:</b>You must choose a Expiry Month.<br>";
        } else if ($expyear ==  "") {
            $errMsg .= "<b>Credit Card Expiry Error:</b>You must choose a Expiry Year.<br>";
        } else if ($expmonth <=  date("m") and $expyear <= date("y")) {
            $errMsg .= "<b>Credit Card Expiry Error:</b>Card Expired.<br>";
        } else {
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
        echo "<p>$errMsg</p>";
        echo "Correct inputs: $ValidateInsert"; // count $ValidateInsert to check if the code is running as it should
        echo "<br>";
    } //end if statement ($validate == 1)

    if ($ValidateInsert == 16) { // when all the fields are correct then only the data will be inserted

        $sql = "INSERT INTO checkout (user_Fname, user_Lname, phone_num, email, unit_num, street1, street2, postcode, state, shipping, payment)
      VALUES ('$user_Fname', '$user_Lname', '$phone_num', '$email', '$unit_num', '$street1', '$street2', '$postcode', '$state', '$shipping', '$payment')";

        if ($conn->query($sql) === TRUE) {
            echo "Your order has been received by us. We will send you your tracking number via email wihtin 3 operation days. ";
            echo "Thank you for your support. Have a great day!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    // $conn->close();
    ?>
</body>

</html>
