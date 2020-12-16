<?php

function shoppingCard($CameraID,$CameraImg,$CameraName,$CameraPrice,$CameraDetail,$Qty){
    $Shopping = "
                <div class=\"row mb-4\">

                    <div class=\"col-md-5 col-lg-3 col-xl-3\">
                      <div class=\"view zoom overlay z-depth-1 rounded mb-3 mb-md-0\">
                        <img class=\"img-fluid w-100\"
                          src=\"../data/$CameraImg\" alt=\"Sample\">
                        <a href=\"#!\">
                          <div class=\"mask waves-effect waves-light\">
                            <img class=\"img-fluid w-100\"
                              src=\"../data/$CameraImg\">
                            <div class=\"mask rgba-black-slight waves-effect waves-light\"></div>
                          </div>
                        </a>
                      </div>
                    </div>

                    <div class=\"col-md-7 col-lg-9 col-xl-9\">
                        <div>

                          <div class=\"d-flex justify-content-between\">
                            <div>
                              <h5> ProductName :$CameraName</h5>
                               <p class=\"mb-2 text-muted text-uppercase small\">ชิ้นละ: $CameraPrice บาท</p>
                               <p class=\"mb-3 text-muted text-uppercase small\">Qty : $Qty</p>
                            </div>
                            <div>
                            <div class=\"def-number-input number-input safari_only mb-0 w-100\">
                             <p class=\"mb-0 ml-auto\"><span><strong>$ ".number_format($CameraPrice * $Qty) ."</strong></span></p>
                        
                            </div>
                              <small id=\"passwordHelpBlock\" class=\"form-text text-muted text-center\">
                                (Note, $CameraID piece)
                              </small>
                            </div>
                          </div>
                          
                          <div class=\"d-flex justify-content-between align-items-center\">
                            <div class='row'>
        <form action=\"shoppingCard.php?action=remove&camera_id=$CameraID\" method=\"POST\">
                              <button  type=\"submit\" class=\"btn btn-link text-danger card-link-secondary text-uppercase mr-3\" name=\"remove\">
                                <i class=\"fa fa-trash mr-1\"></i> Remove item 
                              </button>
        </form>
                              <a href=\"add.product.php?camera_id=$CameraID&qty=$Qty \" type=\"button\" class=\"btn btn-link text-success card-link-secondary text-uppercase mr-3\">
                                  <i class=\"fa fa-money\"></i> ซื่อเลย
                              </a>
                            </div>
                          </div>

                        </div>
                      </div>

                </div>  
                <hr class=\"mb-4\"> 
    ";
    echo $Shopping;
}
function cardBuy($Total,$Qtys){
    $buy = "
    <div class=\"col-md-4\">
      <div class=\"card mb-3\">
        <div class=\"card-body\">

          <h4 class=\"mb-3\">จำนวน รายการสินค้าทั้งหมด</h4>

            <ul class=\"list-group list-group-flush\">
              <li class=\"list-group-item d-flex justify-content-between align-items-center border-0 px-0 pb-0\">
                <i> รวมราคา สินค้า ทั้งหมด </i>
                <span>(".number_format($Total) .") บาท</span>
              </li>
              <li class=\"list-group-item d-flex justify-content-between align-items-center px-0 pb-0 border-0\">
                <i> จำนวนสินค้า ทั้งหมด </i>
                <span>($Qtys)ชิ้น</span>
              </li>
              <li class=\"list-group-item d-flex justify-content-between align-items-center px-0 pb-0 border-0\">
                <i>ค่าภาษี</i>
                <span>(0)บาท</span>
              </li>
              <li class=\"list-group-item d-flex justify-content-between align-items-center border-0 px-0 mb-3\">
                <div>
                  <strong>จำนวนเงินทั้งหมด</strong>
                  <strong>
                    <p class=\"mb-0\">(รวมภาษีมูลค่าเพิ่ม)</p>
                  </strong>
                </div>
                <span><strong>".number_format($Total) ." บาท</strong></span>
              </li>
            </ul>

          <a href=\"#myModalBuy\" data-toggle=\"modal\"  role=\"button\" class=\"btn btn-primary btn-block waves-effect waves-light\">ยืนยันจ่ายเงิน ทั้งหมด</a>

        </div>
      </div>
    </div>

    ";
    echo $buy;
}

function modalBuy($Cid,$Cimg,$Cname,$Cprice,$Qty){
  echo "
      <tr class=\"mb-0\">
        <td class=\"text-center\">
            <img class=\"img-thumbnail\" width=\"50\" height=\"50\" src=\"../data/$Cimg\" />
        </td>
        <td class=\"text-center\">$Cname</td>
        <td class=\"text-center\">$Cprice</td>
        <td class=\"text-center\">$Qty</td>
        <td class=\"text-center\">".number_format($Cprice * $Qty)."</td>
        <td class=\"text-centers\">
          <form action=\"shoppingCard.php?action=remove&camera_id=$Cid\" method=\"POST\">
            <button  type=\"submit\" class=\"btn btn-danger btn-sm mb-0\" name=\"remove\">
              <i class=\"fa fa-trash\"></i>
            </button>
          </form>
        </td>
      </tr>
  ";
}


