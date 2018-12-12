<?php 
 session_start();
require_once('config.php'); 
 

?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>The Royal Hotel</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/bootstrap.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/styles.css">
<link rel="stylesheet" href="css/form.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

</head>

<body>
<!--Header start here-->
<header class="header_area navbar_fixed">
<nav class="navbar navbar-expand-lg navbar-dark bg-dark container-fluid">
  <div class="container"> <a class="navbar-brand" href="<?=SITEURL?>"><img src="images/logo.png" style="width:35%"></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <span class="navbar-toggler-icon"></span> </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent"> 
          <ul class="navbar-nav ml-auto">
        
        <li class="nav-item"> <a class="nav-link" href="searchroom.php">Look a Room</a> </li>
        <li class="nav-item"> <a class="nav-link" href="roombook.php">Book a Room</a> </li>
        <?php if(empty($_SESSION['name']['id'])){ ?>
            <li class="nav-item active"> <a class="nav-link" href="signup.php">Sign Up</a> </li>
            <li class="nav-item"> <a class="nav-link" href="login.php">Login</a> </li>
          
        <?php }else{ ?>
        <li class="nav-item active"> <a class="nav-link" href="myaccount.php">My Account</a> </li>
          <li class="nav-item"> <a class="nav-link" href="logout.php">Logout</a> </li>
          
        
    <?php     } ?>
      </ul>
    </div>
  </div>
</nav>
<div class="clearfix"></div>

</header>
<?php global $page;  
  if($page=='search'){
echo 'sdfsd';

  }else{
 ?>
<section class="banner_area">
            <div class="booking_table d_flex align-items-center">
              <div class="overlay bg-parallax" data-stellar-ratio="0.9" data-stellar-vertical-offset="0" data-background=""></div>
        <div class="container">
          <div class="banner_content text-center">
            <h6>Away from monotonous life</h6>
            <h2>Relax Your Mind</h2>
            <p>If you are looking at blank cassettes on the web, you may be very confused at the<br> difference in price. You may see some for as low as $.17 each.</p>
            <a href="#" class="btn theme_btn button_hover">Get Started</a>
          </div>
        </div>
            </div>
            <div class="hotel_booking_area position">
                <div class="container">
                    <div class="hotel_booking_table">
                        <div class="col-md-3">
                            <h2>Search<br> Your Room</h2>
                        </div>
                       
                        <div class="col-md-9">
                            <div class="boking_table">
                                 
                                     <form  action="roombook.php" method="GET">
                                      <div class="col-sm-4">
                                        <div class="book_tabel_item" >
                                            <div class="form-group">
                                                <div class='input-group'>
                                                    <input type='text' class="form-control" Placeholder="Search Room" name="all_search" required>
                                                 
                                                </div>
                                            </div>
                                            
                                        </div>
                                        </div>
                                          

                                        <div class="col-sm-4">
                                        <div class="book_tabel_item"> 
                                            <input type="submit" class="book_now_btn button_hover" value="Search Now"/>
                                        </div>
                                        </div>
                                     
                                    </form>
                                
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </section>
<?php } ?>