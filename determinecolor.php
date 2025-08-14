<?php
    require_once("database.php");


    function determine_color($username){
        global $connection;

        $sql = "SELECT Titkos FROM adatok WHERE username = '$username'";
        $result = mysqli_query($connection, $sql);

        // Check if the query was successful
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            return $row['Titkos'];
        } else {
            return null;
        }
    }

    function set_color($username){
        $color = determine_color($username);
        $style = "width: 200px; height: 200px; margin: auto; text-align: center;";
    
        switch ($color){
            case "piros":
                echo "<div style='background-color: red; $style'></div>";
                break;
            case "zold":
                echo "<div style='background-color: green; $style'></div>";
                break;
            case "sarga":
                echo "<div style='background-color: yellow; $style'></div>";
                break;
            case "kek":
                echo "<div style='background-color: blue; $style'></div>";
                break;
            case "fekete":
                echo "<div style='background-color: black; $style'></div>";
                break;
            case "feher":
                echo "<div style='background-color: white; $style; border: 1px solid black;'></div>";
                break;
            default:
                echo "<div style='background-color: purple; $style'></div>";
                break;
        }
    }
    

?>