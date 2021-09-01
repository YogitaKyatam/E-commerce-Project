<?php   
 session_start(); 

if(isset($_GET["action"]))  
 {  
      if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                     echo '<script>alert("Item Removed")</script>';  
                     echo '<script>window.location="cart.php"</script>';  
                }  
           }  
      }  
 }  
 
  $prod_id = $_POST['item_id'];

if (isset($_SESSION['shopping_cart'])) {

  foreach ($_SESSION['shopping_cart'] as $value) {
    if ($value[0] == $prod_id){
      $qty = $value[4]+$_POST['quantity'];
      // update exixting session here

} else {
  $qty = $_POST['quantity'];
  $cart = $_SESSION['shopping_cart'];
  $cart[] = array($prod_id, $qty);  		        

  $_SESSION['shopping_cart'] = $cart;
}
}

} else {

$qty = $_POST['quantity'];
$cart = $_SESSION['shopping_cart'];
$cart[] = array($prod_id, $qty);  		        

$_SESSION['shopping_cart'] = $cart;
}
?> 

<!DOCTYPE html>  
 <html>  
      <head>  
         <title>Suprime Agro - Product Details Page</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="assets/img/apple-icon.png">
    <link rel="shortcut icon" type="image/x-icon" href="">

    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/templatemo.css">
    <link rel="stylesheet" href="assets/css/custom.css">

    <!-- Load fonts style after rendering the layout styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;200;300;400;500;700;900&display=swap">
    <link rel="stylesheet" href="assets/css/fontawesome.min.css">

    <!-- Slick -->
    <link rel="stylesheet" type="text/css" href="assets/css/slick.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/slick-theme.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>

<body>
    <?php include('header.php');?>
           <br /><br>  
           
    <h3 align="center" style="font-weight:bold;">Shopping Cart</h3>
    
<div class="container" style="margin-top:50px;background:;">
<center>
    
<div class="row" style="font-size:20px;">
  <div class="col"><h6>Image</h6></div>
  <div class="col"><h6>Name</h6></div>
  <div class="col"><h6>Quantity</h6></div>
  <div class="col"><h6>Price</h6></div>
  <div class="col"><h6>Remove</h6></div>
</div>
<hr>
  <?php   
        if(!empty($_SESSION["shopping_cart"]))  
        {  
            $total = 0;  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
 ?>
 <form method="post">
 <div class="row" style="margin:20px 0px 20px 0px">
    <div class="col"><img src="admin/<?php echo $values["item_img"]; ?>" style="height:120px;"></div>
    <div class="col" style="font-size:20px;margin:20px 0px 20px 0px"><?php echo $values["item_name"]; ?></div>
    <div class="col" style="margin:20px 0px 20px 0px"><input type="text" name="quantity"  value="<?php echo $values["item_quantity"]; ?>"></div>
    <div class="col" style="margin:20px 0px 20px 0px">&#8377;<?php echo $values["item_price"]; ?></div>
    <div class="col" style="margin:20px 0px 20px 0px"><a class="remove" href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>" style="color:red;">
        <i class="fa fa-trash" aria-hidden="true" style="font-size:20px;"></i></a>
 </div> 
    
</div>
</form>
<hr>
 <?php   $total = $total + ($values["item_quantity"] * $values["item_price"]);  }  ?>


</center>

 <div class="row" style="margin-top:20px;">
     <div class="col">
    </div>
    <div class="col">
    </div>
    <div class="col">
    </div>
    <div class="col">
    <b style='font-size:18px;'>Total :-&#8377;<?php echo number_format($total, 2); ?></b>
    </div>
    
    <div class="col">
     <a href="signupin.php"><input type="submit" class="btn btn-success" name="checkout" value="Checkout"></a>
    </div>
   
  </div>
  <?php } ?>
  
</div>     
<!--<div class="container">
  <table class="table">
    <thead>
      <tr align="center">
        <th>Product Image</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
        
        <th>Action</th>
      </tr>
    </thead>
     <?php   
        if(!empty($_SESSION["shopping_cart"]))  
        {  
            $total = 0;  
            foreach($_SESSION["shopping_cart"] as $keys => $values)  
            {  
     ?>  
    <tbody style="padding:10px 10px 10px 10px;">
      <tr align="center">
        <td><img src="admin/<?php echo $values["item_img"]; ?>" style="height:120px;"></td>
        <td ><?php echo $values["item_name"]; ?></td>
        <td ><?php echo $values["item_quantity"]; ?></td>
        <td> <?php echo $values["item_price"]; ?></td>
        
        <td><a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><input type="submit" class="btn btn-danger" name="checkout" value="Remove"></a></td>
        
      </tr>
      <?php  
        $total = $total + ($values["item_quantity"] * $values["item_price"]);  
            }  
    ?>  
    <tfoot>
	    <tr align="center">
	  
	      <td><th>Total</th></td>
	      <th><?php echo number_format($total, 2); ?></th>
	      <td><a href="checkout.php"><input type="submit" class="btn btn-success" name="checkout" value="Checkout"></a> </td>
    	</tr>
	     <?php } ?>
	</tfoot>
    </tbody>
   </table>

</div>-->
 
           
    </body>  
 </html>