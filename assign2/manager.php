<?php

require_once("db.php");

$res = $conn->query("select * from s103574757_db.orders o inner join s103574757_db.movies m on o.movie_id=m.movie_id order by o.order_cost desc;");

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
            <th>Total cost</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Status</th>
            <th>Product</th>
            <th>Action</th>
        </tr>
        
        <?php while ($row = mysqli_fetch_assoc($res)) { ?>
        <tr>
                <td><?php echo $row['order_id']; ?></td>
                <td><?php echo $row['order_cost']; ?></td>
                <td><?php echo $row['first_name']; ?></td>
                <td><?php echo $row['last_name']; ?></td>
                <td><?php echo $row['order_status']; ?></td>
                <td><?php echo $row['movie_name']; ?></td>
                <td>
                    <!-- Send the user to the edit page (which fetches order data via order_id) -->
                    <a href="edit.php?id=<?php echo $row['order_id']?>">Edit</a>

                    <!-- Delete order by posting to delete_order.php. We need to use a form because JS is not allowed :( -->
                    <form action="delete_order.php" method="post">
                        <input type="hidden" name="id" value="<?php echo $row['order_id'] ?>">
                        <input type="submit" value="Delete">
                    </form>
                </td>
            <?php } ?>
        </tr>
    </table>
    
</body>
</html>

