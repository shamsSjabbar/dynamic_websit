<?php

session_start();//start session
session_unset();// unset the data
session_destroy();//destroy the session
header("location: log_in_doctor.php");
exit();




?>