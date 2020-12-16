<?php

	function productBuy($Cname,$Cimg,$Cprice,$Cdetail, $rQty ){
		$fuck = "
			<div class=\"contact-info\">
				<h2 class=\"text-center display-5\"><strong>Product</strong></h2>
				<img src=\"../data/$Cimg\" alt=\"image\"/ class=\"img-thumbnail\">
				<h2 class=\"display-5 text-center mt-3\">$Cname</h2>

				<h4 class=\" ml-3\">ราคา : $Cprice ฿</h4>
				  <div class=\"row\">
				 	<div class=\"input-group col-md-9 number-spinner \">
						<h4 class=\"mt-1\">จำนวน :</h4>
                 	   <div class=\"input-group-prepend \">
                 	       <button class=\"btn  btn-warning\" data-dir=\"dwn\" type=\"button\"><i class=\"fa fa-minus\"></i></button>
						</div>
						<input type=\"text\" name=\"num1\" id=\"num1\" size=\"10\"  class=\"form-control text-center\" value=\"$rQty\">
						<div class=\"input-group-append \">
                 	       <button class=\"btn  btn-warning\" data-dir=\"up\" type=\"button\"><i class=\"fa fa-plus\"></i></button>
						</div>
				 	</div>
					<input type=\"hidden\" name=\"num2\" id=\"num2\" value=\"$Cprice\" onKeyUp='chk()'>
					<div class=\" input-group-append \">
						<button class=\"btn btn-info\"  value=\'num1 + num2\' onClick=\"doEvent1();\">
							<i class=\"fa fa-check\"></i> 
						</button>
					</div>
				  </div>
				  <div class=\"col-12 row rounded text-center\">
                 	<p class=\"text col-3 mt-4\">รวม:</p><input type=\"button\" name=\"result1\" class=\"btn btn-primary slide_left col-4 mt-2\" id=\"result1\" size=\"10\" value='$Cprice'>
                  </div>
				<div class=\"col-12 rounded text-center mt-2\">
					<textarea class=\"lead rounded form-control\">$Cdetail</textarea>
				</div>
			</div>
			<input type=\"hidden\" name=\"price\" value=\"$Cprice\" />
		";
		echo $fuck;
	};

?>



