<?php

function input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

function ceksession() {
    if (isset($_SESSION['username']) && ) {
        
    }
}

?>