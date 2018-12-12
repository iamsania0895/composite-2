 
<?php 

@session_start();
require_once('config.php');
include('header.php');
$sql = "SELECT * FROM `cart` inner join rooms on cart.room_id=rooms.id where cart.user_id='".$_SESSION["name"]['id']."'";
$query = mysqli_query($con,$sql);

if(isset($_POST['submit'])){

	echo $delete = "DELETE FROM `cart` WHERE room_id='".$_POST['roomd']."' and user_id='".$_SESSION["name"]['id']."'";
$query = mysqli_query($con,$delete);
	
}

//print_r($_SESSION["name"]['firstname']);

if(isset($_GET['checkout'])){
    
    
 

$to = 'rahul.webguruz97@gmail.com';

    $subject = 'Room Booking Request';

    $headers = "From: " . strip_tags('sania') . "\r\n";
    $headers .= "Reply-To: ". strip_tags('sania@gmail.com') . "\r\n";
    $headers .= "CC: sania@gmail.com\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $message = '<div class="container">
      <p><b>Name: '.$_SESSION["name"]['firstname'].'</b></p>
      <p><b>Total: '.$_GET['subtotal'].'</b></p>
       <p><b>Tax: '.$_GET['tax'].'</b></p>
        <p><b>Price: '.$_GET['gtptal'].'</b></p>
        <p><b>Days: '.$_GET['days'].'</b></p>
      <p><b>Room: '.$_GET['room_type'].'</b></p>
     
      <p><b>Location: '.$_GET['location'].'</b></p>
    </div>';

    if(mail($to, $subject, $message, $headers)){
       
        
    }else{
        //echo 'rrrrrrrrrrrrr';
    }
    echo '<script>window.location.href = "roombook.php";</script>';
	
}

?>

 
	<main class="page">
	 	<section class="shopping-cart dark">
	 		<div class="container">
		        <div class="block-heading">
		          <h2>Shopping Cart</h2>
		          
		        </div>
		        <div class="content">
	 				<div class="row">
	 					<div class="col-md-12 col-lg-8">
	 						<div class="items">
	 							<div class="message"></div>
	 							<form action="" method="post">
	 							<?php 
	 							$i=1;
	 							$dd=array();
	 							while($data=mysqli_fetch_assoc($query)){

	 							$dd[]=$data;
	 							 ?>
 								
				 				<div class="product len">
				 					<div class="row">
					 					<div class="col-md-3">
					 						<img class="img-fluid mx-auto d-block image" src="images/<?=$data['image']?>">
					 					</div>
					 					<div class="col-md-8">
					 						<div class="info">
						 						<div class="row">
							 						<div class="col-md-5 product-name">
							 							<div class="product-name">
								 							 <?=$data['room_type']?> 
								 							 
                                                        </div> Price:$ 
 <?=$data['room_price']?>/Night </div> <div class="col-md-3 quantity">
 <label for="quantity">days:</label>


<input min="1"  type="number" value ="<?=$data['days']?>" class="form-control
quantity-input number totai_qty_<?=$i?>" id="<?=$data['room_id']?>" disabled> </div> 


<input
type="hidden" class="count" value="<?=$i?>" > <input type="hidden"
class="p1_<?=$i?>" value="<?=$data['room_price']?>"> <div class="col-md-2
quantity"> <label for="quantity">Total price:</label>
<span id="price_<?=$i?>">12</span>  
<input type="hidden"
class="p1_<?=$i?>" name="roomd" value="<?=$data['room_id']?>">
<input type="hidden"

 <div class="col-md-2 quantity">
  <label for="quantity">Delete:</label>
<button class="btn btn-danger remove-product"  
id="<?=$data['product_id']?>" data="<?=$i?> " type="submit" name="submit"> x </button> 
</div>
													 
							 					</div>
							 				</div>
					 					</div>
					 				</div>
				 				</div>
<input type="hidden" name="days" class="days" value="<?=$data['days']?>">
				 				  <?php $i++; }
				 				  //echo '<pre>';print_r($dd);
				 				  
				 				  ?>
				 				</form>
				 			</div>
			 			</div>
			 			
			 			<div class="col-md-12 col-lg-4">
			 				<div class="summary">
			 				    <form action="" method="GET">
			 					<h3>Summary</h3>
			 					<div class="summary-item"><span class="text">Subtotal</span><span class="price ll">$360</span></div>
			 					<div class="summary-item"><span class="text">Tax</span><span class="price tax"> </span></div>
			 					<div class="summary-item"><span class="text">Grand Total</span><span class="price gtotal"> </span></div>
			 					
			 					<!-- <div class="summary-item"><span class="text">Discount</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Shipping</span><span class="price">$0</span></div>
			 					<div class="summary-item"><span class="text">Total</span><span class="price">$360</span></div> -->
			 				 <input type="hidden" name="subtotal" class="sub">
			 				 <input type="hidden" name="tax" class="tax">
			 				 <input type="hidden" name="gtptal" class="gtptal">
			 				 <input type="hidden" name="days" value="<?=$dd[0]['days']?>">
			 				 <input type="hidden" name="room_type" value="<?=$dd[0]['room_type']?>">
			 				 <input type="hidden" name="location" value="<?=$dd[0]['location']?>">
			 					<button type="submit" class="btn btn-primary btn-lg btn-block" name="checkout">Checkout</button>
			 						</form>
				 			</div>
				 		
			 			</div>
		 			</div> 
		 		</div>
	 		</div>
		</section>
	</main>
