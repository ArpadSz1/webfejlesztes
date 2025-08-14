<?php
require_once("login.php");
require_once("database.php");
require_once("determinecolor.php");
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


$username = $_SESSION['username'];

set_color($username);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            margin-top: 50px;
        }
        .logout-button {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: red;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 20px;
        }
        .logout-button:hover {
            background-color: darkred;
        }
    </style>
</head>
<body>
<h1>Welcome, <?php echo htmlspecialchars($username); ?>!</h1>
    <form method="post" action="welcome.php">
        <input type="submit" name="logout" value="Logout">
    </form>
</body>
</html>

<?php
    if(isset($_POST["logout"])) {
        session_destroy();
        header("Location: index.php");
    }

?>