<?php
session_start();

$userLoggedIn = isset($_SESSION['user']);

if (isset($_POST['logout_button'])) {
    unset($_SESSION['user']);
    header("Location: login.php");
    exit();
}

if (isset($_SESSION['form_submissions']) && !empty($_SESSION['form_submissions'])) {
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

        <title>Data Page</title>

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
                    <h2>Thank You!</h2>
                    <p></p>
                </div>

                <?php
                foreach ($_SESSION['form_submissions'] as $index => $formSubmission) {
                    $full_name = $formSubmission['full_name'];
                    $phone_number = $formSubmission['phone_number'];
                    $email = $formSubmission['email'];
                    $message = $formSubmission['message'];
                    $file_path = isset($formSubmission['file_path']) ? $formSubmission['file_path'] : '';
                    ?>

                    <div class="">
                        <div class="">
                            <div class="row">
                                <div class="col-md-4 mx-auto">
                                    <div class="contact-form">
                                        <form action="" method="post">
                                            <ul>
                                                <div>
                                                    <li><strong>Full Name:</strong>
                                                        <?php echo $full_name; ?>
                                                    </li>
                                                </div>
                                                <div>
                                                    <li><strong>Phone Number:</strong>
                                                        <?php echo $phone_number; ?>
                                                    </li>
                                                </div>
                                                <div>
                                                    <li><strong>Email Address:</strong>
                                                        <?php echo $email; ?>
                                                    </li>
                                                </div>
                                                <div>
                                                    <li><strong>Message:</strong>
                                                        <?php echo $message; ?>
                                                    </li>
                                                </div>

                                                <?php if (!empty($file_path)): ?>
                                                    <div>
                                                        <li><strong>File Attachment:</strong> <a href="<?php echo $file_path; ?>"
                                                                target="_blank">Download File</a></li>
                                                    </div>
                                                <?php endif; ?>
                                            </ul>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
                <?php
                }
                ?>

            <form action="" method="post">
                <button class="bn31" type="submit" name="clear_data_button">
                    <span class="bn31span">Clear Data</span>
                </button>
            </form>

            <?php
            if (isset($_POST['clear_data_button'])) {
                unset($_SESSION['form_submissions']);
            }
            ?>

            <div class="map_img-box">
                <img src="images/map-img.png" alt="" />
            </div>
            </div>
        </section>

        <!-- info section -->
        <section class="info_section">
            <div class="container">
                <div class="row">
                    <div class="col-md-3">
                        <div class="info_contact">
                            <h5>About Shop</h5>
                            <div>
                                <div class="img-box">
                                    <img src="images/location-white.png" width="18px" alt="" />
                                </div>
                                <p>Address</p>
                            </div>
                            <div>
                                <div class="img-box">
                                    <img src="images/telephone-white.png" width="12px" alt="" />
                                </div>
                                <p>+01 1234567890</p>
                            </div>
                            <div>
                                <div class="img-box">
                                    <img src="images/envelope-white.png" width="18px" alt="" />
                                </div>
                                <p>demo@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_info">
                            <h5>Informations</h5>
                            <p>
                                ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                eiusmod tempor incididunt
                            </p>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="info_insta">
                            <h5>Instagram</h5>
                            <div class="insta_container">
                                <div>
                                    <a href="">
                                        <div class="insta-box b-1">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="insta-box b-2">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                </div>

                                <div>
                                    <a href="">
                                        <div class="insta-box b-3">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="insta-box b-4">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                </div>
                                <div>
                                    <a href="">
                                        <div class="insta-box b-3">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                    <a href="">
                                        <div class="insta-box b-4">
                                            <img src="images/insta.png" alt="" />
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="info_form">
                            <h5>Newsletter</h5>
                            <form action="">
                                <input type="email" placeholder="Enter your email" />
                                <button>Subscribe</button>
                            </form>
                            <div class="social_box">
                                <a href="">
                                    <img src="images/fb.png" alt="" />
                                </a>
                                <a href="">
                                    <img src="images/twitter.png" alt="" />
                                </a>
                                <a href="">
                                    <img src="images/linkedin.png" alt="" />
                                </a>
                                <a href="">
                                    <img src="images/youtube.png" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- end info_section -->

        <!-- footer section -->
        <section class="container-fluid footer_section">
            <p>
                &copy; 2024 All Rights Reserved By
            </p>
        </section>
        <!-- footer section -->

        <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>



        <script type="text/javascript">
            document.addEventListener("DOMContentLoaded", function () {
                if (window.history.replaceState) {
                    window.history.replaceState(null, null, window.location.href);
                }
            });
        </script>

    </body>

    </html>
    <?php
} else {
    header("Location: index.php");
    exit();
}
?>