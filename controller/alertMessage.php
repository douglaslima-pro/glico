<?php

function alertMessage($alertClass,$iconClass,$title,$text) {
    // creates an array with the message details
    $msg = array(
        "alertClass" => $alertClass,
        "iconClass" => $iconClass,
        "title" => $title,
        "text" => $text
    );
    /*
        1. Serialize the array into a string representation
        2. Encode the array to an URL format
        3. Return the value
    */
    return urlencode(serialize($msg));
}

?>