</body>
<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
<script>
	$(window).load(function(){
	  
	 var sum = 0;
	  $('.count').each(function(){
	 	
		var id2= $(this).val();

		var Qty= $('.totai_qty_'+id2).val(); 
	 	var price = $(".p1_"+id2).val();
	 	var days= $('.days').val();
	 	//alert(days);
	 	 var a= Qty*price;

	 	 sum +=a;
	 	$('#price_'+id2).html(a);
		});
	  	 var pp='15';
	  	$('.tax').html(pp+' %');
	    $('.ll').html('$ '+sum);
	    $('.sub').val(sum);
	    $('.tax').val(pp); 
	    
	    var total=sum*pp/100
	    $('.gtptal').val(eval(total+sum));
	    
	    $('.gtotal').html('$ '+eval(total+sum));
	    $('.ddd').val(days);
	   
});
	$(document).ready(function(){
		 
	$('.number').change(function(){
	 var id= $(this).attr('id');
	 var val= $(this).val();
	  
	 $.ajax({
            url:'ajax.php?action=updateqty',
            type:'post',
            data:{'productid':id,'pqty':val},
            success: function(res){
              //alert(res);
              location.reload();
            }

        });

	  
	 var price = $(".p1_"+id).val();
	 
	 var act= parseInt(val*price);
	 //alert(act);
	 $('#price_'+id).html(act);
	 var sum = 0;
	 $('.count').each(function(){
	 	
		var id2= $(this).val();

		var act_price = $('#price_'+id2).html();
		
		sum += parseInt(act_price);
	});
	 //var days= '<?=$data['days']?>';
	 //alert(days);
	 $('.days').html('600');
	 $('.ll').html('$'+sum);
	 });

	 
	var divlen= $(".len").length;
	//alert(divlen);
	if(divlen=="0"){
	$(".summary").remove();
	$('.message').html('<h2>No Product Available.<h2>').css('color','red').css('text-align','center');
	}


 });
	</script>
<style>
.shopping-cart{
	padding-bottom: 50px;
	font-family: 'Montserrat', sans-serif;
}

.shopping-cart.dark{
	background-color: #f6f6f6;
}

.shopping-cart .content{
	box-shadow: 0px 2px 10px rgba(0, 0, 0, 0.075);
	background-color: white;
}

.shopping-cart .block-heading{
    padding-top: 50px;
    margin-bottom: 40px;
    text-align: center;
}

.shopping-cart .block-heading p{
	text-align: center;
	max-width: 420px;
	margin: auto;
	opacity:0.7;
}

.shopping-cart .dark .block-heading p{
	opacity:0.8;
}

.shopping-cart .block-heading h1,
.shopping-cart .block-heading h2,
.shopping-cart .block-heading h3 {
	margin-bottom:1.2rem;
	color: #3b99e0;
}

.shopping-cart .items{
	margin: auto;
}

.shopping-cart .items .product{
	margin-bottom: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .items .product .info{
	padding-top: 0px;
	text-align: center;
}

.shopping-cart .items .product .info .product-name{
	font-weight: 600;
}

.shopping-cart .items .product .info .product-name .product-info{
	font-size: 14px;
	margin-top: 15px;
}

.shopping-cart .items .product .info .product-name .product-info .value{
	font-weight: 400;
}

.shopping-cart .items .product .info .quantity .quantity-input{
    margin: auto;
    width: 80px;
}

.shopping-cart .items .product .info .price{
	margin-top: 15px;
    font-weight: bold;
    font-size: 22px;
 }

.shopping-cart .summary{
	border-top: 2px solid #5ea4f3;
    background-color: #f7fbff;
    height: 100%;
    padding: 30px;
}

.shopping-cart .summary h3{
	text-align: center;
	font-size: 1.3em;
	font-weight: 600;
	padding-top: 20px;
	padding-bottom: 20px;
}

.shopping-cart .summary .summary-item:not(:last-of-type){
	padding-bottom: 10px;
	padding-top: 10px;
	border-bottom: 1px solid rgba(0, 0, 0, 0.1);
}

.shopping-cart .summary .text{
	font-size: 1em;
	font-weight: 600;
}

.shopping-cart .summary .price{
	font-size: 1em;
	float: right;
}

.shopping-cart .summary button{
	margin-top: 20px;
}

@media (min-width: 768px) {
	.shopping-cart .items .product .info {
		padding-top: 25px;
		text-align: left; 
	}

	.shopping-cart .items .product .info .price {
		font-weight: bold;
		font-size: 22px;
		top: 17px; 
	}

	.shopping-cart .items .product .info .quantity {
		text-align: center; 
	}
	.shopping-cart .items .product .info .quantity .quantity-input {
		padding: 4px 10px;
		text-align: center; 
	}
}

	</style>