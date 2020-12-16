function doEvent1() {
    var n1 = num1.value;
    var n2 = num2.value;
    result1.value = n1 * n2;
} 


class ImageUpload extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `
        
            <div class="ml-2 col-sm-9">
              <div id="msg"></div>
                <div class="row">
                    <button type="button" class="browse col-2 btn btn-primary">Browse</button>&nbsp;
                    <input type="text"  class="form-control col-6" disabled placeholder="Upload File" id="file">
                    <input type="file" name="image" class="file" accept="image/*">
                    <div class="col-2">
                      <a data-toggle="modal" role="button" data-target="#modalImgs">
                        <img src="https://placehold.it/80x80" id="preview" class="img-thumbnail ">
                      </a>
                    </div>
                    
                </div>
            </div>
            
        `
    }
};
customElements.define('main-image',ImageUpload);


$(document).on("click", ".browse", function () {
    var file = $(this).parents().find(".file");
    file.trigger("click");
});
$('input[type="file"]').change(function (e) {
    var fileName = e.target.files[0].name;
    $("#file").val(fileName);

    var reader = new FileReader();
    reader.onload = function (e) {
        document.getElementById("preview").src = e.target.result;

        document.getElementById("previewtrue").src = e.target.result;
    };
    // read the image file as a data URL.
    reader.readAsDataURL(this.files[0]);
});

/* checkBook */
function show(str) {
    document.getElementById('sh2').style.display = 'none';
    document.getElementById('sh1').style.display = 'block';
}
function show2(sign) {
    document.getElementById('sh2').style.display = 'block';
    document.getElementById('sh1').style.display = 'none';
}

/* ADD NUMBER */
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




class UpImg extends HTMLElement{
  connectedCallback(){
    this.innerHTML = `
    <div class="form-group">
      <div class="custom-file">
        <input type="file" name="image" multiple class="custom-file-input form-control" id="customFile">
        <label class="custom-file-label" for="customFile">Choose file</label>
      </div>
    </div>
    `;
  }
}
customElements.define('main-upimg',UpImg);

$(document).ready(function () {
  $('input[type="file"]').on("change", function () {
    let filenames = [];
    let files = document.getElementById("customFile").files;
    if (files.length > 1) {
      filenames.push("Total Files (" + files.length + ")");
    } else {
      for (let i in files) {
        if (files.hasOwnProperty(i)) {
          filenames.push(files[i].name);
        }
      }
    }
    $(this).next(".custom-file-label").html(filenames.join(","));
  });
});
