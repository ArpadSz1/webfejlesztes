<?php
require_once 'decrypt.php';
require_once 'validate.php';
require_once 'database.php';
require_once 'utils.php';
require_once 'determinecolor.php';
session_start();

function handle_login($username, $password) {
    $key = [5, -14, 31, -9, 3];
    $file_path = 'password.txt';

    // Decrypt the password file
    $decrypted_data = decrypt_password_file($file_path, $key);
    
    // Generates a decrypted password file for testing purposes
    file_put_contents('decrypted_users.txt', implode("\n", $decrypted_data));
    // Validate credentials
    $validation_result = validate_credentials($username, $password, $decrypted_data);

    // Handle validation results
    if ($validation_result === 'no_user') {
        echo "<script>alert('No such user.');</script>";
    } elseif ($validation_result === 'wrong_password') {
        display_redirect_message('Wrong password. Redirecting to police.hu...', 'https://www.police.hu', 3000);
    } else {
        echo "<script>alert('Login successful!');</script>";
        $_SESSION['username'] = $username;
        header("Location: welcome.php");
    }
}
?>
