<!DOCTYPE HTML>
<html>
    <head>
        <title>Plan It!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
        <link rel="stylesheet" href="assets/css/main.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/demo.css" />
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


            </section>

            <!-- Main -->
            <section id="main">
                <div class="container">
                    <h3>Enter event details</h3>
                    <!-- Form -->
                    <div  class="form">
                        <form id="eventform"> 
                            <input id="name" name="name" placeholder="Name of the event" required="" tabindex="1" type="text"> 

                            <input id="email" name="email" placeholder="example@domain.com" required="" type="email"> 

                            <input id="username" name="username" placeholder="Organizer name" required="" tabindex="2" type="text"> 

                            <input id="date" name="date" placeholder="MM/DD/YYYY" required="" tabindex="2" type="text"> 

                            <input id="guests" name="guests" placeholder="Number of Attendees" required="" tabindex="2" type="text"> 

                            <input id="venue" name="venue" placeholder="Event Location" required="" tabindex="2" type="text"> 

                            <input id="phone" name="phone" placeholder="phone number" required="" type="text"> <br>

                            <input class="buttom" name="submit" id="submit" tabindex="5" value="Create Event" type="submit"> 	 
                        </form> 
                    </div>  

                </div>
            </section>
        </div>

        <!-- Scripts -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/jquery.dropotron.min.js"></script>
        <script src="assets/js/browser.min.js"></script>
        <script src="assets/js/breakpoints.min.js"></script>
        <script src="assets/js/util.js"></script>
        <script src="assets/js/main.js"></script>

    </body>
</html>