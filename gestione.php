<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION['full_name'] = $_POST['full_name'];
    $_SESSION['phone_number'] = $_POST['phone_number'];
    $_SESSION['email'] = $_POST['email'];
    $_SESSION['message'] = $_POST['message'];

    header("Location: readingdata.php");
    exit();
}


?>