<?php
  require("functions/select_all_function.php");
?>
<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Rental Platform</title>

    <!-- Bootstrap core CSS -->
    <link href="./vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="./vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="./dist/css/agency.min.css" rel="stylesheet">

    <style type="text/css">
      .modal-dialog{
        overflow-y: initial !important;
      }
      .modal{
        height:650px;
        width: 950px;
        overflow-y:auto;
        margin-left: 200px;
      }
    </style>

  </head>

  <body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Rental Platform</a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#portfolio">Rent</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="btnHost" href="#modalhost">Host</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#contact">Contact</a>
            </li>
            <li class="nav-item" id="btnloginas">
              <a class="nav-link">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead">
      <div class="container">
        <div class="intro-text">
          <div class="intro-lead-in">Welcome to Rental Platform!</div>
          <div class="intro-heading text-uppercase">We're Glad You're Here</div>
          <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#about">Tell Me About Rental Platform</a>
        </div>
      </div>
    </header>

    <!-- Portfolio Grid -->
    <section class="bg-light" id="portfolio">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">Available Rooms</h2>
            <h3 class="section-subheading text-muted">Explore available rooms anywhere with us.</h3>
          </div>
        </div>
        <div class="row">
        <?php
          $all_apartment = all_apartment();
          $all_apartment = json_decode($all_apartment);

          foreach ($all_apartment as $value) {
          ?>
          <div class="col-md-4 col-sm-6 portfolio-item">
            <a class="portfolio-link" id="btnView" data-id="<?php echo $value -> {'apartment_id'}; ?>">
              <div class="portfolio-hover">
                <div class="portfolio-hover-content">
                  <i>See Full Details</i>
                </div>
              </div>
              <img class="img-fluid" src="./img/portfolio/02-thumbnail.jpg" alt="">
            </a>
            <div class="portfolio-caption">
              <h4><?php echo $value -> {'apartment_name'}; ?></h4>
              <p class="text-muted"><?php echo $value -> {'apartment_address'}; ?></p>
            </div>
          </div>
        <?php
          }
        ?>
        </div>
      </div>
    </section>

    <!-- About -->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase">About Rental Platform</h2>
            <h3 class="section-subheading text-muted">Know more about us and what we do.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <ul class="timeline">
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="./img/about/wo.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>What is</h4>
                    <h4 class="subheading">Rental Platform?</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Rental Platform is an online platform that works like a marketplace by connecting people, called tenant, who are looking for a room to rent, and people, called hosts, who are offering their available rooms to be rented by tenants. </p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="./img/about/w.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>What does</h4>
                    <h4 class="subheading">Rental Platform do?</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Rental Platform makes it happen for prospect tenants to be able to find available rooms, offered by the hosts online using also this very platform, everywhere as easy and as fast as possible. </p>
                  </div>
                </div>
              </li>
              <li>
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="./img/about/wo.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>Why is Rental</h4>
                    <h4 class="subheading">Platform important?</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Rental Platform helps prospect tenants to find available rooms and have more choices, and at the same time, will help hosts have greater market or prospect tenants with the use of internet and this platform.</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <img class="rounded-circle img-fluid" src="./img/about/w.png" alt="">
                </div>
                <div class="timeline-panel">
                  <div class="timeline-heading">
                    <h4>How does it differ</h4>
                    <h4 class="subheading">from the other platform?</h4>
                  </div>
                  <div class="timeline-body">
                    <p class="text-muted">Unlike other platforms, it also has management tools for hosts to easily manage their rooms, computing and collecting payments, evaluating boarders’ performance and reminding them regarding their bills without consuming so much time and effort. Ain't it great?</p>
                  </div>
                </div>
              </li>
              <li class="timeline-inverted">
                <div class="timeline-image">
                  <h4>Now You
                    <br>Know Us
                    <br>Better!</h4>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact -->
    <section id="contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <h2 class="section-heading text-uppercase" style="color:gray;">Contact Us</h2>
            <h3 class="section-subheading text-muted">For inquiries and other information.</h3>
          </div>
        </div>
        <div class="row">
          <div class="col-lg-12">
            <form id="contactForm" name="sentMessage" novalidate="novalidate">
              <div class="row">
                
                <div class="col-md-4" style="text-align:right;color:#f07b14;">
                  <br>
                  <div class="form-group">
                    <h3>Mobile:</h3>
                  </div><br><br>
                  <div class="form-group">
                    <h3>Telephone:</h3>
                  </div><br>
                  <div class="form-group">
                    <h3>Email:</h3>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <input class="form-control" type="text" value="+639-21-246-1703" disabled="true">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="email" value="911-1111" disabled="true">
                    <p class="help-block text-danger"></p>
                  </div>
                  <div class="form-group">
                    <input class="form-control" type="tel" value="rentalplatform@gmail.com" disabled="true">
                    <p class="help-block text-danger"></p>
                  </div>
                </div>
                <div class="clearfix"></div>
                <div class="col-lg-12 text-center">
                  <div id="success"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer -->
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <span class="copyright">Copyright &copy; Your Website 2018</span>
          </div>
          <div class="col-md-4">
          </div>
          <div class="col-md-4">
            <ul class="list-inline quicklinks">
              <li class="list-inline-item">
                <a href="#">Privacy Policy</a>
              </li>
              <li class="list-inline-item">
                <a href="#">Terms of Use</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>

    <!-- Portfolio Modals -->


    

    
