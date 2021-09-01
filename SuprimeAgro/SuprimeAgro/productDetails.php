<?php
$name=$_REQUEST['name'];
include('DataBase_Connection.php');

 session_start();  

  if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_POST["hidden_id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_POST["hidden_id"],  
                      'item_img'             =>      $_POST["hidden_img"],
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                
                echo '<script>alert("Item Added To Cart")</script>'; 
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
                echo '<script>window.location="product.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>      $_POST["hidden_id"],  
                 'item_img'             =>      $_POST["hidden_img"],
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 } 
 $count=count($_SESSION["shopping_cart"]);
?>

<!DOCTYPE html>
<html lang="en">

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
<!--
    
TemplateMo 559 Zay Shop

https://templatemo.com/tm-559-zay-shop

-->
</head>

<body>
    <?php include('header.php');?>
    <!-- Close Header -->
<?php

include('DataBase_Connection.php');

$query=mysqli_query($con,"select * from tblProduct where ProductName='$name'");

while($row=mysqli_fetch_array($query))
{
    
?>
    <form action="" method="post" class="modal-content modal-body border-0 p-0">
                
    <!-- Modal -->
    <div class="modal fade bg-white" id="templatemo_search" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="w-100 pt-1 mb-5 text-right">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

                <div class="input-group mb-2">
                    <input type="text" class="form-control" id="inputModalSearch" name="q" placeholder="Search ...">
                    <button type="submit" class="input-group-text bg-success text-light">
                        <i class="fa fa-fw fa-search text-white"></i>
                    </button>
                </div>
     
        </div>
    </div>

    <!-- Open Content -->
    <section class="bg-light">
        <div class="container pb-5">
            <div class="row">
                <div class="col-lg-5 mt-5">
                    <div class="card mb-4">
                        <center><img class="card-img" src="admin/<?php echo $row[4]; ?>"  alt="Card image cap" id="product-detail myimage" style="height:580px;width:250px;padding:15px 0px 15px 0px"></center>
                    </div>
                    <div class="row">
                        
                    </div>
                </div>
                <!-- col end -->
                <div class="col-lg-7 mt-5">
                    <div class="card">
                        <div class="card-body">
                       
                            <h1 class="h2"><?php echo $row[1]; ?></h1>
                            <p class="h3 py-2">Price :-<?php echo $row[5]; ?></p>
                            <p class="py-2">
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-warning"></i>
                                <i class="fa fa-star text-secondary"></i>
                                <span class="list-inline-item text-dark">Rating 4.8 | 36 Comments</span>
                            </p>
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Brand:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>Suprime Agro</strong></p>
                                </li>
                            </ul>

                            <h6>Description:</h6>
                            <p><?php echo $row[2]; ?></p>
                           <ul class="list-inline">
                                <li class="list-inline-item">
                                    <h6>Available In:</h6>
                                </li>
                                <li class="list-inline-item">
                                    <p class="text-muted"><strong>1 Ltr || 500 Ml || 250 Ml || 100Ml</strong></p>
                                </li>
                            </ul>

                            <h6>Specification:</h6>
                            <ul class="list-unstyled pb-3">
                                <li><?php echo $row[3]; ?></li>
                                
                            </ul>

                           <form action="" method="post">
                                <input type="hidden" name="product-title" value="Activewear">
                                <div class="row">
                                 
                                    <div class="col-auto">
                                         <ul class="list-inline pb-3">
                                            <li class="list-inline-item text-left">
                                                Available In
                                            <select class="form-control">
                                                <option>100 ml</option>
                                                <option>250 ml</option>
                                                <option>500 ml</option>
                                                <option>1000 ml</option>
                                            </select>
                                            </li>
                                        <li class="list-inline-item text-right">
                                                Quantity
                                <input type="hidden"  name="quantity" id="product-quanity" value="1">
                                <input type="hidden" name="hidden_img" value="<?php echo $row[4]; ?>" />
                               
                                <input type="hidden" name="hidden_id" value="<?php echo $row[0]; ?>" />  
                                
                                <input type="hidden" name="hidden_name" value="<?php echo $row[1]; ?>" />  
                                
                               <input type="hidden" name="hidden_price" value="<?php echo $row[5]; ?>" />  
                               
                                            </li>
                                            
                            <li class="list-inline-item"><input type="number" class="form-control" name="quantity" id="product-quanity" value="1"></li>
                                            
                                        </ul>
                        
                                    </div>
                                </div>
                                <div class="row pb-3">
                                  
                                    <div class="col d-grid">
                                        <button type="submit" class="btn btn-success btn-lg" name="add_to_cart" value="addtocard">Add To Cart</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
         <?php } ?>
        </div>
    </section>
    <!-- Close Content -->

  <!-- Start Article -->
    <section class="py-5">
        <div class="container">
            <div class="row text-left p-2 pb-3">
                <h4>Products</h4>
            </div>

            <!--Start Carousel Wrapper-->
            <div id="carousel-related-product">

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <a href="productDetails.php?name=Glucon-P" class="h3 text-decoration-none"><center><img class="card-img rounded-0 img-fluid" src="img/Products/gluconp.png" style="height:390px;width:191px;"></a></center>
                            
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Glucon-P" class="h3 text-decoration-none">Glucon-P</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$45.00</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <a href="productDetails.php?name=Hansika" class="h3 text-decoration-none">
                                <center><img class="card-img rounded-0 img-fluid" src="img/Products/hansika.png" style="height:390px;width:191px;"></a></center>
                       
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Hansika" class="h3 text-decoration-none">Hansika</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$60.00</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                             <a href="productDetails.php?name=Protein Plus" class="h3 text-decoration-none">
                                   <center><img class="card-img rounded-0 img-fluid" src="img/Products/protien plus.png" style="height:390px;width:191px;"></a>  </center>
                         
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Protein Plus" class="h3 text-decoration-none">Protein Plus</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                               
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$125.00</p>
                        </div>
                    </div>
                </div>

                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                           <a href="productDetails.php?name=Prime Stick" class="h3 text-decoration-none"> 
                             <center><img class="card-img rounded-0 img-fluid" src="img/Products/prrimestick.png" style="height:390px;width:191px;"></a>  </center>
                           
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Prime Stick" class="h3 text-decoration-none">Prime Stick</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                               
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$160.00</p>
                        </div>
                    </div>
                </div>
    
                 <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                          <a href="productDetails.php?name=Prime Stim" class="h3 text-decoration-none">
                                <center>  <img class="card-img rounded-0 img-fluid" src="img/Products/primestim.png" style="height:390px;width:191px;"></a>  </center>
                           
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Prime Stim" class="h3 text-decoration-none">Prime Stim</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                               
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$110.00</p>
                        </div>
                    </div>
                </div>
                
                <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <a href="productDetails.php?name=Wonder" class="h3 text-decoration-none">
                                  <center><img class="card-img rounded-0 img-fluid" src="img/Products/WONDER.png" style="height:390px;width:191px;"></a>  </center>
                          
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Wonder" class="h3 text-decoration-none">Wonder</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                               
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$110.00</p>
                        </div>
                    </div>
                </div>

                     <div class="p-2 pb-3">
                    <div class="product-wap card rounded-0">
                        <div class="card rounded-0">
                            <a href="productDetails.php?name=Dr.Stick" class="h3 text-decoration-none">
                                  <center><img class="card-img rounded-0 img-fluid" src="img/Products/dr.stick.png" style="height:390px;width:191px;"></a>  </center>
                         
                        </div>
                        <div class="card-body">
                            <a href="productDetails.php?name=Dr.Stick" class="h3 text-decoration-none">Dr.Stick</a>
                            <ul class="w-100 list-unstyled d-flex justify-content-between mb-0">
                               
                                <li class="pt-2">
                                    <span class="product-color-dot color-dot-red float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-blue float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-black float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-light float-left rounded-circle ml-1"></span>
                                    <span class="product-color-dot color-dot-green float-left rounded-circle ml-1"></span>
                                </li>
                            </ul>
                            <ul class="list-unstyled d-flex justify-content-center mb-1">
                                <li>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-warning fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                    <i class="text-muted fa fa-star"></i>
                                </li>
                            </ul>
                            <p class="text-center mb-0">$110.00</p>
                        </div>
                    </div>
                </div>

            </div>


        </div>
    </section>

</form>
    <!-- Start Footer -->
    <?php include('footer.php');?>
    <!-- End Footer -->

    <!-- Start Script -->
    <script src="assets/js/jquery-1.11.0.min.js"></script>
    <script src="assets/js/jquery-migrate-1.2.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/templatemo.js"></script>
    <script src="assets/js/custom.js"></script>
    <!-- End Script -->

    <!-- Start Slider Script -->
    <script src="assets/js/slick.min.js"></script>
    <script>
        $('#carousel-related-product').slick({
            infinite: true,
            arrows: false,
            slidesToShow: 4,
            slidesToScroll: 3,
            dots: true,
            responsive: [{
                    breakpoint: 1024,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 3
                    }
                }
            ]
        });
    </script>
    <!-- End Slider Script -->

</body>

</html>