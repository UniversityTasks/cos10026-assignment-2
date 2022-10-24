<?php

require_once("db.php");

// Abort if id not set
$id = $_POST['id'] ?? null;
if (!$id) {
    header('Location: manager.php');
    exit;
}

$res = $conn->query("delete from s103574757_db.orders where order_id = " . $id);

header('Location: manager.php');

?>