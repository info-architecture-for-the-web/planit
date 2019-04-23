<!DOCTYPE html>
<html lang="en">
   <?php
      //    echo "hi".$_SERVER['DOCUMENT_ROOT'];
      require $_SERVER['DOCUMENT_ROOT'] . "/planit/dbconnection/dbconnect.php";
      include 'model/profile_model.php';
      include 'model/friends_model.php';
      include 'model/event_model.php';
      include 'model/task_model.php';
      $prof = getProfile($_SESSION['username']);
      $friendArray = getFriends($_SESSION['username']);
      $eventArray = getEvents($_SESSION['username']);
      $taskArray = getTasksByUsername($_SESSION['username']);
      $allfriends = getAllUsers();
      //    echo $prof->email;

      if(isset($_GET["searchText"])){
        $searchResults = getSearchResult($_GET["searchText"]);
        //print_r($searchResults);
    }
    function getSearchResult($searchText){
            $allfriends = getAllUsers();
            //print_r($allfriends);
            $frienddisplay = array();
            //print_r($allfriends);
          foreach($allfriends as $friend){
              
            if (strpos(strtolower($friend->fname), strtolower($searchText)) !== false){
                
                array_push($frienddisplay,$friend);
            }
            }
            
            return $frienddisplay;
    }
      ?>
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
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
      <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" />
      <!-- =======================================================
         Theme Name: Delicious
         Theme URL: https://bootstrapmade.com/delicious-free-restaurant-bootstrap-theme/
         Author: BootstrapMade.com
         Author URL: https://bootstrapmade.com
         ======================================================= -->
      <script>
         $(function() {
             $('#profile-image1').on('click', function() {
                 $('#profile-image-upload').click();
             });
         });
      </script>
      <script src="js/jquery.min.js"></script>
      <script src="js/jquery.easing.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="contactform/contactform.js"></script>
      <script>
         $(document).ready(function() {
             console.log("on ready");
         
         });
         
         function saveChanges() {
             //			var newFullName = $( '#fullname' ).html();
             var newEmail = $('#email').val();
             var newPhone = $('#phone').val();
         
             console.log(newEmail + " " + newPhone);
         }
         
         function getPeople() {
             console.log("ok");
             $_SESSION['searchText'] = $_GET['searchText'];
             
         }
      </script>
   </head>
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
      <!-- Search form -->
      <form action="search-people.php" method="GET" role="form">
      <div style="display:flex;" class="box-body">
         <input id="searchText"name ="searchText" class="form-control" style="margin: 10px; width:98.5%;" type="text" placeholder="Search"
            aria-label="Search">
         <button class="btn btn-primary" style="margin: 10px;" value="" type="submit">Search</button>
      </div>
      </form>
      <form  action="controller/email_controller.php?purpose=3&from=<?php echo $_SESSION['username']; ?>"
            method="post" role="form">
         <div class="panel-body">
            <div class="box box-info">
               <div class="box-body">
                  <div class="col-sm-12">
                     <div class="panel panel-warning" id="result_panel">
                        <div class="panel-heading">
                           <h5 class="heading">
                           People</h3>
                        </div>
                        <div class="panel-body">
                           <ul class="list-group">
                              <?php
                              $data = array();
                              if(isset($searchResults)){
                                 $data =  $searchResults; 
                              }else{
                                  $data = $allfriends;
                              }
                                 foreach ($data as $friend) {
                                    ?>
                              <li class="list-group-item" style="text-align: left">
                                 <div style="display: flex; width: 100%;">
                                    <input type="checkbox" class="form-check-input" id="check" name="friends[]"
                                       value="<?php echo $friend->fusername; ?>">
                                    <strong>
                                    <span><?php echo $friend->fname; ?></span>
                                 </div>
                              </li>
                              <?php }?>
                           </ul>
                           <button type="submit" class="btn btn-primary" style="align: center">Add Friend</button>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </form>
      </div>
   </body>
</html>