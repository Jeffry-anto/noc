<?php
function data_filter($data, $conn)
{
    // remove whitespaces from begining and end
    $data = trim($data);
    
    // apply stripslashes to pevent double escape if magic_quotes_gpc is enabled
    if(get_magic_quotes_gpc())
    {
        $data = stripslashes($data);
    }
    // connection is required before using this function
    $data = mysqli_real_escape_string($conn,$data);
    return $data;
}

?>