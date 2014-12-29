<<<<<<< HEAD
=======
#Code Written By bilal barzinji /Ali Alzubidy . b2l2l.com #al-i7san ORG
>>>>>>> origin/site_files
<?php
include "./configs/config.php" ; 
?>


<?php 
  include "./theme/header.php";
?>


<?php echo $shopcenter->GetSlider("index") ; ?>
<!--

<div class="container" style="margin-top: 10px; margin-bottom: 100px;">
    <div class="row">
        <div class="row step">
		<div class="col-md-2 activestep" onclick="javascript: resetActive(event, 0, 'step-1');">
                <span class="fa fa-users"></span>
                <p><?php echo $lang['Slider_Step1_Header']; ?></p>
            </div>
	
            <div class="col-md-2" onclick="javascript: resetActive(event, 20, 'step-2');">
                <span class="fa fa-pencil"></span>
                <p><?php echo $lang['Slider_Step2_Header']; ?></p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 40, 'step-3');">
                <span class="fa fa-search"></span>
                <p><?php echo $lang['Slider_Step3_Header']; ?></p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 60, 'step-4');">
                <span class="fa fa-dollar"></span>
                <p><?php echo $lang['Slider_Step4_Header']; ?></p>
            </div>
            <div class="col-md-2" onclick="javascript: resetActive(event, 80, 'step-5');">
                <span class="fa fa-cloud-upload"></span>
                <p><?php echo $lang['Slider_Step5_Header']; ?></p>
            </div>
            <div id="last" class="col-md-2" onclick="javascript: resetActive(event, 100, 'step-6');">
                <span class="fa fa-share-alt"></span>
                <p><?php echo $lang['Slider_Step6_Header']; ?></p>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-md-12 col-lg-12">
        <div class="col-xs-4 col-md-3 col-lg-3 step">
            <div id="progress" class="col-xs-12 col-md-4 col-lg-4" style="width: 190px; height: 190px;">
            </div>
        </div>
        <div class="col-xs-12 col-md-9 col-lg-9">
            <div class="row setup-content step activeStepInfo" id="step-1">
                <div class="col-xs-12">
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step1']; ?></h1>
                        <h3 class=""><a href="./register.php" > <?php echo $lang['Slider_First_Title']; ?> </h3></a>
                         <?php echo $lang['Slider_First_P']; ?>
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-2">
                <div>
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step2']; ?></h1>
                        <h3 class=""><?php echo $lang['Slider_Second_Title']; ?> </h3>
                        <?php echo $lang['Slider_Second_P']; ?>
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-3">
                <div>
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step3']; ?></h1>
                        <h3 class=""><?php echo $lang['Slider_Third_Title']; ?></h3>
                        <?php echo $lang['Slider_Third_P']; ?>  
                    </div>
                </div> 
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-4">
                <div>
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step4']; ?></h1>
                        <h3 class=""><?php echo $lang['Slider_Forth_Title']; ?></h3>
                        <?php echo $lang['Slider_Forth_Title']; ?>
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-5">
                <div>
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step5']; ?></h1>
                        <h3 class=""><?php echo $lang['Slider_Fifth_Title']; ?></h3>
                       <?php echo $lang['Slider_Fifth_P']; ?>
                    </div>
                </div>
            </div>
            <div class="row setup-content step hiddenStepInfo" id="step-6">
                <div>
                    <div class="well text-center">
                        <h1><?php echo $lang['Slider_Step6']; ?></h1>
                        <h3 class=""><img src="./imges/fb.jpg" ></h3>
                        <?php echo $lang['Slider_Sixth_P']; ?> 
             
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
-->
<style>
.hiddenStepInfo {
    display: none;
}

.activeStepInfo {
    display: block !important;
}

.underline {
    text-decoration: underline;
}

.step {
    margin-top: 27px;
    text-align: center;
}    

.step .col-md-2 {
    background-color: #fff;
    border: 1px solid #C0C0C0;
    border-right: none;
}

.step .col-md-2:last-child {
    border: 1px solid #C0C0C0;
}

.step .col-md-2:first-child {
    border-radius: 5px 0 0 5px;
}

.step .col-md-2:last-child {
    border-radius: 0 5px 5px 0;
}

.step .col-md-2:hover {
    color: #F58723;
    cursor: pointer;
}

.step .activestep {
    color: #F58723;
    height: 100px;
    margin-top: -7px;
    padding-top: 7px;
    border-left: 6px solid #5CB85C !important;
    border-right: 6px solid #5CB85C !important;
    border-top: 3px solid #5CB85C !important;
    border-bottom: 3px solid #5CB85C !important;
    vertical-align: central;
}

