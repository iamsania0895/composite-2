    <?php
    include('header.php');
    
     $ul=explode('?',$_SERVER['REQUEST_URI']);
   // $_SESSION['act_url1']=$ul['1'];
//     $_SESSION['act_url1']='124589745123';
//     print_r($_SESSION);
// die;
    $sql = "SELECT * FROM rooms where id='".$_GET['roomid']."'";
    $query= mysqli_query($con,$sql);
    $total=mysqli_fetch_assoc($query);
    //echo '<pre>';print_r($total);
    
    
    if(isset($_GET['submit'])){
   
     if(!empty($_SESSION['name']['id'])){
    $to = 'rahul.webguruz97@gmail.com';

    $subject = 'Room Booking Request';

    $headers = "From: " . strip_tags('sania') . "\r\n";
    $headers .= "Reply-To: ". strip_tags('sania@gmail.com') . "\r\n";
    $headers .= "CC: sania@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<div class="container">
      <p><b>Name: '.$_GET['fname'].'</b></p>
      <p><b>Guest: '.$_GET['guest'].'</b></p>
      <p><b>room: '.$_GET['room'].'</b></p>
      <p><b>Price: '.$total['room_price'].'</b></p>
      <p><b>Location: '.$total['location'].'</b></p>
    </div>';

    $sql = "select * from cart where room_id='".$_GET['roomid']."' and user_id = '".$_SESSION['name']['id']."' ";   
    $query = mysqli_query($con,$sql); 
    if(mysqli_num_rows($query)>0)
    {
      //echo 'sfdsf';
    }else{
      $insert= "insert into cart (room_id,user_id,room_qty,days)values('".$_GET['roomid']."','".$_SESSION['name']['id']."','".$_GET['room']."','".$_GET['day']."')";
    $query = mysqli_query($con,$insert);
    }
     echo '<script>window.location.href = "checkout.php";</script>';
        //echo 'dddddddddd';
    if(mail($to, $subject, $message, $headers)){
       
        
    }else{
        //echo 'rrrrrrrrrrrrr';
    }
    }else{

      echo '<script>window.location.href = "login.php";</script>';
    }
     
    }
    //echo '>>>>>>>>>>>>'.$_SESSION['act_url'];
     ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title> </title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <script src="https://fonts.googleapis.com/css?family=Inconsolata&text=%c2%a1Hola!"></script>
    </head>
    <body>
      
      <div class="container">
        <div class="col-sm-6">
      	<img src="images/<?=$total['image']?>" style="width: 70%;">
      	<br>
      	 <div class="all_c">
      		<span class="location"><strong>Location : </strong><?=$total['location']?></span><br>
      		<span class="room_wifi"><strong>Wifi : </strong><?=$total['room_wifi']?></span><br> 
      		<span class="room_ac"><strong>A.C : </strong><?=$total['room_ac']?></span><br>
          <span class="room_price"><strong>Price : </strong><?=$total['room_price']?></span><br>
      		<span class="decription"><strong>Description : </strong><?=$total['decription']?></span>
      	 </div>
        </div>
        <div class="col-sm-6 form">
      	<div class="form">
      		<form action="" method="GET">
      			<h2>Booking Form</h2>
      			<div class="form-group">
      				<label class="name">Name</label>
      				<input type="text" name="fname" Placeholder="Name" class="form-control">
      			</div>
      			<div class="form-group">
      				<label class="name">Guest</label>
      				<select name="guest" class="form-control">
      					<option value="1">Guest 1</option>
      					<option value="2">Guest 2</option>
      					<option value="3">Guest 3</option>
      				</select>
      			</div>
            <div class="form-group">
              <label class="name">Room</label>
              <select name="room" class="form-control">
                <option value="1">Room 1</option>
                <option value="2">Room 2</option>
                <option value="3">Room 3</option>
              </select>
            </div>
            <div class="form-group">
              <label class="name">Arrival Date:</label>
              <input type="text" id="TextBox1" />
            </div>
             <div class="form-group">
              <label class="name">Departure Date:</label>
              <input type="text" id="TextBox2" />
              <input type="text" id="TextBox3" name="day" />
              <input type="text" name='roomid' value="<?=$_GET['roomid']?>" />
            </div>
      			<input type="submit" name="submit" value="Submit" class="btn btn-success">
      		</form>

      	</div>
      </div>
      </div>
       </div>
     
    <style>
    .all_c {
        padding: 23px;
    }
    .col-sm-6.form {
        background-color: #dfdedd;
        padding: 15px;
    }
    </style>

    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
      <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
      <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
      <script>
      $( function() {
        $("#TextBox1").datepicker({
        minDate: 0,
        maxDate: '+1Y+6M',
        onSelect: function (dateStr) {
            var min = $(this).datepicker('getDate'); // Get selected date
            $("#TextBox2").datepicker('option', 'minDate', min || '0'); // Set other min, default to today
        }
    });

    $("#TextBox2").datepicker({
        minDate: '0',
        maxDate: '+1Y+6M',
        onSelect: function (dateStr) {
            var max = $(this).datepicker('getDate'); // Get selected date
            $('#datepicker').datepicker('option', 'maxDate', max || '+1Y+6M'); // Set other max, default to +18 months
            var start = $("#TextBox1").datepicker("getDate");
            var end = $("#TextBox2").datepicker("getDate");
            var days = (end - start) / (1000 * 60 * 60 * 24);
            $("#TextBox3").val(days);
        }
    });
      } );
      </script>
    </head>
    <body>
     
