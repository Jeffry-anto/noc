<?php

$mysqli = new mysqli("localhost", "nocwebpage", "nocnptel@iitm", "NOC_db");

printf("Initial character set: %s\n", $mysqli->character_set_name());

if (!$mysqli->set_charset('utf8')) {
    printf("Error loading character set utf8: %s\n", $mysqli->error);
    exit;
}
?>