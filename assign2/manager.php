<?php

require_once("db.php");

$res = $conn->query("select * from s103574757_db.orders");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GOI - Manager</title>
</head>
<body>
    <table>
        <tr>
            <th>ID</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Status</th>
        </tr>
        
        <tr>
            <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['firstname']; ?></td>
                <td><?php echo $row['lastname']; ?></td>
                <td><?php echo $row['order_status']; ?></td>
            <?php } ?>
        </tr>
    </table>
    
</body>
</html>

