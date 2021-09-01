<?php
session_start();
error_reporting(0);
include('dbconnection.php');

if(isset($_POST['submit']))
  {
     $cid=$_REQUEST['editid'];
       
    $target_dir="image/";
    $target_file=$target_dir.basename($_FILES["itemimages"]["name"]);


if(move_uploaded_file($_FILES["itemimages"]["tmp_name"],$target_file))
	echo "";
else
	echo "";
   
    $query=mysqli_query($con, "update tblProduct set ProductImage='$target_file' where ProductID='$cid'");
    if ($query>0) {
    $msg="Item image has been updated.";
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
        <div class="row border-bottom">
        
        </div>
 

            <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Product</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="dashboard.php">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>Products</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>Update Image</strong>
                    </li>
                </ol>
            </div>
        </div>
        
        <div class="wrapper wrapper-content animated fadeInRight">
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox">
                        <div class="ibox-content">
					   <p style="font-size:16px; color:red;"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                           
 <?php
 $cid=$_REQUEST['editid'];
$ret=mysqli_query($con,"select * from tblProduct where ProductID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>

                            <form id="submit" action="#" class="wizard-big" method="post" name="submit" enctype="multipart/form-data">
							
           </p>
                                    <fieldset>
                                        <div class="form-group row"><label class="col-sm-2 col-form-label">Product Name</label>
                                                <div class="col-sm-10"><?php  echo $row['ProductName'];?></div>
                                            </div>
                                                                                                                               
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">Image</label>
                                                <div class="col-sm-10"><img src="<?php echo $row['ProductImage'];?>" width="200" height="150" value="<?php  echo $row['ProductImage'];?>"> 
                                                     </div>
                                            </div>
                                            <div class="form-group row"><label class="col-sm-2 col-form-label">New Image</label>
                                                <div class="col-sm-10"><input type="file" name="itemimages" required="true"></div>
                                            </div>
     
                                        </fieldset>
                                        <?php } ?>


          <p style="text-align: center;"><button type="submit" name="submit" class="btn btn-primary">Submit</button></p>
            
                                
                               
                            </form>
                        </div>
                    </div>
                    </div>

                </div>
            </div>
        <?php include_once('includes/footer.php');?>

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
