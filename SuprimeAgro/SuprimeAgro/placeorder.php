 <?php
session_start();

error_reporting(0);

$uid=$_SESSION['uid'];

$total_price = 0;
$total_item = 0;

$answer = $_POST['payment']; 
if ($answer == "cod")          
 $re="Cash On Delivery" ;    
else 
 $re="Paypal";

$orderno= mt_rand(100000000, 999999999);

$orderid=0;

$connect=new PDO("mysql:host=localhost;dbname=u397404788_SuprimeAgro","root","");

$query = "SELECT count(OrderID)+1 FROM tblOrder";

$statement = $connect->prepare($query);

if($statement->execute())
{
	
    $result = $statement->fetchAll();
    foreach($result as $row)
    {
		$orderid=$row[0];
    }
}

$statement = $connect->prepare("insert into tblOrder(OrderID,OrderDate,OrderTime,OrderNumber) values(?,?,?,?)");

//insert into tblorder

$statement->bindParam(1,$orderid);

$statement->bindParam(2,$d);

$statement->bindParam(3,$t);

$statement->bindParam(4,$orderno);

$t= date("H:i");
 
$d= date("Y-m-d");

$i=1;
$statement->execute();


$statement1 = $connect->prepare("insert into  tblCustomer (OrderID,OrderNumber,UserID,CustomerName,CustomerAddress,CustomerContactNo,CustomerEmail,CustomerCity,CustomerState,CustomerPincode,FinalStatus,PaymentType) values (?,?,?,?,?,?,?,?,?,?,?,?)");

//insert into tblCustomer

$fs="order received";
$pt=
$statement1->bindParam(1,$orderid);

$statement1->bindParam(2,$orderno);

$statement1->bindParam(3,$uid);

$statement1->bindParam(4,$_POST['txtName']);

$statement1->bindParam(5,$_POST['txtAddress']);

$statement1->bindParam(6,$_POST['txtMobileNo']);

$statement1->bindParam(7,$_POST['txtEmailID']);

$statement1->bindParam(8,$_POST['txtCity']);

$statement1->bindParam(9,$_POST['txtState']);

$statement1->bindParam(10,$_POST['txtPostalCode']);

$statement1->bindParam(11,$fs);

$statement1->bindParam(12,$re);

$statement1->execute();

    if(!empty($_SESSION["shopping_cart"]))
    {
        foreach($_SESSION["shopping_cart"] as $keys => $values)
        {
        	$statement2 = $connect->prepare( "insert into tblOrderDetails(OrderNumber,ProductName,Quantity,Rate,Amount) values(?,?,?,?,?)");

            //insert into tblOrderDetails
            $fs="order received";
           // $statement->bindParam(1,$orderid);

            $statement2->bindParam(1,$orderno);
            
            $statement2->bindParam(2,$values["item_name"]);
            
            $statement2->bindParam(3,$values["item_quantity"]);
            
            $statement2->bindParam(4,$values["item_price"]);
            
            $statement2->bindParam(5, number_format($values["item_quantity"] * $values["item_price"], 2));
            		
            $total = $total + ($values["item_quantity"] * $values["item_price"]);
            $total_item = $total_item + 1;
            	
            $statement2->execute();  
	
            $statement1 = $connect->prepare("update tblOrder set GrossAmount=?,ShippingCharges=?,NetAmount=? where OrderNumber='$orderno'");

            //update into tblOrder
            $grandtotal=0;
            $sc=50;
            
            $na = $total + $sc;
            
            $type="Customer";
            
            $statement1->bindParam(1,$total);
            
            $statement1->bindParam(2,$sc);
            
            $statement1->bindParam(3,$na);
            
            $statement1->execute();
            
           $sql = "DELETE FROM tblAddToCart WHERE UserID='$uid'";

            // use exec() because no results are returned
            $connect->exec($sql);
            
        }	
    }

echo '<script>alert("Your order placed successfully. Order number is "+"'.$orderno.'")</script>';

echo "<script>window.location.href='index.php'</script>";

//session_destroy();
	
//$_SESSION['fosuid']=$uid;

unset($_SESSION["shopping_cart"]);




?>