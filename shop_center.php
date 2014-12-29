<?php
include "./configs/config.php" ; 
?>


<?php 
  include "./theme/header.php";
?>


<div class="container">

        <div class="row">

</head>

<body>
<style> 
 .fullwidth {
        background-color:#428bca; 
        width:100%; 
        height:35px; 
        position:absolute; 
        z-index:999;
        left: 0;
        right: 0;
        padding-left:250px;
    }
</style>
  <div class="fullwidth">
                    <?php 
						$shopcenter->GetCategories() ; 
					?> 
 </div>




    </br> </br>


                </div>
            </div>

            <div class="col-md-12">
				
				<?php
				
				$cmd=$_GET['cmd'] ; 
				
				if($cmd==""){
				$c_id = $functions->SecureInput($_GET['cat']) ; 
				echo $shopcenter->GetPathTree("cat",$c_id) ; 
				echo $shopcenter->GetSlider($c_id) ; 
				?>
				
				

					<div class="row">

				<?php
					$cat = $functions->SecureInput($_GET['cat']) ; 
					$page = $functions->SecureInput($_GET['page']) ; 
					echo $shopcenter->GetItems($cat,$page) ; 
					
				}elseif($cmd=="item"){
					$item = $functions->SecureInput($_GET['item']) ;
					echo $shopcenter->GetPathTree("item",$item) ; 
					echo $shopcenter->GetItemInfo($item) ; 
				}elseif($cmd=="order"){
					$user->CheckAuth(True) ; 
					$item = $functions->SecureInput($_GET['item']) ;
					echo $shopcenter->ConfirmOrder($item) ; 
					
				}
				?>




                </div>

            </div>

        </div>

    </div>


<?php 
include "./includes/z_scripts/shop_center.js" ; 
include "./theme/footer.php";
?>

                            
                            
                            
                            
                            
                            