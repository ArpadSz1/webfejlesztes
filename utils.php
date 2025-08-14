<?php
function display_redirect_message($message, $redirect_url, $timeout = 3000) {
    echo "
    <style>
        #overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 1000;
            cursor: wait;
        }
        #message {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            background-color: red;
            color: white;
            font-size: 18px;
            border-radius: 8px;
            text-align: center;
            z-index: 1001; /* Higher than the overlay */
        }
    </style>

    <div id='overlay'></div>
    <div id='message'>$message</div>
    <script>
        setTimeout(function() {
            window.location.href = '$redirect_url';
        }, $timeout);
    </script>
    ";
}
?>