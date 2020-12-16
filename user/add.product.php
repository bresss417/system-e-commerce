<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<link rel="stylesheet" href="../src/css/addProduct.css">


<!-- References: https://github.com/fancyapps/fancyBox -->
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<script src="//cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
<?php
include('addfunc.php');
session_start();
include('../components/connect.php');
if(!isset($_SESSION['user_data'])){
    echo "
            <script>
                alert('pless your login');
                window.location = '../index.php';
            </script>
        ";
}else{
	$sessionUser = $_SESSION['user_data']['name_last'];
	$sessionUserId = $_SESSION['user_data']['user_id'];
	$getId = $_GET['camera_id'];
    $sql = mysqli_query($conn,"SELECT * FROM camera WHERE camera_id = '$getId'");

?>

<form action="chk_add.product.php?getcameraID=<?php echo $getId ?>" method="POST"  enctype="multipart/form-data">
<br>
<div class="container contact">
	<div class="row">
		<div class="col-md-4 ">
		  <a href="javascript:history.back()" class="nav-link">
			<div class="row rounded">
			 	<i class="fa fa-hand-o-left" aria-hidden="true" style=""></i>
				<h3 class="ml-3 mt-2 text-dark">back</h3>
			</div>
		  </a>
<?php
$x = 0;

	while($x < $value = mysqli_fetch_assoc($sql)){
		$gQty =  $_GET['qty'];
		$num = 0;
		productBuy($value['camera_name'],$value['images'],$value['price'],$value['detail'],$gQty);

?>
				
<?php } ?>
		</div>
		<div class="col-md-8">
			<div class="container">
    		  <h2 class="display-5 text-center mb-2"> ขั้นตอนการสั่งซื้อ </h2> 
			    <ul id="progressbar" class="text-center">
			        <li class="" id="step1"><div class="d-none d-md-block">Name</div></li>
			        <li class="" id="step2"><div class="d-none d-md-block">Last</div></li>
			        <li class="" id="step3"><div class="d-none d-md-block">Phone</div></li>
			        <li class="" id="step4"><div class="d-none d-md-block">address</div></li>
			        <li class="" id="step5"><div class="d-none d-md-block">payment</div></li>
			        <li class="" id="step6"><div class="d-none d-md-block">Submit</div></li>
			    </ul>
			</div>
		  
			  <input type="hidden" name="User_Id" value="<?php echo $sessionUserId ?>">
			  <input type="hidden" name="Camera_Id" value="<?php echo $getId ?>">
			  	
			<div class="contact-form">
				<div class="form-group">
				  <label class="control-label col-sm-5" for="fname">First Name:(โปรดใช้ชื่อจริง)</label>
				    <div class="col-sm-11">          
				    	<input type="text" class="form-control" id="fname" placeholder="Enter First Name" name="fname" required />
				    </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-6" for="lname">Last Name:(โปรดใช้นามสกุลจริง)</label>
				  <div class="col-sm-11">          
					<input type="text" class="form-control" id="lname" placeholder="Enter Last Name" name="lname" required />
				  </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-6" for="email">Phone:(เบอรโทร)</label>
				  <div class="col-sm-11">
					<input type="text" class="form-control" id="phone" placeholder="Enter Phone" name="phone" required/>
				  </div>
				</div>

				<div class="form-group">
					<label class="control-label col-sm-6" for="email">address:(ที่อยู่)</label>
				  <div class="row">
                    <div class="ml-4 col-3 col-lg-2">
						  <input type="text" name="ads1" class=" form-control" required/>
						  <span class="floating-label ">บ้านเลขที่</span>
					</div>
					<div class=" col-2 col-lg-3">
						  <input type="text" class=" form-control" name="ads2" required/>
						  <span class="floating-label " >ซอย/ถนน</span>
					</div>
					<div class=" col-2 col-lg-2">
						  <input type="text" class=" form-control" name="ads3" required/>
						  <span class="floating-label " >หมู่บ้าน</span>
					</div>
					<div class=" col-2 col-lg-3">
						  <input type="text" class=" form-control" name="ads4" required/>
						  <span class="floating-label " >ตำบล</span>
					</div>
				  </div>
				  <div class="row mt-2">
					<div class="ml-4 col-2 col-lg-3">
						  <input type="text" class=" form-control" name="ads5" required/>
						  <span class="floating-label "> อำเภอ</span>
					</div>
					<div class=" col-2 col-lg-4">
						  <input type="text" class=" form-control" name="ads6" required/>
						  <span class="floating-label ">จังหวัด</span>
					</div>
					<div class=" col-2 col-lg-3">
						  <input type="text" class=" form-control" name="ads7" required/>
						  <span class="floating-label ">รหัสไปรษณีย์</span>
					</div>
				  </div>  
				</div>
				<div class="form-group"> 
				  <label class="control-label col-sm-6" for="email">Payment:(การจ่ายเงิน)</label> 
				  <div class="row d-flex justify-content-center">
				  	<div class="form-check mb-3 ml-4">
				  	    <input class="form-check-input" type="radio" id="radio1" name="r2" onchange="show(this.value)" checked="checked">
				  	    <label class="form-check-label" for="radio1"><i class="fa fa-exchange" aria-hidden="true"></i> โอนเงิน</label>
				  	</div>
				  	<div class="form-check mb-3 ml-4">
				  	    <input class="form-check-input" type="radio" id="radio2" name="r2" onchange="show2()">
				  	    <label class="form-check-label" for="radio2"><i class="fa fa-truck" aria-hidden="true"></i> จ่ายปลายทาง</label>
				  	</div>
				  </div>
					<div id="sh1" style="">
					 <div class="">
					   <div class="col-md-12 row">
						<p class="col-md-6 ml-auto">AccountNamber: 763-055-106-1</p> &nbsp;||&nbsp; <p class="col-md-5">branch: KrungThai</p>
					   </div> 
						<div class="col-md-12">
                                <main-image></main-image>
                        </div>
					 </div>
					</div>
					<div id="sh2" style="display:none;">
						<div class="">
							<p class="text-center">เก็บค่าปลายทาง 30 บาท</p>
						</div>
					</div>
				</div>
				<div class="form-group mt-2">        
				  <div class="col-sm-offset-2 col-sm-10">
					<button type="submit" class="btn btn-default bts">Submit</button>
				  </div>
				</div>
			</div>
		  
		</div>
	</div>	
</div>
</form>
<?php
}
?>

<script src="../src/js/realTime.js"></script>

