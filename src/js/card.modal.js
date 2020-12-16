$(document).on("click",'.modalC', function(e){
    var Cid = $(this).data('id');
    var Cname = $(this).data('name');
    var Cimg = $(this).data('img');
    var Cprice = $(this).data('price');
    var Cdetail = $(this).data('detail');
    $('#CameraIDs').val(Cid);
    $('#CameraName').html(Cname);
    $('#CameraImg').attr('src',`data/${Cimg}`);
    $('#CameraImgUser').attr('src', `../data/${Cimg}`);
    $('#CameraPrice').html(Cprice);
    $('#CameraDetail').html(Cdetail);
    $('#CameraID').html(Cid);
    e.preventDefault();
});

class myModal extends HTMLElement{
    connectedCallback() {
        this.innerHTML = `
        <div id="myModal" class="modal fade bd-example-modal-lg" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">view detail product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row col-12">
                        <div class="col-md-5">
                            <img id="CameraImg" class="text-center card-img-top bordered">
                        </div>
                        <div class="detail col-md-7">
                            <h3 class="product-title row">ProductName : <p id="CameraName"></p></h3>
                            <h5 class="price row">price : <p id="CameraPrice"></p> ฿</h5>
                            <p class="card-text row">Detail : <p id="CameraDetail"></p></p>
                                <div class="col-12 btn btn-secondary disabled">
                                    <b>Warning !</b> กรุณา login ก่อน
                                </div> 
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        `;
    }
}

customElements.define('card-modal',myModal);
/* $(document).ready(function () {
    $('.bts').on('click', function (e) {
        if ($('.alert').hasClass('current')) {
            $('.alert').removeClass('current');
        } else {
            $('.alert').addClass('current');
        }
        e.preventDefault();
    });
}); */


class myModalUser extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `
        <div id="myModalUser" class="modal fade bd-example-modal-lg" tabindex="-1">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center">view detail product</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                      <div class="row col-12">
                        <div class="col-md-5">
                            <img id="CameraImgUser" class="text-center card-img-top bordered">
                        </div>
                        <div class="detail col-md-7">
                            <h3 class="product-title row">ProductName : <p id="CameraName"></p></h3>
                            <h5 class="price row">price : <p id="CameraPrice"></p> ฿</h5>
                            <p class="card-text row">Detail : <p id="CameraDetail"></p></p>
                            <div class="row">
                                <input type="hidden" name="C_id" id="CameraIDs">
                                
                                <div class="input-group ml-auto col-md-7 number-spinner">
                                   <p class="card-text mt-3">Qty :</p>
                                    <div class="input-group-prepend ">
                                        <button class="btn btn-warning" data-dir="dwn" type="button"><i class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="text" id="txt" name="Qty" class="form-control text-center" value="1">
                                    <div class="input-group-append ">
                                        <button class="btn btn-warning" data-dir="up" type="button"><i class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                <button type="submit" class=" btn btn-warning ml-auto" name="ADD_carmera">
                                    <i class="fa fa-shopping-cart" aria-hidden="true"></i> add to card
                                </button>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        `;
        
    }
}

customElements.define('user-modal', myModalUser);

class FormCartShopping extends HTMLElement{
    connectedCallback() {
        this.innerHTML = `
        
        <div class='row bordered'>
            <div class=" col-lg-4">
                <label>Ferst Name</label>
                <input type="text" id="fname" name="fname" placeholder="Ferst Name">
            </div>
            <div class="col-lg-4">
                <label>Last Name</label>
                <input type="text" id="lname" name="lname" placeholder="Last Name">
            </div>
            <div class="col-lg-4">
                <label>Phone</label>
                <input type="text" id="phone" name="phone" placeholder="Phone">
            </div>
        </div>
		<div class="form-group mt-2">
			<label class="control-label col-sm-6" >address:(ที่อยู่)</label>
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
		  <div class="row ">
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
        
        `;
    }
}
customElements.define('main-shoppinform',FormCartShopping);

$(document).on('click', '.number-spinner button', function () {
    var btn = $(this),
        oldValue = btn.closest('.number-spinner').find('input').val().trim(),
        newVal = 0;

    if (btn.attr('data-dir') == 'up') {
        newVal = parseInt(oldValue) + 1;
    } else {
        if (oldValue > 1) {
            newVal = parseInt(oldValue) - 1;
        } else {
            newVal = 1;
        }
    }
    btn.closest('.number-spinner').find('input').val(newVal);
});


class Carousels extends HTMLElement {
  connectedCallback() {
    this.innerHTML = `
    
      <div class="bd-example">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          </ol>
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="../src/image/1.jpg" class="d-block w-100 " height="550" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="../src/image/2.jpg" class="d-block w-100 " height="550" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="../src/image/3.jpg" class="d-block w-100 " height="550" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="../src/image/4.jpg" class="d-block w-100 " height="550" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    
    `;
  }
}
customElements.define("main-carousels", Carousels);

$("#blogCarousel").carousel({
  interval: 3000,
});