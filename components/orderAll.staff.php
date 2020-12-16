<?php

function chkImgslipt($img){
    if($img == 'null'){
      $fuck = "<a class=\"viewbtn button4\">จ่ายปลายทาง</a>";
    }else{
       $fuck = "<a  href=\"../images/$img\" class=\"viewbtn btnx example22\">ViewSlipt</a>";
    }
    return $fuck;
}
function upStatus($statusPay){
    if($statusPay == 'approve'){
        $king = "<a class=\"viewbtn btnp\">อยู่ระหว่างจัดส่ง</a>";
    }else{
        $king = "<a class='viewbtn btna various4' href=\"#inline1\">อนุมัติ</a>";
    }
    return $king;
}
function statusText($ts){
    if($ts == 'approve'){
        $s = "อนุมัติแล้ว";
    }else{
        $s = "ยังไม่อนุมัติ";
    }
    return $s;
}

function OrderContactUser ($Id,$ferstName,$lastName,$Phone,$Address,$DateTime,$PriceAll,$Qtys,$SliptImg,$Status){
    $elemantBody = "
    
        <div class=\"comment-main-level\">

            <div class=\"comment-avatar\">
                <img src=\"../src/image/cxxc.jpg \" alt=\"\">
            </div>
        	
        	<div class=\"comment-box \">
                <div class=\"comment-head \">
                    <h6 class=\"comment-name col-4\">realName: $ferstName   $lastName</h6>
                    ". upStatus($Status) ."
                    ". chkImgslipt($SliptImg) ."
                    <span class=''>วันที่ซื้อ $DateTime</span>
                </div>
                <div class=\"comment-content col-12\">
                    <div class='row'>
                        <p class=\"spanx ml-4 col-4\">จำนวนสินค้าทั้งหมด( $Qtys ) ชิ้น</p>
                        <p class=\"spanx col-4\">ราคาสินค้าทั้งหมด( $PriceAll ) บาท</p>
                        <p class=\"spanx text-primary col-3\">สถานะ : ". statusText($Status) ."</p>
                        <p class='col-8'> $Address </p> <p class='col-4 ml-auto'>phone: $Phone</p>
                        
                    </div>
        		</div>
        	</div>
        </div>
    
    ";

    echo $elemantBody;
}
function detailOrder($Cname,$Cimg,$originalPrice,$Qty,$Subtotal){
    $elemantBodyTrue = "
    
    <div class=\"comment-avatar\">
        <img src=\"../data/$Cimg \" >
    </div>
        						
    <div class=\"comment-box ml-1\">
    	<div class=\"comment-head\">
            <h6 class=\"comment-name\">ProductName : $Cname </h6>
            <span class=\" text-info ml-4\">ราคา : $originalPrice ฿</span>
    		<i class=\"fa fa-reply\"></i>
    		<i class=\"fa fa-heart\"></i>
    	</div>
        <div class=\"comment-content\">
          <div class='row'>
            <p class='mr-3 col-md-6'>จำนวนสินค้า ( $Qty ) ชิ้น</p>
            <p class='col-md-5'>ราคารวมของสินค้า ( $Subtotal ) บาท</p>
          </div>
    	</div>
    </div>
    
    ";
    echo $elemantBodyTrue;
}

?>