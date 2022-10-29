<?php
// Only allows access to page if the user has been through the authentication
// page and has the authenticated boolean set in the session.
session_start();
if (!isset($_SESSION['authenticated']) || !$_SESSION['authenticated']) {
    header("Location: ./login_form.php?error_msg=Unauthenticated");
}

require_once("./db.php");
require_once("./functions/functions.php");

$sort = get_query_param("sort", "desc");
$name = get_query_param("name", ""); // empty means get all
$prod = get_query_param("prod", ""); // empty means get all

$query = "
    select * from s103574757_db.orders o 
    inner join s103574757_db.movies m
    on o.movie_id=m.movie_id";

// Whether or not we have two where clauses
$add_and = false;

if ($name != "") {
    $query .= " where o.first_name like '%$name%' or o.last_name like '%$name%'";
    $add_and = true;
}

if ($prod != "") {
    if ($add_and)
        $query .= " and";
    else
        $query .= " where";

    $query .= " o.movie_id = $prod";
}

$query .= " order by o.order_cost $sort";

$orders = $conn->query($query);
$movies = $conn->query("select * from s103574757_db.movies");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="GOI Cinemas - Enhancements" />
    <meta name="keywords" content="HTML,CSS,Javascript" />
    <meta name="author" content="Gang of Islands" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/style.css">
    <title>GOI - Manager</title>
</head>

<body id='managerBG'>
    <?php include_once 'includes/menu.php'; ?>

    <h1 class="assignment-related-page-title">Manager</h1>

    <form action="manager.php" method="get">
        <div id="searchOptionsContainer">
            <div class="formGroup">
                <label for="name">Customer name: </label>
                <input type="text" name="name" id="name" value="<?= $name ?>">
            </div>

            <div class="formGroup">
                <label for="sort">Sort order cost: </label>
                <select name="sort" id="sort">
                    <option value="desc" <?php echo $sort === "desc" ? 'selected' : '' ?>>Descending</option>
                    <option value="asc" <?php echo $sort === "asc" ? 'selected' : '' ?>>Ascending</option>
                </select>
            </div>

            <div class="formGroup">
                <label for="prod">Product:</label>
                <select name="prod" id="prod">
                    <!-- TODO: Can overwrite selected -->
                    <option value="" selected>-- ALL --</option>
                    <?php while ($row = mysqli_fetch_assoc($movies)) { ?>
                        <option value="<?php echo $row['movie_id'] ?>" <?php echo $row['movie_id'] === $prod ? 'selected' : '' ?>>
                            <?php echo $row['movie_name'] ?>
                        </option>
                    <?php } ?>
                </select>
            </div>

            <input class='confirmButton' type="submit" value="Search">
        </div>
    </form>


    <?php if ($orders->num_rows == 0) { ?>
        <p class="notFoundMsg">No entries were found.</p>
    <?php } else { ?>
        <table id="managerSearchTable">
            <tr>
                <th>ID</th>
                <th>Total cost</th>
                <th>First name</th>
                <th>Last name</th>
                <th>Status</th>
                <th>Product</th>
                <th>Action</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($orders)) { ?>
                <tr>
                    <td><?php echo $row['order_id']; ?></td>
                    <td>$<?php echo $row['order_cost']; ?></td>
                    <td><?php echo $row['first_name']; ?></td>
                    <td><?php echo $row['last_name']; ?></td>
                    <td><?php echo $row['order_status']; ?></td>
                    <td><?php echo $row['movie_name']; ?></td>
                    <td>
                        <!-- Send the user to the edit page (which fetches order data via order_id) -->
                        <a class="editLink" href="edit_order.php?id=<?php echo $row['order_id'] ?>">Edit</a>

                        <!-- Delete order by posting to delete_order.php. We need to use a form because JS is not allowed :( -->
                        <form id='deleteForm' action="delete_order.php" method="post">
                            <input type="hidden" name="id" value="<?php echo $row['order_id'] ?>">
                            <input class="deleteButton" type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            <?php } ?>
        <?php } ?>
        </table>

</body>

</html>