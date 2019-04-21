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
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="contactform/contactform.js"></script>

    <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>
<script>
$(function() {
    $('#profile-image1').on('click', function() {
        $('#profile-image-upload').click();
    });
});

function readURL(input, id, size) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $("#" + id).attr("src", e.target.result);
            // $("#" + id).attr("width", size);
        };

        reader.readAsDataURL(input.files[0]);
    }

}
</script>

<script>
$(document).ready(function() {
    console.log("on ready");

});
</script>

<body>
    <!--banner-->
    <section id="banner2">
        <div class="bg-color2">
            <header id="header">
                <div class="container">
                    <div id="mySidenav" class="sidenav">
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                        <a href="index.php">Home</a>
                        <a href="create-event.php">Create Event</a> <!-- Can allow this only after login -->
                        <a href="myprofile.php">Manage Profile</a> <!-- Can allow this only after login -->
                        <a href="controller/logout_controller.php">Logout</a>
                        <!-- <a href="register.php">Register</a> -->
                    </div>
                    <!-- Use any element to open the sidenav -->
                    <span onclick="openNav()" class="pull-right menu-icon">☰</span>
                    <div class="inner text-center">
                        <h1 class="logo-name2">Plan It</h1>
                    </div>
                </div>

            </header>
    </section>
    <!-- contact -->
    <section id="contact" class="section-padding">
        <div class="inner text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h1 class="header-h">Create Event</h1>
                    </div>
                </div>
                <div class="row msg-row">
                    <div class="col-md-8 col-sm-8 createevent">
                        <form action="controller/event_controller.php" method="post" role="form" class="contactForm">
                            <div id="sendmessage">Your event has been created. Thank you!</div>
                            <div id="errormessage"></div>
                            <div align="center"> <img alt="User Pic"
                                    src="https://x1.xingassets.com/assets/frontend_minified/img/users/nobody_m.original.jpg"
                                    id="profile-image1" class="img-circle img-responsive">

                                <input id="profile-image-upload" class="hidden" type="file"
                                    onchange="readURL(this , 'profile-image1','200px');">
                                <div style="color:#999;">click here to change profile image</div>
                                <!--Upload Image Js And Css-->
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form pad-form">
                                <div class="form-group label-floating is-empty">
                                    <input type="text" name="name" class="form-control" id="name"
                                        placeholder="Event Name" data-rule="minlen:4"
                                        data-msg="Please enter at least 4 chars" />
                                    <div class="validation"></div>
                                </div>

                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="date" class="form-control label-floating is-empty" name="date"
                                        id="date" placeholder="Date" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form pad-form">
                                <div class="form-group">
                                    <input type="email" class="form-control label-floating is-empty" name="email"
                                        id="email" placeholder="Email" data-rule="email"
                                        data-msg="Please enter a valid email" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="time" class="form-control label-floating is-empty" name="time"
                                        id="time" placeholder="Time" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control label-floating is-empty" name="phone"
                                        id="phone" placeholder="Phone" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control label-floating is-empty" name="people"
                                        id="Add People" placeholder="People" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control label-floating is-empty" name="host"
                                        id="host" placeholder="Host Name" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 contact-form">
                                <div class="form-group">
                                    <input type="text" class="form-control label-floating is-empty" name="venue"
                                        id="venue" placeholder="Venue" data-rule="required"
                                        data-msg="This field is required" />
                                    <div class="validation"></div>
                                </div>
                            </div>
                            <div class="col-md-12 contact-form">
                                <div class="form-group label-floating is-empty">
                                    <textarea class="form-control" name="message" rows="5" rows="3" data-rule="required"
                                        data-msg="Please write something for us"
                                        placeholder="Describe your event"></textarea>
                                    <div class="validation"></div>
                                </div>

                            </div>
                            <div class="col-md-12 btnpad">
                                <div class="contacts-btn-pad">
                                    <button class="contacts-btn">Create</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- / contact -->

    <!-- / contact -->
    <!-- footer -->
    <footer class="footer text-center">
        <div class="footer-top">
            <div class="row">
                <div class="col-md-offset-3 col-md-6 text-center">
                    <div class="widget">
                        <!-- <h4 class="widget-title">Plan it!</h4> -->
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