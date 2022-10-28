<?php
//Deny direct access
//Reference: https://fedingo.com/how-to-prevent-direct-access-to-php-file/
if ($_SERVER['REQUEST_METHOD'] == 'GET' && realpath(__FILE__) == realpath($_SERVER['SCRIPT_FILENAME'])) {
    header('HTTP/1.0 404 Not Found', TRUE, 404);
    die(header("location: index.php"));
}
session_start()
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta name="description" content="receipt" />
    <meta name="keywords" content="PHP" />
    <meta name="author" content="Weng Kit Soo Hoo" />
    <link rel="stylesheet" href="./styles/style.css">

    <title>Receipt</title>

</head>

<body>
    <?php
    include_once 'includes/menu.php';
    ?>
    <table class="receipt-wrap">
        <tbody>
            <tr>
                <td></td>
                <td class="receiptcontainer">
                    <div class="receiptcontent">
                        <table class="receiptmain">
                            <tbody>
                                <tr>
                                    <td class="receipt-wrap">
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="receipt-block">
                                                        <h2>Thanks you! Have a good day!</h2>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="receipt-block">
                                                        <table class="receipt">
                                                            <tbody>
                                                                <tr>
                                                                    <td><?php echo $_SESSION['values']['first_name'], " ", $_SESSION['values']['last_name']; ?><br>
                                                                        Address:<?php echo $_SESSION['values']['street'], " ", $_SESSION['values']['state'], " ", $_SESSION['values']['post_code'] ?>
                                                                        <br>Phone:<?php echo $_SESSION['values']['phone'] ?><br>Email:<?= $_SESSION['values']['email'] ?>
                                                                        <br>CCNum:***************<br> CCExp: **/** <br>
                                                                        CVV:***<br>
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <td>
                                                                        <table class="receipt-items">
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td><?= $_SESSION['values']['receipt_desc'] ?>
                                                                                    </td>
                                                                                    <td><?= $_SESSION['values']['tickets_quantity'] ?>
                                                                                    </td>
                                                                                </tr>

                                                                                <tr class="total">
                                                                                    <td class="alignright">Total</td>
                                                                                    <td><?= $_SESSION['values']['order_cost'] ?>.00
                                                                                    </td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="receipt-block">
                                                        <a href="index.php">Back to Homepage</a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="receipt-block">
                                                        GOI Inc. Hawthorn, 3122 VICTORIA
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="receiptfooter">
                            <table>
                                <tbody>
                                    <tr>
                                        <td class=" receipt-block">Questions? Email <a
                                                href="mailto:">GOISupport@hotmail.com</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </td>
                <td></td>
            </tr>
        </tbody>
    </table>
</body>

</html>
