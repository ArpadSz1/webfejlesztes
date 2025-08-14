<?php
function validate_credentials($username, $password, $decrypted_data) {
    foreach ($decrypted_data as $line) {
        list($stored_username, $stored_password) = explode('*', trim($line));

        if ($username === $stored_username) {
            if ($password === $stored_password) {
                return 'success'; // Both username and password are correct
            }
            return 'wrong_password'; // Username correct, but password wrong
        }
    }
    return 'no_user'; // No such user found
}
?>