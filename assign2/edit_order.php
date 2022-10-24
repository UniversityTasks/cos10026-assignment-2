<?php

require_once("db.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->query("update s103574757_db.orders set order_status = '" . $_POST['status'] . "' where order_id = " . $_POST['id']);

    header('Location: manager.php');
    exit;
}

// Abort if id not set
$id = $_GET['id'] ?? null;
if (!$id) {
    header('Location: manager.php');
    exit;
}

$order = mysqli_fetch_assoc($conn->query("select * from s103574757_db.orders where order_id = " . $id));

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
    <p>Updating order: # <?php echo $order['order_id'] ?></p>
    <form action="edit_order.php" method="post">
        <input type="hidden" name="id" value="<?php echo $order['order_id'] ?>">
        <label for="status">Status</label>
        <select name="status" id="status">
            <option value="PENDING" <?= $order['order_status'] == 'PENDING' ? 'selected' : '' ?>>PENDING</option>
            <option value="FULFILLED" <?= $order['order_status'] == 'FULFILLED' ? 'selected' : '' ?>>FULFILLED</option>
            <option value="PAID" <?= $order['order_status'] == 'PAID' ? 'selected' : '' ?>>PAID</option>
            <option value="ARCHIVED" <?= $order['order_status'] == 'ARCHIVED' ? 'selected' : '' ?>>ARCHIVED</option>
        </select>
        <input type="submit" value="Save">
    </form>
</body>

</html>