/* function swalFunctionx() {
  echo  "<script type=\"text/javascript\">
          function swalFunction() {
            swal.fire({
               title: 'Success',
                content: \"<p>xnxx</p>\",
               width: '750px'
            })
          }
          </script>";
  } */

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
function chkImgslipt($img){
    if($img == 'null'){
      $fuck = "<a class=\"viewbtn button4\">จ่ายปลายทาง</a>";
    }else{
       $fuck = "<a rel=\"example_group\" title=\"สลิปการจ่ายเงินของผู้ซื่อ\" href=\"../images/$img\" class=\"viewbtn btnx\">โอนเงิน กดเพื่อดู</a>";
    }
    return $fuck;
}
function statusText($ts){
    if($ts == 'approve'){
        $s = "<b class='text-primary'>อนุมัติแล้ว</b>";
    }else{
        $s = "<b class='text-danger'>ยังไม่อนุมัติ</b>";
    }
    return $s;
}
  
 function OrderListx($name,$Qty, $PriceAll,$statusPay,$DateTime,$imgSlipt){
   $showList = "
   
      <div class=\"card-header\" role=\"tab\">
        <div class='row'>
          <div class=\"mr-auto\">
            <span class='font-weight-light text-danger'> $DateTime </span>
            <span class='font-weight-bold ml-4'> Qty : $Qty </span>
            <span class='font-weight-normal ml-4 text-info'> price : $PriceAll $ </span>
            
          </div>
          <div class='ml-4'>
              status :  ". statusText($statusPay) ."
          </div>
          <div class=\"ml-auto\">
            <div class='row'>
              
              <p class='mt-1'>$name :</p>
              <div class='mr-4'>
                  
                ". chkImgslipt($imgSlipt) ."
              </div>
            </div>
          </div>
        </div>
      </div>

   ";
   echo $showList;
 }
function OrderList($Cimg, $Cname, $Cprice, $Qty, $Amount){
  $showListX = "
            <tr class=\"mb-0\">
                <td class=\"text-center\">
                    <img class=\"img-thumbnail ml-4\" width=\"50\" height=\"50\" src=\"../data/$Cimg\" />
                </td>
                <td class=\"text-center \">ProductName : $Cname</td>
                <td class=\"text-center\">Price: $Cprice</td>
                <td class=\"text-center\">Qty : $Qty</td>
                <td class=\"text-center\">amounPrice : $Amount</td>

              </tr>
              <hr>
  ";
  echo $showListX;
}

function chkImgsliptZ($imgz){
    if($imgz == 'null'){
      $fuck = "<a class=\"btn btn-xs fs-10 btn-bold btn-secondary\">จ่ายปลายทาง</a>";
    }else{
     $fuck = "<a rel=\"example_group\"  title=\"สลิปการจ่ายเงินของผู้ซื่อ\" class=\"btn btn-xs fs-10 btn-bold btn-info \" href=\"../images/$imgz\">
                    view image slipt
            </a>";
    }
    return $fuck;
}

function statusTextz ($ts) {
   if($ts == 'approve'){
          $s = "อนุมัติแล้ว";
      }else{
          $s = "ยังไม่อนุมัติ";
      }
    return $s;
}


function ordersList($productName,$productImg,$Qty,$priceAll,$Date,$SliptImg,$statusPay,$Pnumber){
    

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
                <small class=\"fs-16 fw-300 text-info \"><i class=\"\">
                  </i>สถานะ : ".statusTextz($statusPay)." &nbsp;
                </small>
            </div>
            <div class=\"media-right text-right d-none d-md-block\">
                
                <p class=\"fs-14 text-fade mb-12\">
                  <span class=\"text-fade\">
                    <i class=\"\"></i>เลขพัสดุ : $Pnumber &nbsp;
                  </span>
                    <i class=\"fa fa-map-marker pr-1 text-danger\"></i> อยู่ระหว่างการส่ง
                </p>
                
                <span class=\"text-fade\">
                    <i class=\"fa fa-product-hunt text-warning pr-1\"></i>จำนวน : ($Qty)ชิ้น
                </span>
                <span class=\"text-fade\">
                    <i class=\"fa fa-money pr-1 text-success\"></i>ราคารวม : $priceAll ฿
                </span>
            </div>
        </div>
        <footer class=\"card-footer flexbox align-items-center\">
            <div>
                <strong>เวลาที่ซื่อ:</strong>
                <span>$Date</span>
            </div>
            <div class=\"card-hover-show\">
                ". chkImgsliptZ($SliptImg) ."
            </div>
        </footer>
      </div>
    ";
    echo $elementsOrders;
}
?>
