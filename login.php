<?php
session_start();

if (isset($_SESSION['user'])) {
    header("Location: readingdata.php");
    exit();
}

$valid_username = 'user';
$valid_password = 'user';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $entered_username = isset($_POST['username']) ? $_POST['username'] : '';
    $entered_password = isset($_POST['password']) ? $_POST['password'] : '';

    if ($entered_username === $valid_username) {
        if ($entered_password === $valid_password) {

            $_SESSION['user'] = $entered_username;
            header("Location: readingdata.php");
            exit();
        } else {

            $error_message = "Incorrect password";
        }
    } else {

        $error_message = "Incorrect username";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Basic -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Site Metas -->
    <meta name="keywords" content="Data Form with php" />
    <meta name="description" content="Data Form" />
    <meta name="author" content="Snivanova" />
    <title>Login Page</title>
    <!-- bootstrap  -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

    <!-- fonts style -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Poppins:400,700&display=swap"
        rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet" />
    <!-- responsive style -->
    <link href="css/responsive.css" rel="stylesheet" />
</head>

<body class="sub_page">
    <div class="hero_area">
        <!-- header section strats -->
        <header class="header_section">
            <div class="container-fluid">
                <nav class="navbar navbar-expand-lg custom_nav-container pt-3">
                    <a class="navbar-brand" href="index.php">
                        <span> SnIvanova </span>
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#"> About </a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="#"> Portfolio </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php">Contact us</a>
                                </li>

                            </ul>
                            <div class="user_option">
                                <?php if (isset($_SESSION['user'])): ?>
                                    <form action="" method="post">
                                        <button type="submit" name="logout_button" class="nav-link btn-link">Logout</button>
                                    </form>
                                <?php else: ?>
                                    <a href="login.php">
                                        <img src="images/user.png" alt="" />
                                    </a>
                                <?php endif; ?>

                                <form class="form-inline my-2 my-lg-0 ml-0 ml-lg-4 mb-3 mb-lg-0">
                                    <button class="btn my-2 my-sm-0 nav_search-btn" type="submit"></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>
        <!-- end header section -->
    </div>
    <section class="contact_section layout_padding">
        <div class="container">
            <div class="heading_container">
                <h2>Login</h2>
                <p>
                    <?php if (isset($error_message)): ?>
                    <p style="color: red;">
                        <?php echo $error_message; ?>
                    </p>
                <?php endif; ?>
                </p>
            </div>
            <div class="">
                <div class="">
                    <div class="row">
                        <div class="col-md-4 mx-auto">
                            <div class="contact-form">
                                <form action="login.php" method="post">
                                    <label for="username">Username:</label>
                                    <input type="text" id="username" name="username" required />
                                    <br />
                                    <label for="password">Password:</label>
                                    <input type="password" id="password" name="password" required />
                                    <br />
                                    <button class="" type="submit">Login</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


</body>

</html>