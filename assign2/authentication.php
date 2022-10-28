<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta name="description" content="GOI Cinemas - Authentication" />
        <meta name="keywords" content="HTML,CSS,Javascript" />
        <meta name="author" content="Gang of Islands" />
        <link rel="stylesheet" href="./styles/style.css">
    </head>
    <body>
        <?php
            require_once("./db.php");
            require_once("./functions/functions.php");

            // If the users table doesn't already exists, create it.
            // We can check if a table exists be selecting a single entry from it
            // However, on some setups this causes an exception so we handle it to be safe
            try {                
                if ($conn->query('select * from s103574757_db.users limit 1') == false) {
                    // Go to the catch block which contains the creation query
                    throw new Exception();
                }
            } catch (Exception $e) {
                $query = "CREATE TABLE s103574757_db.users (
                    id int(10) AUTO_INCREMENT,
                    username varchar(50) NOT NULL,
                    password varchar(50) NOT NULL
                )";
            }

            if (isset($_GET["username"]) && isset($_GET['password'])) {
                $username = sanitise_input($_GET["username"]);
                $password = sanitise_input($_GET["password"]);

                $user_query_sql= "SELECT * FROM s103574757_db.users WHERE username = '$username' AND password = '$password';";
                $result = $conn->query($user_query_sql);
               
                if ($result->num_rows == 0) {
                    header("Location: ./login_form.php?error_msg=AccessDenied");
                } else {
                    header("Location: ./manager.php");
                }
            }
        ?>
    </body>
</html>
