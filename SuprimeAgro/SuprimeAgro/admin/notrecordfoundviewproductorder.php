<?php
session_start();
//error_reporting(0);
include('dbconnection.php');


if(isset($_POST['submit']))
  {
    $oid=$_POST['orderid'];
    $ressta=$_POST['status'];
    $remark=$_POST['restremark'];
    
date_default_timezone_set('Asia/Kolkata');
$time_now=mktime(date('h'),date('i'),date('s'));
$date = date('Y-m-d h:i:s', $time_now);
 //$da=now();
 //date_default_timezone_set('Asia/Mumbai');

//$da = date('Y-m-d H:i:s');
   $query1=mysqli_query($con, "update tblCustomer set FinalStatus='$ressta' where OrderNumber='$oid'");
    if ($query1) 
    {
         $query=mysqli_query($con, "insert into tblproducttracking(OrderNumber,Remark,Status,StatusDate) values('$oid','$remark','$ressta','$date')");
             if ($query>0) {
    $msg="Order Has been updated";
    }
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    } 
}
  ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Suprime Agro</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/plugins/steps/jquery.steps.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>
<body>

    <div id="wrapper">
<?php include_once('includes/leftbar.php');?>

        <div id="page-wrapper" class="gray-bg">
             <?php include_once('includes/header.php');?>

            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Order Details #<?php echo $_REQUEST['orderid'];?></h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Order Details</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Update</strong>
                    </li>
                </ol>
            </div>
        </div>
        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
                           <?php
                                $oid=$_REQUEST['orderid'];
                                $ret=mysqli_query($con,"select * from tblCustomer where OrderNumber='$oid'");
                                $cnt=1;
                                while ($row=mysqli_fetch_array($ret)) {

                            ?>
                        <div class="row">
                            <div class="col-6">
                                <p style="font-size:16px; color:red; text-align: center"><!--<?php if($msg){
                                     echo $msg;  }  ?>--> 
                                </p>
                        <table border="1" class="table table-bordered mg-b-0">
                            <tr align="center">
                            <td colspan="2" style="font-size:20px;color:blue">
                                 User Details</td></tr>
                            
                                <tr>
                                <th>Order Number</th>
                                <td><?php  echo $row['OrderNumber'];?></td>
                              </tr>
                              <tr>
                                <th> Customer Name </th>
                                <td><?php  echo $row['CustomerName'];?></td>
                              </tr>
                              <tr>
                                <th>Email</th>
                                <td><?php  echo $row['CustomerEmail'];?></td>
                              </tr>
                              <tr>
                                <th>Mobile Number</th>
                                <td><?php  echo $row['CustomerContactNo'];?></td>
                              </tr>
                              <tr>
                                <th>Full Address.</th>
                                <td><?php  echo $row['CustomerAddress'];?></td>
                              </tr>
                              <tr>
                                <th>City</th>
                                <td><?php  echo $row['CustomerCity'];?></td>
                              </tr>
                              <tr>
                                <th>State</th>
                                <td><?php  echo $row['CustomerState'];?></td>
                              </tr>
                              <tr>
                                <th>Pin Code</th>
                                <td><?php  echo $row['CustomerPincode'];?></td>
                              </tr>
                              <tr>
                                <th>Order Final Status</th>
                                <td> <?php echo $row['FinalStatus'];?></td>
                              </tr>
                            </table>
                    </div>
                    
                    <div class="col-6" style="margin-top:2%">
                          <?php  
                        
                          $sql="select * from tblorderdetails where tblorderdetails.OrderNumber='$oid'";
                        if($query=mysqli_query($con,$sql))
                        {
                        $num=mysqli_num_rows($query);
                        $cnt=1;
                        }
                          ?>
                    <table border="1" class="table table-bordered mg-b-0">
                        <tr align="center">
                          <td colspan="5" style="font-size:20px;color:blue">
                            Order  Details</td></tr> 

                        <tr>
                            <th>Order Number</th>
                            <th>Product Name </th>
                            <th>Quantity</th>
                            <th>Price</th>
                            <th>Amount</th>
                        </tr>
                        <?php  
                        while ($row1=mysqli_fetch_array($query)) {
                          ?>
                        <tr>
                          <td><?php echo $row1['OrderNumber']?></td>
                          <td><?php echo $row1['ProductName']?></td>
                          <td><?php  echo $row1['Quantity'];?></td> 
                          <td><?php  echo $total=$row1['Rate'];?></td> 
                          <td><?php  echo $total1=$row1['Amount'];?></td> 
                        </tr>

                        <tr>
                          <th colspan="4" style="text-align:center">Grand Total </th>
                        <td><?php 
                         $a=$grandtotal+$total1;
                        
                        $cnt=$cnt+1;
                        
                         echo $a; 
                        }
                        ?></td>
                        </tr> 
                    </table>  

                 </div>
                </div>     
    
                     <table class="table mb-0">
                        <?php
                          if($orderstatus=="Order Confirmed" || $orderstatus=="Order being Prepared" || $orderstatus=="Order Pickup" || $orderstatus=="" ){ 
                        ?>

                            <form name="submit" method="post"> 
                            <tr>
                                <th>Product Remark :</th>
                                <td>
                                <textarea name="restremark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
                              </tr>
                            
                              <tr>
                                <th>Product  Status :</th>
                                <td>
                               <select name="status" class="form-control wd-450" required="true" >
                                 <option value="Order Confirmed" selected="true">Order Confirmed</option>
                                 <option value="Order Cancelled">Order Cancelled</option>
                                 <option value="Product being Prepared">Product being Prepared</option>
                                 <option value="Product Pickup">Product Pickup</option>
                                 <option value="Product Delivered">Product Delivered</option>
                               </select></td>
                              </tr>
                                <tr align="center">
                                <td colspan="2"><button type="submit" name="submit" class="btn btn-primary">Update order</button></td>
                              </tr>
                            </form>
                            <?php } ?>
                        </table>
                    <?php } ?>

