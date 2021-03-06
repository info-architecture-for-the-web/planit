<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Plan It</title>
    <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
    <meta name="keywords"
        content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
    <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">\

    <style>
    *[role="form"] {
        max-width: 530px;
        padding: 15px;
        margin: 0 auto;
        border-radius: 0.3em;
        background-color: #f2f2f2;
    }

    *[role="form"] h2 {
        font-family: 'Satisfy', sans-serif;
        font-size: 40px;
        font-weight: 600;
        color: #000000;
        margin-top: 5%;
        text-align: center;
        /*text-transform: uppercase;*/
        letter-spacing: 4px;
    }
    </style>

    <script>
    var check = function() {
        if (document.getElementById('password').value ==
            document.getElementById('confirmpassword').value) {
            document.getElementById('message').style.color = 'green';
            document.getElementById('message').innerHTML = "Passwords match";
        } else {
            document.getElementById('message').style.color = 'red';
            document.getElementById('message').innerHTML = "Passwords do not match";
        }
    }
    </script>

</head>

<body>
    <!--banner-->
    <section id="banner">
        <div class="bg-color">
            <header id="header">
                <div class="container">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="index.php">Home</a>
                        <a href="login.php">Login</a>
                        <a href="#about">About</a>

                    </div>
                    <!-- Use any element to open the sidenav -->
                    <span onclick="openNav()" class="pull-right menu-icon">☰</span>
                </div>
            </header>
            <div class="container">
                <div class="row">
                    <div class="inner text-center">

                        <div class="container">

                            <form class="form-horizontal" method="post" action="controller/signup_controller.php"
                                role="form">

                                <h2 font-family="verdana">Registration</h2>
                                <div class="form-group">
                                    <label for="fullName" class="col-sm-3 control-label">Full Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="Full Name" name="fullname" placeholder="Full Name"
                                            class="form-control" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="userName" class="col-sm-3 control-label">User Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" id="userName" name="username" placeholder="User Name"
                                            class="form-control" autofocus required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="email" class="col-sm-3 control-label">Email </label>
                                    <div class="col-sm-9">
                                        <input type="email" id="email" name="email" placeholder="Email"
                                            class="form-control" name="email"
                                            pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="password" class="col-sm-3 control-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="password" name="password" placeholder="Password"
                                            class="form-control" onkeyup='check();' required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="confirmpassword" class="col-sm-3 control-label">Confirm Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" id="confirmpassword" name="confirmpassword"
                                            placeholder="Confirm Password" class="form-control" onkeyup='check();'
                                            required>
                                        <span id='message'></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="phoneNumber" class="col-sm-3 control-label">Phone number </label>
                                    <div class="col-sm-9">
                                        <input type="phoneNumber" id="phoneNumber" name="phone"
                                            placeholder="Phone number" class="form-control"
                                            pattern="\d{3}[\-]\d{3}[\-]\d{4}" required>
                                        <span class="help-block">Format: 123-456-7890 </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3">Gender</label>
                                    <div class="col-sm-6">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <label class="radio-inline">
                                                    <input type="radio" id="fradio" name="r" value="Female"
                                                        required>Female
                                                </label>
                                            </div>
                                            <div class="col-sm-4">
                                                <label class="radio-inline">
                                                    <input type="radio" id="mradio" name="r" value="Male" required>Male
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div> <!-- /.form-group -->
                                <!--
                <div class="form-group">
                    <div class="col-sm-9 col-sm-offset-3">
                        <span class="help-block">*Required fields</span>
                    </div>
                </div>
-->
                                <button type="submit" class="btn btn-primary btn-block">Register</button>
                            </form> <!-- /form -->
                        </div> <!-- ./container -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / banner -->

    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <h4 class="widget-title">Plan It</h4>
                        <address>Indiana Univeristy<br>Bloomington</address>
                        <div class="social-list">
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- / footer -->

    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

</body>

</html>