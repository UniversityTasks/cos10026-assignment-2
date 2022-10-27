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


<div class="col-md-12">   
 <div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive"  src='./images/preview/Logo.png'  style="width: 91px; border-radius: 50px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h3>Gang Of Islands</h3>
							<p>Replace with PhoneNumber <i class="fa fa-phone"></i></p>
							<p>GOISupport@hotmail.com<i class="fa fa-envelope-o"></i></p>
							<p>USA <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Customer Name : <?php echo $_SESSION['values']['first_name'] ," ",$_SESSION['values']['last_name'], "</br>"; ?></h5>
							<p><b>Mobile :</b> <?= $_SESSION['values']['phone']; ?></p>
							<p><b>Email :</b> <?=  $_SESSION['values']['email'];  ?></p>
							<p><b>Address :</b><?php echo $_SESSION['values']['street'],",", $_SESSION['values']['state'], "</br>"; ?></p>
                            <p><b>Post Code :</b><?= $_SESSION['values']['post_code']; ?></p>
                            <p><b>CC Num :</b><?php echo "***************"?></p>
							<p><b>CC Expiry:</b><?php echo "**/**"?></p>
							<p><b>CC Expiry:</b><?php echo "***"?></p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>INVOICE</h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Quantity</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9"><?= $_SESSION['values']['receipt_desc']?></td>
                            <td class="col-md-3"><i class="fa fa-inr"></i><?= $_SESSION['values']['tickets_quantity'] ?></td>
                        </tr>
                     
                        <tr>
                            <td class="text-right">
                         
							</td>
                            <td>
                        
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> <?=  $_SESSION['values']['order_cost'] ?></strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5 style="color: rgb(140, 140, 140);">Thank you for your purchase!. We hope to see you again!</h5>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h1>Stamp</h1>
						</div>
					</div>
				</div>
            </div>
			
        </div>    
	</div>
</div>



</body>


</html>