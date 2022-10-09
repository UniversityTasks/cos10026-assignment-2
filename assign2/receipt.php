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
require_once ("settings.php");
$conn = @mysqli_connect($host,$user,$pwd,$sql_db);
if (!$conn){
    echo "<p>Database connection failure.</p>";		//failed to connect to DB
}
else{
    $sql_table = "orders";
    $query = "select * from orders";		//query SQL db
    $result = mysqli_query($conn, $query);				//execute the query and store the result into result pointer
    if (!$result){			//Checks execution success state
        echo "<p>Something is wrong with ", $query, "</p>";
    }
    else{			//display records.
       
        $record = mysqli_fetch_assoc($result);
            echo '<div class = "MyContainer">
            <center class = "InvoiceTop"><h2>Order Successful!!</h2></center>';
            echo '<div class = MidInvoice"> <h2>Contact Info</h2> <p> Address :',$record["cust_Street"],"</br>";
            echo  ' Name : ',$record["cust_Fname"] ," ", $record["cust_Lname"], "</br>";
            echo  ' Email : ',$record["cust_email"], "</br>";
            echo '</p></div>';
            echo "<table border='1'>\n";
            echo "<tr>\n
                        <th scope='col'>Order ID</th>
                        <th scope='col'>Ticket Type</th>

                        <th scope='col'>Quantity</th>
                        <th scope='col'>Price</th>
                  </tr>\n";
                  echo "<tr>\n";
					echo "<td>", $record["order_id"], "</td>\n";
                    echo "<td>", $record["ticket_type"], "</td>\n";
					echo "<td>", $record["Quantity"], "</td>\n";
					echo "<td>", $record["order_cost"], "</td>\n";
					echo "</tr>\n";
                    echo "</table>\n";

            echo '</div>';
            
      
        mysqli_free_result($result);		//frees up the memory after result pointer.
    }
    mysqli_close($conn);//close database connection
}
?>
<div class="col-md-12">   
 <div class="row">
		
        <div class="receipt-main col-xs-10 col-sm-10 col-md-6 col-xs-offset-1 col-sm-offset-1 col-md-offset-3">
            <div class="row">
    			<div class="receipt-header">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<div class="receipt-left">
							<img class="img-responsive" alt="iamgurdeeposahan" src="https://bootdey.com/img/Content/avatar/avatar6.png" style="width: 71px; border-radius: 43px;">
						</div>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 text-right">
						<div class="receipt-right">
							<h5>Company Name.</h5>
							<p>+1 3649-6589 <i class="fa fa-phone"></i></p>
							<p>company@gmail.com <i class="fa fa-envelope-o"></i></p>
							<p>USA <i class="fa fa-location-arrow"></i></p>
						</div>
					</div>
				</div>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<h5>Customer Name </h5>
							<p><b>Mobile :</b> +1 12345-4569</p>
							<p><b>Email :</b> customer@gmail.com</p>
							<p><b>Address :</b> New York, USA</p>
						</div>
					</div>
					<div class="col-xs-4 col-sm-4 col-md-4">
						<div class="receipt-left">
							<h3>INVOICE # 102</h3>
						</div>
					</div>
				</div>
            </div>
			
            <div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Description</th>
                            <th>Amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="col-md-9">Payment for August 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 15,000/-</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Payment for June 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 6,00/-</td>
                        </tr>
                        <tr>
                            <td class="col-md-9">Payment for May 2016</td>
                            <td class="col-md-3"><i class="fa fa-inr"></i> 35,00/-</td>
                        </tr>
                        <tr>
                            <td class="text-right">
                            <p>
                                <strong>Total Amount: </strong>
                            </p>
                            <p>
                                <strong>Late Fees: </strong>
                            </p>
							<p>
                                <strong>Payable Amount: </strong>
                            </p>
							<p>
                                <strong>Balance Due: </strong>
                            </p>
							</td>
                            <td>
                            <p>
                                <strong><i class="fa fa-inr"></i> 65,500/-</strong>
                            </p>
                            <p>
                                <strong><i class="fa fa-inr"></i> 500/-</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 1300/-</strong>
                            </p>
							<p>
                                <strong><i class="fa fa-inr"></i> 9500/-</strong>
                            </p>
							</td>
                        </tr>
                        <tr>
                           
                            <td class="text-right"><h2><strong>Total: </strong></h2></td>
                            <td class="text-left text-danger"><h2><strong><i class="fa fa-inr"></i> 31.566/-</strong></h2></td>
                        </tr>
                    </tbody>
                </table>
            </div>
			
			<div class="row">
				<div class="receipt-header receipt-header-mid receipt-footer">
					<div class="col-xs-8 col-sm-8 col-md-8 text-left">
						<div class="receipt-right">
							<p><b>Date :</b> 15 Aug 2016</p>
							<h5 style="color: rgb(140, 140, 140);">Thanks for shopping.!</h5>
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