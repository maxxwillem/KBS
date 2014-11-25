<?php

//altijd session starten eerst, ookal is die al bezig
session_start();

//verwijder alle sessie variabelen
session_unset();

//stop de sessie
session_destroy();

//als je uitlogd ga je weer naar LoginForm.php
header("location: index.php");
?>
