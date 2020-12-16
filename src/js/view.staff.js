class ModalStaff extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        
        <div class="modal fade" id="modalContactForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header text-center">
                      <h4 class="modal-title w-100 font-weight-bold">Add Camera</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
<form action="chk_camera_add.php" method="POST" enctype="multipart/form-data">
                    <div class="modal-body mx-3">
                        <div class="md-form mb-5">
                            <div class="text-center">
                                <span class="input-group-btn">
                                    <span class="btn btn-success btn-file">
                                        Browse… <input type="file" name="image" id="imgInp">
                                    </span>
                                </span>
                                <input type="hidden" class="form-control" readonly>
                                <img id="img-upload" />
                            </div>
                        </div>
                        <div class="md-form mb-3 col-10">
                          <i class="fa fa-camera-retro prefix grey-text"></i>
                          <input type="text" name="camera_name" class="form-control validate" placeholder="camera name">
                        </div>
                        
                           <div class="md-form mb-3 col-6">
                             <i class="fa fa-usd prefix grey-text"></i>
                             <input type="text" name="c_price" class="form-control validate" placeholder="Price">
                           </div>
                           <div class="md-form col-12 ml-1 row">
                             <i class="fa fa-tint prefix grey-text"></i>
                             <input type="text" name="c_color" class="form-control col-4" placeholder="color">
                             <small class=\"text-danger mt-3\">*ควรเป็นภาษาอังกฤษเท่านั้น*</small>
                           </div>
                        
                         <div class="md-form mb-3 col-10">
                          <i class="fa fa-info-circle prefix grey-text"></i>
                           <textarea class="form-control" name="c_detail" id="validationTextarea" placeholder="Detail textarea" required></textarea>
                        </div>
                        <div class="md-form mb-3 col-10 text-center">
                            <button type="submit" class="btn btn-block btn-primary">
                                <i class="fa fa-floppy-o  grey-text" aria-hidden="true"></i> Save
                            </button>
                        </div>
                    </div>
</form>
                </div>
            </div>
        </div>
        
        `;
    }
}
customElements.define('staff-modal',ModalStaff);

$(document).ready( function() {
    	$(document).on('change', '.btn-file :file', function() {
		var input = $(this),
			label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
		input.trigger('fileselect', [label]);
		});

		$('.btn-file :file').on('fileselect', function(event, label) {
		    
		    var input = $(this).parents('.input-group').find(':text'),
		        log = label;
		    
		    if( input.length ) {
		        input.val(log);
		    } else {
		        
		    }
	    
		});
		function readURL(input) {
		    if (input.files && input.files[0]) {
		        var reader = new FileReader();
		        
		        reader.onload = function (e) {
		            $('#img-upload').attr('src', e.target.result);
		        }
		        
		        reader.readAsDataURL(input.files[0]);
		    }
		}

		$("#imgInp").change(function(){
		    readURL(this);
		}); 	
    });
    
function myEvent(){
    const Event = document.getElementById('myDiv');
    if(Event.style.display === "none"){
        Event.style.display = "block";
    }else{
        Event.style.display = "none";
    }
}