<!-- This is the Modal that will be called for read btn -->
          <!-- <div id = "portfolioModal1" class = "modal fade"  role = "dialog">
            <div class = "modal-dialog">

              <div class="modal-content">
                <div class = "modal-header">
                  <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                        <h4 class ="modal-title">  </h4>
                      </div>
                      <div class="modal-body"  id="apartment_detail">
                       
                      </div>
                    </div>
              </div>
            </div> -->



    <!-- Modal 1 -->
    <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body" id="apartment_detail">
                  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Modal for viewing room of apartment -->
    <div class="portfolio-modal modal fade" id="roomModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase" id="r_room"></h2>
                  <p class="item-intro text-muted" id="r_address"></p>
                  <img class="img-fluid d-block mx-auto" src="./img/portfolio/01-full.jpg" alt="">
                  <p id="r_description"></p>
                  <ul class="list-inline" style="text-align:left;">
                    <li>Host: &emsp; <label style="font-weight:bold;" id="r_host"></label></li>
                    <li>Contact: &emsp; </li>
                      <ul class="list" style="text-align:left;">
                        <li>Mobile: <label style="font-weight:bold;" id="r_mobile"></label></li>
                        <li>Email: <label style="font-weight:bold;" id="r_email"></label></li>
                      </ul>
                    <li>Price: &emsp; <label style="font-weight:bold;" id="r_rent_rate"></label></li>
                  </ul>
                  <button class="btn btn-primary"><a id="applyroom" style="font-weight:bold;text-decoration:none;color:white;">Apply</a></button>
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                    Close</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Modal 1 for Apply Room 101 -->
    <div class="portfolio-modal modal fade" id="applyroomModal1" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase" id="a_room_name"></h2>
                  <p class="item-intro text-muted" id="a_address"></p>
                  <ul class="list-inline" style="text-align:left;">
                    <form id = "tenant_form">
                      <div class="form-group">
                        <label>First Name: </label>
                        <input class="form-control" type="text" id="t_first">
                      </div>
                      <div class="form-group">
                        <label>Middle Name: </label>
                        <input class="form-control" type="text" id="t_middle">
                      </div>
                      <div class="form-group">
                        <label>Last Name: </label>
                        <input class="form-control" type="text" id="t_last">
                      </div>
                      <div class="form-group">
                        <label>Birthdate: </label>
                        <input class="form-control" type="date" id="t_birthdate">
                      </div>
                      <div class="form-group">
                        <label>Gender: </label>
                        <input style="width:30%;" type="radio" name="t_gender" value="1" checked>Male
                        <input style="width:30%;" type="radio" name="t_gender" value="0">Female
                      </div>
                      <div class="form-group">
                        <label>Contact No: </label>
                        <input class="form-control" type="text" id="t_contact">
                      </div>
                      <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" type="text" id="t_email">
                      </div>
                    </form>
                  </ul>
                  <button class="btn btn-primary" id="SubmitApplyRent" type="button">
                    Send Application</button>
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>


