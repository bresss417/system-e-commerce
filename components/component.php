<?php

function navbarUsers($name_last,$C_ount){
    $elements = "
    <nav class=\"navbar navbar-expand-md navbar-light bg-light fixed-top\" id=\"mynavbar\">
        <a href=\"index.php\" class=\"navbar-brand logo\">
            <i class=\"fa fa-camera-retro\" aria-hidden=\"true\"></i> Camera rental
        </a>
        <button type=\"button\" class=\"navbar-toggler\" data-toggle=\"collapse\" data-target=\"#navbarCollapse\">
            <span class=\"navbar-toggler-icon\"></span>
        </button>
        <div class=\"collapse navbar-collapse\" id=\"navbarCollapse\">
            <div class=\"navbar-nav\">
                <a href=\"index.php\" class=\"nav-item nav-link active\">
                    <i class=\"fa fa-home\" aria-hidden=\"true\"></i> Home
                </a>
                <a href=\"product.user.php\" class=\"nav-item nav-link\">
                    <i class=\"fa fa-product-hunt\" aria-hidden=\"true\"></i> Product
                </a>
                <a href=\"shoppingCard.php\" class=\"nav-item nav-link\">
                    <i class=\"fa fa-shopping-cart\" aria-hidden=\"true\"></i> cart
                    <span class=\"badge badge-danger badge-pill custom-badge\">$C_ount</span>
                </a> 
                <a href=\"listorder.php\" class=\"nav-item nav-link\">
                    <i class=\"fa fa-window-maximize\" aria-hidden=\"true\"></i> order
                </a>
            </div>
            <div class=\"navbar-nav ml-auto\">
                <ul class=\"nav navbar-nav\">
                    <li class=\"dropdown xnxx\">
                        <a href=\"#\" class=\"nav-link dropdown-toggle\" data-toggle=\"dropdown\">$name_last <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu dropdown-menu-right\">
                          <li><a href=\"../components/logout.php\" class=\"nav-item nav-link\">Logout <i class=\"fa fa-sign-out\" aria-hidden=\"true\"></i></a></li>
                        </ul>
                    </li>
                    <li>&nbsp;</li>
                    <li>&nbsp;</li>
                </ul>
            </div>
        </div>
    </nav>
    ";
    echo $elements;
}

function savePrice($Cname,$Cimage,$Cprice,$C_id,$Cdetail){
    echo  "
        <div class=\"col-md-3 mt-4\">
         <div class=\"card\">
           <div class=\"product-grid6\">
              <div class=\"product-image6\">
                <div class=\"preview-pic tab-content\">
	  		      <div class=\"tab-pane active\" id=\"pic-1\">
                    <div class=\"product-image6\">
                        <a>
                          <img class=\"card-img-top\" src=\"../data/$Cimage\" alt=\"Card image cap\" height=\"210\">
                        </a>
                    
                    </div>
                  </div>
                    <div class=\"ribbon\"><span>Popular</span></div>
                </div>
              </div> 
            </div>
            <div class=\"card-body\">
               <h5 class=\"card-title border-bottom pb-3\">$Cname <a href=\"#\" class=\"float-right d-inline-flex share\"><i class=\"fa fa-share-alt text-primary\"></i></a></h5>
               
               
            </div>
         </div>
        </div>
    ";
}
function saveCart($Cname,$Cimage,$Cprice,$C_id,$Cdetail){
    echo  "
            <div class=\"col-md-3 mt-4\">
             <div class=\"card\">

               <div class=\"product-grid6\">
                  <div class=\"product-image6\">
                    <div class=\"preview-pic tab-content\">
	  	    	      <div class=\"tab-pane active\" id=\"pic-1\">
                        <div class=\"product-image6\">
                            <a>
                              <img class=\"card-img-top\" src=\"data/$Cimage\" alt=\"Card image cap\" height=\"210\">
                            </a>
                        </div>
                      </div>
                        <div class=\"ribbon\"><span>Popular</span></div>
                    </div>
                  </div>  
                </div>
                
                <div class=\"card-body\">
                   <h5 class=\"card-title border-bottom pb-3\">$Cname <a href=\"#\" class=\"float-right d-inline-flex share\"><i class=\"fa fa-share-alt text-primary\"></i></a></h5>  
                </div>
             </div>
            </div>
    ";
}

function cardCameraUser ($Cname,$Cimage,$Cprice,$C_id,$Cdetail){
    $elementsOne = "
    
    <div class=\"col-md-3 mt-4\">
         <div class=\"card\">
            <img class=\"card-img-top\" src=\"../data/$Cimage\" alt=\"Card image cap\" height=\"210\">
            <div class=\"card-body\">
               <h5 class=\"card-title border-bottom pb-3\">$Cname <a href=\"#\" class=\"float-right d-inline-flex share\"><i class=\"fa fa-share-alt text-primary\"></i></a></h5>
               <p class=\"card-text col-6\">$ $Cprice</p>
               <div class=\"row\">
                <a href=\"add.product.php?camera_id=$C_id&qty=1 \" type=\"button\" class=\"ml-4 btn-sm btn btn-primary\">
                     <i class=\"fa fa-money\"></i> ซื่อเลย
                </a>
                <a href=\"#myModalUser\" role=\"button\" 
                 data-id=\"$C_id\" data-img=\"$Cimage\" data-name=\"$Cname\" data-price=\"$Cprice\" data-detail=\"$Cdetail\"
                     data-toggle=\"modal\" class=\"modalC  btn btn-sm btn-secondary\"><i class=\"fa fa-eye\"></i> view
                </a>
               </div>
            </div>
         </div>
        </div>

    ";
    echo $elementsOne;
}

function cardCamera ($Cname,$Cimage,$Cprice,$C_id,$Cdetail){
    $elements2 = "
    
    <div class=\"col-md-3 mt-4\">
         <div class=\"card\">
            <img class=\"card-img-top\" src=\"data/$Cimage\" alt=\"Card image cap\" height=\"210\">
            <div class=\"card-body\">
               <h5 class=\"card-title border-bottom pb-3\">$Cname <a href=\"#\" class=\"float-right d-inline-flex share\"><i class=\"fa fa-share-alt text-primary\"></i></a></h5>
               <p class=\"card-text\">$ $Cprice</p>
               <a id=\"manualinputlabel\" class=\"float-left\" data-toggle=\"popover\" data-html=\"true\"  data-original-title=\"weclome to use the sql query\" title=\"Dismissible popover\" data-content=\"And here's some amazing content. It's very engaging. Right?\">
                 <i class=\"fa fa-angle-double-left\"></i> Read more
               </a>
               <a href=\"#myModal\" role=\"button\" 
                data-id=\"$C_id\" data-img=\"$Cimage\" data-name=\"$Cname\" data-price=\"$Cprice\" data-detail=\"$Cdetail\"
                    data-toggle=\"modal\" class=\"modalC float-right text-secondary h4\"><i class=\"fa fa-eye\"></i></a>
            </div>
         </div>
        </div>

    ";
    echo $elements2;
}

?>