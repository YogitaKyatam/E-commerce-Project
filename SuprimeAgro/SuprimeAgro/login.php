<?php
session_start();

include('DataBase_Connection.php');
date_default_timezone_set("Asia/Kolkata");
	$d= date("Y-m-d");
	$t= date ("h:i:sa");
	
$connect=new PDO("mysql:host=localhost;dbname=u397404788_SuprimeAgro","root","");

$output ='';

	$fName=$_POST['txtLEmailID'];
	$pass=$_POST['txtLPassword'];

	$query=mysqli_query($con,"select * from tblUser where UserEmailID='$fName' && UserPassword='$pass'");
   
    $ret=mysqli_fetch_array($query);    
    
    $uid=$ret['UserID'];
        if($ret>0)
	    {
		    $_SESSION['uid']=$uid;
		    
    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        	$statement = $connect->prepare("insert into tblAddToCart(ProductID,UserID,ProductName,Quantity,Price,Total,InsertDate,InsertTime) values(?,?,?,?,?,?,?,?)");

            $statement->bindParam(1,$values["item_id"]);

            $statement->bindParam(2,$uid);
            
            $statement->bindParam(3,$values["item_name"]);
            
            $statement->bindParam(4,$values["item_quantity"]);
            
            $statement->bindParam(5,$values["item_price"]);
            
            $statement->bindParam(6, number_format($values["item_quantity"] * $values["item_price"], 2));
            
            $statement->bindParam(7,$d);
            
            $statement->bindParam(8,$t);
            
            $statement->execute();  
	       
        }	
    }
		    $output .='<script>alert("Login Sucessfull")</script>';
        	$output .="<script>location='checkout.php'</script>";
	    }
	    else
	    {
	        $output .='<script>alert("Please Enter The Correct Email ID Or Password")</script>';
	        	$output .="<script>location='signupin.php'</script>";
	
	    }
	   
echo $output; 

?>