<!-- Modal 1 for Host -->
    <div class="portfolio-modal modal fade" id="modalhost" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="close-modal" data-dismiss="modal">
            <div class="lr">
              <div class="rl"></div>
            </div>
          </div>
          <div class="container">
            <div class="row">
              <div class="col-lg-8 mx-auto">
                <div class="modal-body">
                  <!-- Project Details Go Here -->
                  <h2 class="text-uppercase">Host Application Form</h2>
                  <p class="item-intro text-muted">Fill out the form and wait for verification and admin approval.</p>
                  <ul class="list-inline" style="text-align:left;">
                    <form id = "host">
                      <div class="form-group">
                        <label>First Name: </label>
                        <input class="form-control" type="text" id="h_first_name">
                      </div>
                      <div class="form-group">
                        <label>Middle Name: </label>
                        <input class="form-control" type="text" id="h_middle_name">
                      </div>
                      <div class="form-group">
                        <label>Last Name: </label>
                        <input class="form-control" type="text" id="h_last_name">
                      </div>
                      <div class="form-group">
                        <label>Birthdate: </label>
                        <input class="form-control" type="date" id="h_birth_date">
                      </div>
                      <div class="form-group">
                        <label>Gender: </label>
                        <div class="form-control">
                          <input style="width:30%;" type="radio" name="h_gender" value="1" checked>Male
                          <input style="width:30%;" type="radio" name="h_gender" value="0">Female
                        </div>
                      </div>
                      <div class="form-group">
                        <label>Contact No: </label>
                        <input class="form-control" type="text" id="h_contact_no">
                      </div>
                      <div class="form-group">
                        <label>Email: </label>
                        <input class="form-control" type="email" id="h_email">
                      </div>
                      <div class="form-group">
                        <label>Password: </label>
                        <input class="form-control" type="password" id="h_password">
                      </div>
                    </form>
                  </ul>
                  <button class="btn btn-primary" id="SubmitApply" type="button">
                    Send Application</button>
                  <button class="btn btn-default" data-dismiss="modal" type="button">
                    Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>




<!-- Modal 1 for login as -->
     
<!-- This is the Modal that will be called for view btn -->
    <div id = "modalloginas" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h4 class ="modal-title" style="margin-left:35%;"> LOGIN AS</h4> 
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    </div>
                    <div class="modal-body">
                      <center>
                            <div class="form-group">  
                              <button class="btn btn-primary" style="width:70%;"><a id="btnTenant" data-toggle="modal" href="#modaltenantlogin" style="font-weight:bold;text-decoration:none;color:white;">TENANT</a></button>
                            </div>
                            <div class="form-group">  
                              <button class="btn btn-primary" style="width:70%;"><a id="btnHostLogin" style="font-weight:bold;text-decoration:none;color:white;">HOST</a></button>
                            </div>
                            <div class="form-group">  
                              <button class="btn btn-primary" style="width:70%;"><a id="btnAdmin" data-toggle="modal" href="#modaladminlogin" style="font-weight:bold;text-decoration:none;color:white;">ADMINISTRATOR</a></button>
                            </div>
                      </center>
                    </div>
                    <div class = "modal-footer">
                      <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
            </div>
        </div>
    </div>




<!-- Modal 1 for host -->
     
    <div id = "modalhostlogin" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h4 class ="modal-title" style="margin-left:40%;"> LOGIN</h4> 
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label> Username: </label>
                                <input type="text" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                                <label> Password: </label>
                                <input type="password" class="form-control" required="true">
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <button type="button" class = "btn btn-primary" data-dismiss = "modal">SUBMIT </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal 1 for tenant -->
     
    <div id = "modaltenantlogin" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h4 class ="modal-title" style="margin-left:40%;"> LOGIN</h4> 
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label> Username: </label>
                                <input type="text" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                                <label> Password: </label>
                                <input type="password" class="form-control" required="true">
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <button type="button" class = "btn btn-primary" data-dismiss = "modal">SUBMIT </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
            </div>
        </div>
    </div>

