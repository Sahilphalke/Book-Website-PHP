<?php

include 'CONNECT.PHP';

session_start();
session_unset();
session_destroy();

header('location:BOOK.PHP');



?>