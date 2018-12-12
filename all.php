<?php
$con = mysqli_connect("localhost","root","","hotel");

$sql = "SELECT * FROM rooms ";
$query= mysqli_query($con,$sql);
// while($total=mysqli_fetch_assoc($query)){
//   echo '<pre>';print_r($total);
// }

 
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
    <div class="search">
      <input type="text" Placeholder="Search"  class="search"> 
    </div>
    <div class="room">
  <?php while($total=mysqli_fetch_assoc($query)){ ?>
    
    <div class="col-sm-3">
      <img src="image/<?=$total['image']?>">
      <a href="single.php?id=<?=$total['id']?>">Click here</a>
    </div>
 
  <?php } ?>
     
  </div>
   </div>
 

</body>
</html>
<script type="text/javascript">
  $(document).ready(function(){
    $('.search').blur(function(e) {
    //$('.search').keyup(function(){
      var data1= $(this).val();
       
      $.ajax({
        url:'ajax.php?act=searhRoom',
        type:'post',
        data:{'data':data1},
        success:function(res){
          //alert(res);
           $('.room').html(res);
        }
      });
    });
   
});
  </script>
