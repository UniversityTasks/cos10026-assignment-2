<?php 
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
<table class="body-wrap">
    <tbody><tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tbody><tr>
                        <td class="content-wrap aligncenter">
                            <table width="100%" cellpadding="0" cellspacing="0">
                                <tbody><tr>
                                    <td class="content-block">
                                        <h2>Thanks you! Have a good day!</h2>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <table class="invoice">
                                            <tbody><tr>
                                                <td><?php echo $_SESSION['values']['first_name'] ," ",$_SESSION['values']['last_name']; ?><br>
												Address:<?php echo $_SESSION['values']['street'] ," ",$_SESSION['values']['state']," ",$_SESSION['values']['post_code'] ?>
												<br>Phone:<?php echo $_SESSION['values']['phone'] ?><br>Email:<?= $_SESSION['values']['email'] ?>
												<br>CCNum:***************<br> CCExp: **/** <br> CVV:***<br>
											</td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <table class="invoice-items" cellpadding="0" cellspacing="0">
                                                        <tbody><tr>
                                                            <td><?= $_SESSION['values']['receipt_desc'] ?></td>
                                                            <td class="alignright"><?= $_SESSION['values']['tickets_quantity']?></td>
                                                        </tr>
                                                        
                                                        <tr class="total">
                                                            <td class="alignright" width="80%">Total</td>
                                                            <td class="alignright"><?= $_SESSION['values']['order_cost']?></td>
                                                        </tr>
                                                    </tbody></table>
                                                </td>
                                            </tr>
                                        </tbody></table>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <a href="index.php">Back to Homepage</a>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        GOI Inc. Hawthorn, 3122 VICTORIA 
                                    </td>
                                </tr>
                            </tbody></table>
                        </td>
                    </tr>
                </tbody></table>
                <div class="footer">
                    <table width="100%">
                        <tbody><tr>
                            <td class="aligncenter content-block">Questions? Email <a href="mailto:">GOISupport@hotmail.com</a></td>
                        </tr>
                    </tbody></table>
                </div></div>
        </td>
        <td></td>
    </tr>
</tbody></table>
</body>

</html>