.step .fa {
    padding-top: 15px;
    font-size: 40px;
}
<style>
input::-webkit-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
input::-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}
input:-ms-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
input:-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}
option::-webkit-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
option::-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}
option:-ms-input-placeholder { font-size: 17pt; color: #555;text-align:center; }
option:-moz-placeholder { font-size: 17pt; color: #555; text-align:center;}

input.other::-webkit-input-placeholder { font-size: 12pt; color: red; }
input.other::-moz-placeholder { font-size: 12pt; color: red; }
input.other:-ms-input-placeholder { font-size: 12pt; color: red; }
input.other:-moz-placeholder { font-size: 12pt; color: red; }
</style>
</style>

<!-- you need to include the shieldui css and js assets in order for the components to work -->
<link rel="stylesheet" type="text/css" href="./css/main/shieldui-all.min.css" />
<link rel="stylesheet" type="text/css" href="./css/main/all.min.css" />
<script type="text/javascript" src="./css/main/shieldui-all.min.js"></script>

<script type="text/javascript">
//initialization options for the progress bar
var progress = $("#progress").shieldProgressBar({
    min: 0,
    max: 100,
    value: 20,
    layout: "circular",
    layoutOptions: {
        circular: {
            borderColor: "#FF7900",
            width: 17,
            borderWidth: 3,
            color: "#1E98E4",
            backgroundColor: "transparent"
        }
    },
    text: {
        enabled: true,
        template: '<span style="font-size:47px; color: #1E98E4">{0:n1}%</span>'
    },
}).swidget();


function resetActive(event, percent, step) {
    progress.value(percent);

    $(".progress-bar").css("width", percent + "%").attr("aria-valuenow", percent);
    $(".progress-completed").text(percent + "%");

    $("div").each(function () {
        if ($(this).hasClass("activestep")) {
            $(this).removeClass("activestep");
        }
    });

    if (event.target.className == "col-md-2") {
        $(event.target).addClass("activestep");
    }
    else {
        $(event.target.parentNode).addClass("activestep");
    }

    hideSteps();
    showCurrentStepInfo(step);
}

function hideSteps() {
    $("div").each(function () {
        if ($(this).hasClass("activeStepInfo")) {
            $(this).removeClass("activeStepInfo");
            $(this).addClass("hiddenStepInfo");
        }
    });
}

function showCurrentStepInfo(step) {
    var id = "#" + step;
    $(id).addClass("activeStepInfo");
}
</script>








		  <div class="panel panel-default col-sm-8">
            <div class="panel-heading">
              <h3 class="panel-title text-center"><?php echo $lang['Calculator'] ; ?></h3>
            </div>
            <div class="panel-body">
					<form class="form-group" method="post" action="./process.php" id="Calculator" >
					<input type="hidden" name="cmd" id="cmd" value="calculate" />
	<div class="col-md-8"> 
		<input id="item_price" name="item_price" placeholder="<?php echo $lang['CALCULATOR_ITEM_PRICE'] ; ?>" class="form-control input-md" required="" type="text">  
		<br/>
	</div>
  
	<div class="col-md-8">
		<input id="quantity" name="quantity" placeholder="<?php echo $lang['CALCULATOR_ITEM_QUANTITY'] ; ?>" class="form-control input-md" required="" type="text">
		<br/>
	</div>

	<div class="col-md-8">
		<input id="item_weight" name="item_weight" placeholder="<?php echo $lang['CALCULATOR_Item_Weight'] ; ?>" class="form-control input-md" required="" type="text">  
		<br/>
	</div>

	<div class="col-md-8">
		<select id="delivery" name="delivery" class="form-control">
			<option value="erbil_branch"><?php echo $lang['CALCULATOR_Branch_delivery_e'] ; ?></option>
			<option value="erbil_home"><?php echo $lang['CALCULATOR_Home_delivery_e'] ; ?></option>

			<option value="suly_branch"><?php echo $lang['CALCULATOR_Branch_delivery_s'] ; ?></option>
			<option value="suly_home"><?php echo $lang['CALCULATOR_Home_delivery_s'] ; ?></option>
		</select>
		<br/>
	</div>

	<div class="col-md-8">
		<button type="submit" id="calculatebtn" name="calculatebtn" class="btn btn-primary"><?php echo $lang['CALCULATE'] ; ?> </button>
		<br/>
	</div>
</form>
<div id="CalculatorResponse" class="col-md-8"></div>
</div>
</div>
<div class="panel panel-default col-sm-4">
            <div class="panel-heading">
              <h3 class="panel-title text-center">
          <?php echo $lang['MENU_HOW'] ?></h3>
            </div>
            <div class="panel-body">
<p><font size="4">


How It Works? </br>
1. Sign up Free.</br>
2. Send the link of the item.</br>
3. We buy the item for you.</br>
4. Get your item with Home Delivery Service or from one of our branches in Erbil, Sulaimani and Duhok.
<p>
<br/><br/>
 </font></p>
			</div>
          </div>

    </div>
</div>
</div>

<div class="container">
 
    <div class="container hidden-xs">
        <div class="our-clients">
            <div class="our-client-header">
                

                <div class="control-box">
                </div>
            </div>
            <div class="our-clients-carousel">
                <div class="col-sm-12">
                    <div class="carousel slide" id="Ourclients">
                        <div class="carousel-inner">
                            <div class="item active">
                                <ul class="thumbnails">
                                    <li class="col-sm-3">
                                        <a href="http://bh.com" target="_blank">
                                            <img  src="./imges/logos/bh.jpg" width="130">
                                        </a>
                                    </li>
                                    <li class="col-sm-3">
                                        <a href="http://rakuten.com" target="_blank">
                                            <img  src="./imges/logos/rakuten.jpg"  width="150">
                                        </a>
                                    </li>
                                    <li class="col-sm-3">
                                        <a href="http://amazon.com" target="_blank">
                                            <img src="./imges/amazon.png"   width="150">
                                        </a>
                                    </li>
                                    <li class="col-sm-3">
                                        <a href="http://iherb.com" target="_blank">
                                            <img src="./imges/logos/iherb.jpg" width="150" >
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /Slide1 -->
                          
                                      


                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</br> </br>
<div class="container">

        <div class="row">

         
   <header class="jumbotron hero-spacer">
            <h1>New To Kreeen?  <small></small> </h1> 
           Then you just need to click here and see all the Tuts we have made for you </a>





<?php 
include "./includes/z_scripts/common.js" ; 
include "./theme/footer.php";
?>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
<<<<<<< HEAD
                            
=======
                            
>>>>>>> origin/site_files
