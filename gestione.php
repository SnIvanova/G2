<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $formSubmission = array(
        'full_name' => $_POST['full_name'],
        'phone_number' => $_POST['phone_number'],
        'email' => $_POST['email'],
        'message' => $_POST['message'],
        'file_path' => null,
    );

    if ($_FILES['file']['error'] == 0) {
        $targetDir = "uploads/";
        $targetFile = $targetDir . basename($_FILES['file']['name']);
        move_uploaded_file($_FILES['file']['tmp_name'], $targetFile);
        $_SESSION['file_path'] = $targetFile;
    }

    $formSubmissions = isset($_SESSION['form_submissions']) ? $_SESSION['form_submissions'] : array();

    $formSubmissions[] = $formSubmission;
    $_SESSION['form_submissions'] = $formSubmissions;

    header("Location: readingdata.php");
    exit();
}


?>