<?php

    function decrypt_password_file($file_path, $key) {
        $content = file_get_contents($file_path); // Read file content
        $lines = explode("\n", $content); // Split by line
        $decrypted_lines = []; // Array to store decrypted lines

        foreach ($lines as $line) {
            if (empty(trim($line))) continue; // Skip empty lines

            $decrypted_line = '';
            $key_length = count($key);
            $key_index = 0;

            for ($i = 0; $i < strlen($line); $i++) {
                $char = $line[$i];
                $char_code = ord($char); // Get ASCII value

                // Skip end of line character
                if ($char_code === 10) {
                    $decrypted_line .= "\n";
                    continue;
                }

                // Apply decryption by reversing the key offset
                $decoded_char = chr($char_code - $key[$key_index]);
                $decrypted_line .= $decoded_char;

                // Cycle through the key
                $key_index = ($key_index + 1) % $key_length;
            }

            $decrypted_lines[] = $decrypted_line;
        }
        return($decrypted_lines);
    }
?>