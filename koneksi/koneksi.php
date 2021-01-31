<?php

    $mysqli = new mysqli("localhost", "root", "", "rental");

    if ($mysqli->connect_errno) {
        echo "Failed to connect to MySql : (" .$mysqli->connect_errno. ") - ".$mysqli->connect_error;
        $mysqli->close;
    }

?>