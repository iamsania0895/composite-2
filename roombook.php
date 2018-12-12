<?php
include('header.php');
if(isset($_GET['all_search'])){
    $s= $_GET['all_search'];
       $sql = "SELECT * FROM rooms where room_price LIKE '%$s%' || location LIKE '%$s%' || room_type LIKE '%$s%'";
    }else{
        $sql = "SELECT * FROM rooms ";
    }
        $query= mysqli_query($con,$sql);

?>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<!--================ Accomodation Area  =================-->
        
                   
              <div class="container">
     
  <?php while($total=mysqli_fetch_assoc($query)){ 
    //echo '<pre>';print_r($total);

    ?>
    
    <div class="col-sm-3">
      <div class="all_p" style="padding: 10px;">
      <div class="hotel_img">
        <img src="images/<?=$total['image']?>" alt="" style="height: 173px;
    width: 253px;">
       
    </div>
     <h4 class="sec_h4"><?=$total['room_type']?></h4>
    <h5>Price : $<?=$total['room_price']?><small>/night</small></h5>
    <h5>Location : <?=$total['location']?></h5>
     <a href="single.php?roomid=<?=$total['id']?>" class="btn btn btn-success">Book Now</a>
    </div>
    </div>
  <?php } ?>
     
  </div>
   </div>
    <style>
       .sec_h4 {
    font-size: 18px;
    line-height: 38px;
    font-weight: 600;
    color: #e08181;
    margin-bottom: 0px;
}
       </style> 
             
        <!--================ Accomodation Area  =================-->
<?php include('footer.php'); ?>