<!-- Modal 1 for tenant -->
     
    <div id = "modaladminlogin" class = "modal fade"  role = "dialog">
        <div class = "modal-dialog">
            <div class="modal-content">
                <div class = "modal-header">
                    <h4 class ="modal-title" style="margin-left:40%;"> LOGIN</h4> 
                    <button type="button" class = "close" data-dismiss ="modal"> &times;</button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="form-group">
                                <label> Username: </label>
                                <input type="text" class="form-control" required="true">
                            </div>
                            <div class="form-group">
                                <label> Password: </label>
                                <input type="password" class="form-control" required="true">
                            </div>
                        </form>
                    </div>
                    <div class = "modal-footer">
                        <button type="button" class = "btn btn-primary" data-dismiss = "modal">SUBMIT </button>
                    <button type ="button" class = "btn btn-default" data-dismiss = "modal"> CLOSE </button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="./vendor/jquery/jquery.min.js"></script>
    <script src="./vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="./vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="./dist/js/jqBootstrapValidation.js"></script>
    <script src="./dist/js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="./dist/js/agency.min.js"></script>

    <script type="text/javascript">
       $(document).ready(function() {

        $(document).on('click', '#btnHost', function(){
          $('#modalhost').modal('show');
        });

        $(document).on('click', '#btnloginas', function(){
          $('#modalloginas').modal('show');
        });

        $(document).on('click', '#btnTenant', function(){
          $('#modaltenantlogin').modal('show');
        });

        $(document).on('click', '#btnHostLogin', function(){
          $('#modalhostlogin').modal('show');
        });

        $(document).on('click', '#btnAdmin', function(){
          $('#modaladminlogin').modal('show');
        });

        // $(document).on('click', '#btnAsHost', function(){
        //   $('#modallogin').modal('show');
        // });

        // $(document).on('click', '#btnAsTenant', function(){
        //   $('#modallogin').modal('show');
        // });

        // $(document).on('click', '#btnAsAdmin', function(){
        //   $('#modallogin').modal('show');
        // });

        $(document).on('click', '#btnView', function(){
          var view_apartment_details = 'selected';
          var apartment_id = $(this).attr('data-id');

          $.ajax({
              url: 'functions/select_function.php',
              method: 'POST',
              data: {
                  view_apartment_details_data: view_apartment_details,
                  apartment_id_data: apartment_id
              },
              success: function(data) {
                  // var data = JSON.parse(data);
                  $('#apartment_detail').html(data);
                  $('#portfolioModal1').modal('show');
                  // if(data.success == "true"){
                  //     $('#apartment_detail').html(data);
                  //     // $('#v_apartment_name').html(data.apartment_name);
                  //     // $('#v_apartment_address').html(data.apartment_address);
                  //     // $('#v_apartment_desc').html(data.apartment_desc);
                  //     // $('#v_name').html(data.name);
                  //     // $('#v_contact_no').html(data.contact_no);
                  //     // $('#v_email').html(data.email);

                  //     //$('#SubmitTerminate').attr('data-id', data.rental_id);
                  //     // var view_apartment_room = 'selected';
                  //     // var apartment_id = data.apartment_id;
                  //   //   $.ajax({
                  //   //     url: 'functions/select_function.php',
                  //   //     method: 'POST',
                  //   //     data: {
                  //   //         view_apartment_room_data: view_apartment_room,
                  //   //         apartment_id_data: apartment_id
                  //   //     },
                  //   //     success: function(data) {
                  //   //         var data = JSON.parse(data_room);
                  //   //         if(data.success == "true"){
                  //   //             alert('jairo');
                  //   //             // $('.room_list').append('<li><a data-toggle="modal" class="room" style="font-weight:bold;">Room 101</a></li>');

                  //   //             //$('#SubmitTerminate').attr('data-id', data.rental_id);
                                
                  //   //             // $('#portfolioModal1').modal('show');
                  //   //         }
                  //   //         else if (data.success == "false"){
                  //   //             alert(data.message);
                  //   //         }
                  //   //     },
                  //   //     error: function(xhr) {
                  //   //         console.log(xhr.status + ":" + xhr.statusText);
                  //   //     }
                  //   // });

                  // }
                  // else if (data.success == "false"){
                  //     alert(data.message);
                  // }
              },
              error: function(xhr) {
                  console.log(xhr.status + ":" + xhr.statusText);
              }
          });
        });

        $(document).on('click', '#SubmitApply', function(){
          var submit_application = 'selected';
          var first_name = $('#h_first_name').val();
          var middle_name = $('#h_middle_name').val();
          var last_name = $('#h_last_name').val();
          var birth_date = $('#h_birth_date').val();
          var gender = $('input[name=h_gender]:checked').val(); 
          var contact_no = $('#h_contact_no').val();
          var email = $('#h_email').val();
          var password = $('#h_password').val();

          //alert(apartment + ' ' + address + ' ' + desc + ' ' + contact_person + ' ' + birth_date + ' ' + gender + ' ' + contact_no + ' ' + email + ' ' + password);

          $.ajax({
              url: 'functions/insert_function.php',
              method: 'POST',
              data: {
                  submit_application_data: submit_application,
                  first_name_data: first_name,
                  middle_name_data: middle_name,
                  last_name_data: last_name,
                  birth_date_data: birth_date,
                  gender_data: gender,
                  contact_no_data: contact_no,
                  email_data: email,
                  password_data: password
              },
              success: function(data) {
                  var data = JSON.parse(data);
                  if(data.success == "true"){
                      // $('#v_apartment_name').html(data.apartment_name);
                      // $('#v_apartment_address').html(data.apartment_address);
                      // $('#v_apartment_desc').html(data.apartment_desc);
                      // $('#v_name').html(data.name);
                      // $('#v_contact_no').html(data.contact_no);
                      // $('#v_email').html(data.email);

                      //$('#SubmitTerminate').attr('data-id', data.rental_id);
                      $('#modalhost').modal('toggle');
                      $(':input','#host')
                        .not(':button, :submit, :reset, :hidden')
                        .val('')
                        .prop('selected', false);
                      alert(data.message);
                  }
                  else if (data.success == "false"){
                      alert(data.message);
                  }
              },
              error: function(xhr) {
                  console.log(xhr.status + ":" + xhr.statusText);
              }
          });
        });

        $(document).on('click', '.room_details', function () {
          var view_room_details = 'selected';
          var room_id = $(this).attr('data-id');

          $.ajax({
              url: 'functions/select_function.php',
              method: 'POST',
              data: {
                  view_room_details_data: view_room_details,
                  room_id_data: room_id
              },
              success: function(data) {
                  var data = JSON.parse(data);
                  if(data.success == "true"){
                    $('#r_room').html(data.room_name);
                    $('#r_description').html(data.description);
                    $('#r_host').html(data.contact_person);
                    $('#r_mobile').html(data.contact_no);
                    $('#r_email').html(data.email);
                    $('#r_rent_rate').html(data.rent_rate);

                    $('#applyroom').attr('data-id', data.room_id);
                    $('#roomModal1').modal('show');
                  }
                  else if (data.success == "false"){
                      alert(data.message);
                  }
              },
              error: function(xhr) {
                  console.log(xhr.status + ":" + xhr.statusText);
              }
          });
        });

        $(document).on('click', '#applyroom', function () {
          var view_room_details = 'selected';
          var room_id = $(this).attr('data-id');

          $.ajax({
              url: 'functions/select_function.php',
              method: 'POST',
              data: {
                  view_room_details_data: view_room_details,
                  room_id_data: room_id
              },
              success: function(data) {
                  var data = JSON.parse(data);
                  if(data.success == "true"){
                    $('#a_room_name').html(data.room_name);
                    $('#a_address').html(data.address);

                    $('#SubmitApplyRent').attr('data-id', data.room_id);
                    $('#applyroomModal1').modal('show');
                  }
                  else if (data.success == "false"){
                      alert(data.message);
                  }
              },
              error: function(xhr) {
                  console.log(xhr.status + ":" + xhr.statusText);
              }
          });
          
        });

        $(document).on('click', '#SubmitApplyRent', function () {
          var room_new_tenant = 'selected';
          var room_id = $(this).attr('data-id');
          var first = $('#t_first').val();
          var middle = $('#t_middle').val();
          var last = $('#t_last').val();
          var birthdate = $('#t_birthdate').val();
          var gender = $('input[name=t_gender]:checked').val(); 
          var contact_no = $('#t_contact').val();
          var email = $('#t_email').val();

          $.ajax({
              url: 'functions/insert_function.php',
              method: 'POST',
              data: {
                  room_new_tenant_data: room_new_tenant,
                  room_id_data: room_id,
                  first_data: first,
                  middle_data: middle,
                  last_data: last,
                  birthdate_data: birthdate,
                  gender_data: gender, 
                  contact_no_data: contact_no,
                  email_data: email
              },
              success: function(data) {
                  var data = JSON.parse(data);
                  if(data.success == "true"){
                    alert(data.message);
                    $(':input','#tenant_form')
                      .not(':button, :submit, :reset, :hidden')
                      .val('')
                      .prop('selected', false);

                    $('#applyroomModal1').modal('toggle');
                  }
                  else if (data.success == "false"){
                      alert(data.message);
                  }
              },
              error: function(xhr) {
                  console.log(xhr.status + ":" + xhr.statusText);
              }
          });
          
        });
       });
    </script>
  </body>
</html>
