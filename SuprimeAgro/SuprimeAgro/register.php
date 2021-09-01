<?php
//insert.php;

include('DataBase_Connection.php');

date_default_timezone_set("Asia/Kolkata");
	$d= date("Y-m-d");
	$t= date ("h:i:sa");
	
    $output ='';
	$Name=$_POST['txtUserName'];
	$mbno=$_POST['txtMobileNo'];
	$emailid=$_POST['txtEmailID'];
	$pass=$_POST['txtPassword'];
	
$sql = "SELECT * FROM tblUser WHERE UserMobileNo='$mbno' || UserEmailID = '$emailid'";

$subquery = mysqli_query($con,$sql);

if (mysqli_num_rows($subquery) > 0)
{
    $output .='<script>alert("Already Exits")</script>';
    $output .="<script>location='signupin.php'</script>";
}
else {
    $query=mysqli_query($con, "insert into tblUser(UserName,UserMobileNo,UserEmailID,UserPassword,InsertDate,InsertTime)values('$Name','$mbno','$emailid','$pass','$d','$t')");
    if ($query==1) 
	    {
            $output .='<script>alert("Save Sucessfull")</script>';
            $output .="<script>location='signupin.php'</script>";
        }
        else
        {
            $output .='<script>alert("Not Save Sucessfull")</script>';
        }
    
}

       
 
echo $output; 

?>
