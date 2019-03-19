<!DOCTYPE HTML>
<html>
    <head>
        <title>Plan It!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
    </head>
    <body class="homepage is-preload">
        <div id="page-wrapper">

            <!-- Header -->
            <section id="header">

                <!-- Logo -->
                <h1><a href="index.php">Plan It!</a></h1>

                <!-- Nav -->
                <nav id="nav">
                    <ul>
                        <li class="current"><a href="index.php">Home</a></li>
                        <li>
                            <a href="#">Services</a>
                            <ul>
                                <li><a href="#">My Groups</a></li>
                                <li><a href="#">My Cart</a></li>
                                <li>
                                    <a href="#">Events</a>
                                    <ul>
                                        <li><a href="createEvent.php">Create Events</a></li>
                                        <li><a href="#">Search Events</a></li>
                                        <li><a href="#">My Events</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li><a href="index.php">About Us</a></li>
                        <li><a href="login.php">Login/ Signup</a></li>
                    </ul>
                </nav>

                <!-- Banner -->
                <section id="banner2">
                    <header>

                        <form id="contactform" action = "login_auth.php" method="post"> 
                            <input style="margin-bottom: 3%;" id="username" name="username" placeholder="username" required="" tabindex="2" type="text"> 
                            <input style="margin-bottom: 3%;" type="password" id="password" name="password" required="" placeholder="password"> 
                            <button>Login</button>
                        </form>
                    </header>
                    <p>New User? <a href="signup.php">Sign Up Here</a></p>  

                </section>


                <!-- Scripts -->
                <script src="assets/js/jquery.min.js"></script>
                <script src="assets/js/jquery.dropotron.min.js"></script>
                <script src="assets/js/browser.min.js"></script>
                <script src="assets/js/breakpoints.min.js"></script>
                <script src="assets/js/util.js"></script>
                <script src="assets/js/main.js"></script>

                </body>
                </html>