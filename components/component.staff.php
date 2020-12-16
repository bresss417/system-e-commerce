<?php

function navbarPlain($name_last){
    echo "
    
    <nav class=\"navbar navbar-expand-md navbar-light bg-light fixed-top\" id=\"mynavbar\">
        <a href=\"#\" class=\"navbar-brand logo\">
            <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> Page UpdateCamera
        </a>
        <div class=\"collapse navbar-collapse\" id=\"\">
          <div class=\"navbar-nav\">
            <a href=\"index.php\" class=\"nav-item nav-link\">
                <i class=\"fa fa-home\" aria-hidden=\"true\"></i> GoTo Index
            </a>
          </div>
         
         <div class=\"navbar-nav ml-auto\">
           <div class=\"container\">
            <ul class=\"nav navbar-nav\">
              <li class=\"dropdown\">
                  <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">$name_last <b class=\"caret\"></b></a>
                  <ul class=\"dropdown-menu \">
                    <li><a href=\"../components/logout.php\" class=\"\">Logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>
                  </ul>
              </li>
            </ul>
           </div>
         </div>
        </div>
    </nav>
    
    ";
}

function navbarStaff($name_last){
    $elements = "
    
    <nav class=\"navbar navbar-expand-md navbar-light bg-light fixed-top\" id=\"mynavbar\">
        <a href=\"index.php\" class=\"navbar-brand logo\">
            <i class=\"fa fa-camera-retro\" aria-hidden=\"true\"></i> Camera MP3
        </a>
        <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>

        <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
            <div class=\"navbar-nav\">
                <a href=\"index.php\" class=\"nav-item nav-link\">
                    <i class=\"fa fa-product-hunt\" aria-hidden=\"true\"></i> Product
                </a>
                <a href=\"orders.php\" class=\"nav-item nav-link\">
                    <i class=\"fa fa-history\" aria-hidden=\"true\"></i> orders
                </a>
                <a href=\"\" class=\"nav-item nav-link\" data-toggle=\"modal\" data-target=\"#modalContactForm\">
                    <i class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></i> addproduct
                </a>
            </div>
            <div class=\"navbar-nav ml-auto\">
              <div class=\"container\">
                <ul class=\"nav navbar-nav\">
                  <li class=\"dropdown\">
                      <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">$name_last <b class=\"caret\"></b></a>
                      <ul class=\"dropdown-menu \">
                        <li><a href=\"../components/logout.php\" class=\"\">Logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>
                      </ul>
                  </li>
                </ul>
              </div>
            </div>
        </div>
    </nav>
    
    ";
    echo $elements;
}

function cardStaff($Cname,$Cimage,$Cprice,$C_id){
    $elementsTrue = "
    
        <div class=\"col-md-3 mt-2\">
         <div class=\"card\">
            <img class=\"card-img-top\" src=\"../data/$Cimage\" alt=\"Card image cap\" height=\"200\">
            <div class=\"card-body\">
               <h5 class=\"card-title border-bottom pb-3\">$Cname <a href=\"#\" class=\"float-right d-inline-flex share\"><i class=\"fa fa-share-alt text-primary\"></i></a></h5>
               <p class=\"card-text\">$ $Cprice</p>
               <a href=\"update.product.php?camera_id=$C_id\" class=\"float-left text-warning \"><i class=\"fa fa-angle-double-left\"></i> Update Product</a>
               <a href=\"del_p.php?camera_id=$C_id\" class=\"float-right text-danger h4\"><i class=\"fa fa-trash-o\"></i></a>
            </div>
         </div>
        </div>

    ";
    echo $elementsTrue;
}

function changeDate($date){
    $get_date = explode("-",$date);
    $month = array("01"=>"January","02"=>"February","03"=>"March","04"=>"April","05"=>"May","06"=>"June","07"=>"July","08"=>"Aujust","09"=>"September","10"=>"October","11"=>"November","12"=>"December");
    $get_month = $get_date["1"];
    $year = $get_date["0"]+543;
    return $get_date["2"]." ".$month[$get_month]." ".$year ;
 
}
function dateTime($date_time){
    $get_date_time = explode(' ',$date_time);
    $date = changeDate($get_date_time['0']);
    $time = substr($get_date_time['1'],0,-3);
    return $date." เวลา ".$time;
}