<?php  

if($orderstatus!=""){
$ret=mysqli_query($con,"select tblfoodtracking.OrderCanclledByUser,tblfoodtracking.remark,tblfoodtracking.status as fstatus,tblfoodtracking.StatusDate from tblfoodtracking where tblfoodtracking.OrderId ='$oid'");
$cnt=1;

 $cancelledby=$row['OrderCanclledByUser'];
 ?>
<table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
  <tr align="center">
   <th colspan="4" >Product Tracking History</th> 
  </tr>
  <tr>
    <th>#</th>
<th>Remark</th>
<th>Status</th>
<th>Time</th>
</tr>
<?php  
while ($row=mysqli_fetch_array($ret)) { 
  ?>
<tr>
  <td><?php echo $cnt;?></td>
 <td><?php  echo $row['remark'];?></td> 
  <td><?php  echo $row['fstatus'];
if($cancelledby==1){
echo "("."by user".")";
} else {

echo "("."by Resturants".")";
}
  ?></td> 
   <td><?php  echo $row['StatusDate'];?></td> 
</tr>
<?php $cnt=$cnt+1;} ?>
</table>
<?php  }  
?>
                        </div>
                    </div>
                    </div>

                </div>
            </div>


        </div>
        </div>



    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- Steps -->
    <script src="js/plugins/steps/jquery.steps.min.js"></script>

    <!-- Jquery Validate -->
    <script src="js/plugins/validate/jquery.validate.min.js"></script>


    <script>
        $(document).ready(function(){
            $("#wizard").steps();
            $("#form").steps({
                bodyTag: "fieldset",
                onStepChanging: function (event, currentIndex, newIndex)
                {
                    // Always allow going backward even if the current step contains invalid fields!
                    if (currentIndex > newIndex)
                    {
                        return true;
                    }

                    // Forbid suppressing "Warning" step if the user is to young
                    if (newIndex === 3 && Number($("#age").val()) < 18)
                    {
                        return false;
                    }

                    var form = $(this);

                    // Clean up if user went backward before
                    if (currentIndex < newIndex)
                    {
                        // To remove error styles
                        $(".body:eq(" + newIndex + ") label.error", form).remove();
                        $(".body:eq(" + newIndex + ") .error", form).removeClass("error");
                    }

                    // Disable validation on fields that are disabled or hidden.
                    form.validate().settings.ignore = ":disabled,:hidden";

                    // Start validation; Prevent going forward if false
                    return form.valid();
                },
                onStepChanged: function (event, currentIndex, priorIndex)
                {
                    // Suppress (skip) "Warning" step if the user is old enough.
                    if (currentIndex === 2 && Number($("#age").val()) >= 18)
                    {
                        $(this).steps("next");
                    }

                    // Suppress (skip) "Warning" step if the user is old enough and wants to the previous step.
                    if (currentIndex === 2 && priorIndex === 3)
                    {
                        $(this).steps("previous");
                    }
                },
                onFinishing: function (event, currentIndex)
                {
                    var form = $(this);

                    // Disable validation on fields that are disabled.
                    // At this point it's recommended to do an overall check (mean ignoring only disabled fields)
                    form.validate().settings.ignore = ":disabled";

                    // Start validation; Prevent form submission if false
                    return form.valid();
                },
                onFinished: function (event, currentIndex)
                {
                    var form = $(this);

                    // Submit form input
                    form.submit();
                }
            }).validate({
                        errorPlacement: function (error, element)
                        {
                            element.before(error);
                        },
                        rules: {
                            confirm: {
                                equalTo: "#password"
                            }
                        }
                    });
       });
    </script>

</body>

</html>