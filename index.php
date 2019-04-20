<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Plan It</title>
  <meta name="description" content="Free Bootstrap Theme by BootstrapMade.com">
  <meta name="keywords" content="free website templates, free bootstrap themes, free template, free bootstrap, free website template">

  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!-- =======================================================
    Theme Name: Delicious
    Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
    Author: BootstrapMade.com
    Author URL: https://bootstrapmade.com
  ======================================================= -->
</head>

<body>
  <!--banner-->
  <section id="banner">
    <div class="bg-color">
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#about">About</a>
            <a href="#event">Event</a>
            <a href="create-event.php">Create Event</a> <!-- Can allow this only after login -->
            <a href="myprofile.php">Manage Profile</a>  <!-- Can allow this only after login -->
          <a href="login.php">Login</a>
			<!-- <a href="register.php">Register</a> -->
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container">
        <div class="row">
          <div class="inner text-center">
            <h1 class="logo-name">Plan It</h1>
            <h2>Your party planner</h2>
            <p>Manage and Organise your events!</p>
            <a class="btn btn-imfo btn-read-more" href="create-event.php">Get Started</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / banner -->
  <!--about-->
  <section id="about" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Plan and Organize</h1>
          <p class="header-p">Hosting a party soon? Confused where to start? “Plan it” is solution to your problems.
            <br>Plan your event more effectively and efficiently using Plan it!</p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="col-md-6 col-sm-6">
            <div class="about-info">
              <h2 class="heading">Our Motivation</h2>
              <p>The purpose of the project is to make a website that helps Event hosts to plan an event. An event host can create an Event and add people to the group that will help him plan the event. The host can create tasks and assign them to the people in the group. Alternatively, the group members can also assign tasks to themselves and mark them as complete as they finish it. Thus, everyone on the group is aware of the current status of the planning thereby avoiding chaos.</p>
              <div class="details-list">
                <ul>
                  <li><i class="fa fa-check"></i>Create an event</li>
                  <li><i class="fa fa-check"></i>Manage your events</li>
                  <li><i class="fa fa-check"></i>Add organizers and friends to your planning committee</li>
                  <li><i class="fa fa-check"></i>Collaborate and build</li>
                  <li><i class="fa fa-check"></i>View similar events and create your own checklist</li>
                </ul>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <img src="img/res06.jpg" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </section>
  <!--/about-->
  <!-- event -->
  <section id="event">
    <div class="bg-color" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center" style="padding:60px;">
            <h1 class="header-h">Up Coming events</h1>
            <p class="header-p">Sneak into upcoming events</p>
          </div>
          <div class="col-md-12" style="padding-bottom:60px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="img/holi1.jpg" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>ISA Holi 2019</h2>
                  <p>Holi is also known as the “festival of love” as on this day people unite together forgetting all resentments and all types of bad feeling towards each other.</p>
                  <address>
                              <strong>Place: </strong>
                              Dunn Meadow, 900 E 7th St, 47408 Bloomington
                              <br>
                              <strong>Time: </strong>
                              04:00pm
                            </address>
                  <a class="btn btn-imfo btn-read-more" href="events-details.html">Read more</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ event -->
  <!-- menu -->
  <section id="menu-list" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Checkout other events and planners</h1>
          <p class="header-p">Feature hosts of trending events
            <br>Get inspired by their planning skills.</p>
        </div>

        <div class="col-md-12  text-center" id="menu-flters">
          <ul>
            <li><a class="filter active" data-filter=".menu-restaurant">Show All</a></li>
            <li><a class="filter" data-filter=".breakfast">Events</a></li>
            <li><a class="filter" data-filter=".lunch">Planners</a></li>
          </ul>
        </div>

        <div id="menu-wrapper">

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="breakfast menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Event Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">ddmmyyyy</span>
            </span>
            <span class="menu-subtitle">Planner name</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

          <div class="lunch menu-restaurant">
            <span class="clearfix">
              <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg">Planner Name</a>
              <span style="left: 166px; right: 44px;" class="menu-line"></span>
              <span class="menu-price">Number of Events</span>
            </span>
            <span class="menu-subtitle">located in</span>
          </div>

      </div>
    </div>
  </section>
  <!--/ menu -->
  <!-- contact -->
  <section id="contact" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="header-h">Have questions?</h1>
          <p class="header-p">Contact us for any queries and questions. </p>
        </div>
      </div>
      <div class="row msg-row">
        <div class="col-md-4 col-sm-4 mr-15">
          <div class="media-2">
            <div class="media-left">
              <div class="contact-phone bg-1 text-center"><span class="phone-in-talk fa fa-phone"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Phone Numbers</h4>
              <!-- <p class="light-blue regular alt-p">+812 0000000000 - <span class="contacts-sp">Call us</span></p> -->
              <p class="light-blue regular alt-p">+812 0000000000 </p>
            </div>
          </div>
          <div class="media-2">
            <div class="media-left">
              <div class="contact-email bg-14 text-center"><span class="hour-icon fa fa-clock-o"></span></div>
            </div>
            <div class="media-body">
              <h4 class="dark-blue regular">Working hours</h4>
              <p class="light-blue regular alt-p"> Monday to Friday 09.00 - 24:00</p>
              <p class="light-blue regular alt-p">
                Friday and Sunday 08:00 - 03.00
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-8 col-sm-8">
          <form action="" method="post" role="form" class="contactForm">
            <div id="sendmessage">Your booking request has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group label-floating is-empty">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="date" class="form-control label-floating is-empty" name="date" id="date" placeholder="Date" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form pad-form">
              <div class="form-group">
                <input type="email" class="form-control label-floating is-empty" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="time" class="form-control label-floating is-empty" name="time" id="time" placeholder="Time" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="phone" id="phone" placeholder="Phone" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 contact-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="people" id="people" placeholder="People" data-rule="required" data-msg="This field is required" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="col-md-12 contact-form">
              <div class="form-group label-floating is-empty">
                <textarea class="form-control" name="message" rows="5" rows="3" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                <div class="validation"></div>
              </div>

            </div>
            <div class="col-md-12 btnpad">
              <div class="contacts-btn-pad">
                <button class="contacts-btn">Send</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- / contact -->
  <!-- footer -->
  <footer class="footer text-center">
    <div class="footer-top">
      <div class="row">
        <div class="col-md-offset-3 col-md-6 text-center">
          <div class="widget">
            <h4 class="widget-title">Plan it!</h4>
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