function ordersList($productName,$productImg,$userName,$ferstName,$lastName,$Phone,$Qty,$adDress,$priceAll,$Date,$SliptImg,$statusPay){
    

    $elementsOrders = "
      <div class=\"card b-1 hover-shadow mb-20\">
        <div class=\"media card-body\">
            <div class=\"media-left pr-12\">
                <img class=\"avatar avatar-xl no-radius\" src=\"../data/$productImg \" alt=\"...\">
            </div>
            <div class=\"media-body col-8\">
                <div class=\"mb-2\">
                    <span class=\"fs-20 pr-16\">ProductName : $productName</span>
                </div>
                <small class=\"text-secondary fs-16 fw-300 ls-1\">realName : $ferstName &nbsp; $lastName</small> ||
                <small class=\"fs-16 fw-300 text-info \">(User) : $userName</small>
            </div>
            <div class=\"media-right text-right d-none d-md-block\">
                <p class=\"fs-14 text-fade mb-12\">
                    <i class=\"fa fa-map-marker pr-1 text-danger\"></i> $adDress
                </p>
                <span class=\"text-fade\">
                    <i class=\"fa fa-phone pr-1\"></i> $Phone &nbsp;
                </span>
                <span class=\"text-fade\">
                    <i class=\"fa fa-product-hunt text-warning pr-1\"></i>($Qty)ชิ้น
                </span>
                <span class=\"text-fade\">
                    <i class=\"fa fa-money pr-1 text-success\"></i> $priceAll ฿
                </span>
            </div>
        </div>
        <footer class=\"card-footer flexbox align-items-center\">
            <div>
                <strong>Applied on:</strong>
                <span>$Date</span>
            </div>
            <div class=\"card-hover-show\">
                <a rel=\"example_group\"  title=\"สลิปการจ่ายเงินของผู้ซื่อ\" class=\"btn btn-xs fs-10 btn-bold btn-info \" href=\"../images/$SliptImg\">
                    view image slipt
                </a>
                <a class=\"btn btn-xs fs-10 btn-bold btn-primary\" href=\"#\" data-toggle=\"modal\" data-target=\"#modal-contact\">Contact</a>
                <a class=\"btn btn-xs fs-10 btn-bold btn-warning\" href=\"#\">Delete</a>
            </div>
        </footer>
      </div>
    ";
    echo $elementsOrders;
}

function UpdateCamera($CameraId,$CameraName,$CameraPrice,$CameraImg,$CameraDetail,$ColorCamera){
    $elementsUpdateCamera = "
    
	  <div class=\"wrapper row\">
	  	<div class=\"preview col-md-6\">
	  		
	  		<div class=\"preview-pic tab-content\">
	  		    <div class=\"tab-pane active\" id=\"pic-1\">
                    <img src=\"../data/$CameraImg\" />
                </div>
                    <div class=\"ribbon\"><span>Popular</span></div>
	  		</div>
	  		
	  	</div>
        <div class=\"details col-md-6\">
          <form action=\"chkUpdate.product.php\" method=\"POST\">
            <input type=\"hidden\" name=\"Cid\" value=\"$CameraId\" />
            <div class=\"row\">
              <h3 class=\"product-title\">Product : </h3>
                  <input type=\"text\" name=\"C_name\" class=\"finput\" value=\"$CameraName\" />
            </div>
	  		<div class=\"rating\">
	  			<span class=\"review-no\">&nbsp;</span>
            </div>
              <textarea class=\"form-control\" rows=\"6\"  name=\"C_detail\"> 
                $CameraDetail
              </textarea> 
	  		<p class=\"product-description\"></p>
	  		<h4 class=\"price\">current price: <span>$(<input type=\"tel\" name=\"C_price\" class=\"finput\" value=\"$CameraPrice\" />)</span></h4>
              <h5 class=\"colors\">colors:
                <input type=\"tel\" name=\"C_color\" class=\"finput\" value=\"$ColorCamera\" />
                  <span class=\"color $ColorCamera not-available\" data-toggle=\"tooltip\" title=\"Not In store\"></span>
                  <small class=\"text-danger\">(ควรเป็นภาษาอังกฤษเท่านั้น)</small>
	  		</h5>
	  		<div class=\"action\">
                <button class=\"add-to-cart btn btn-default\" type=\"submit\">
                    <span class=\"fa fa-pencil-square-o\" aria-hidden=\"true\"></span> Click Update
                </button>
                <button class=\"like btn btn-default\" type=\"button\" onclick=\"myEvent()\">
                  <span class=\"fa fa-bullhorn\"></span> Promotion
                </button>
                
          </form>
          
          </div>
	  	</div>
	  </div>

    ";
    echo $elementsUpdateCamera;
}

?>