class Navbar extends HTMLElement{
    connectedCallback(){
        this.innerHTML = `<nav class="navbar navbar-expand-md navbar-light bg-light fixed-top" id="mynavbar">
        <a href="index.php" class="navbar-brand logo">
            <i class="fa fa-camera-retro" aria-hidden="true"></i> Camera MP3
        </a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="index.php" class="nav-item nav-link active">
                    <i class="fa fa-home" aria-hidden="true"></i> Home
                </a>
                <a href="product.php" class="nav-item nav-link">
                    <i class="fa fa-product-hunt" aria-hidden="true"></i> Product
                </a> 
                <a href="#" class="nav-item nav-link disabled" tabindex="-1">
                    <i class="fa fa-history" aria-hidden="true"></i> orders
                </a>
            </div>
            <div class="navbar-nav ml-auto">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#sideModalTR">
                   <i class="fa fa-sign-in" aria-hidden="true"></i> Login
                </button>
            </div>
        </div>
    </nav>`;
    }
}
customElements.define('main-navbar',Navbar);


class Modal extends HTMLElement {
    connectedCallback() {
        this.innerHTML = `<div id="sideModalTR" class="modal fade mt-4" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-c-tabs">
                    <ul class="nav nav-tabs md-tabs tabs-2 light-info darken-3" role="tablist">
                      <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" href="#panel7" role="tab"><i class="fa fa-user mr-1"></i>
                          Login</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#panel8" role="tab"><i class="fa fa-user-plus mr-1"></i>
                          Register</a>
                      </li>
                    </ul>

                    <div class="tab-content">
                      <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <div class="modal-body mb-1">
<form action="chk_login.php" method="POST">
                          <div class="md-form form-sm mb-5">
                            <i class="fa fa-user-circle-o prefix"></i>
                            <input type="text" name="username" placeholder="username" class="form-control form-control-sm validate" required>
                           </div>
                          <div class="md-form form-sm mb-4">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" name="password" placeholder="password" class="form-control form-control-sm validate" required>
                          </div>
                          <div class="text-center mt-2">
                            <button type="submit" class="btn btn-block btn-info">Log in <i class="fa fa-sign-in ml-1"></i></button>
                          </div>
</form>
                        </div>
                        <div class="modal-footer">
                          <div class="options text-center text-md-right mt-1">
                            <p>Not a member? <a href="#" class="blue-text">Sign Up</a></p>
                            <p>Forgot <a href="#" class="blue-text">Password?</a></p>
                          </div>
                          <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>

                      <div class="tab-pane fade" id="panel8" role="tabpanel">
                        <div class="modal-body">
<form action="chk_signup.php" method="POST">
                          <div class="md-form form-sm mb-1 row ml-1">
                                <i class="fa fa-meh-o prefix"></i>
                                <input type="text" placeholder="name" name="name" class="form-control form-control-sm col-4 validate" required>
                                <input type="text" placeholder="last" name="last" class="form-control col-4 form-control-sm validate" required>
                          </div>
                          <div class="md-form form-sm mb-2">
                            <i class="fa fa-user prefix"></i>
                            <input type="text" placeholder="username" name="username" class="form-control col-10 form-control-sm validate" required>
                          </div>
                          <div class="md-form form-sm mb-2">
                            <i class="fa fa-lock prefix"></i>
                            <input type="password" placeholder="password" name="password" class="form-control col-10 form-control-sm validate" required>
                          </div>
                          
                          <div class="text-center form-sm mt-2">
                            <button type="submit" class="btn btn-info">Sign up <i class="fa fa-sign-in ml-1"></i></button>
                          </div>
</form>
                        </div>
                        <div class="modal-footer">
                          <div class="options text-right">
                            <p class="pt-1">Already have an account? <a href="#" class="blue-text">Log In</a></p>
                          </div>
                          <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </div>
    </div>`
    }
}

customElements.define('main-modal', Modal);

class Carousel extends HTMLElement{
  connectedCallback(){
    this.innerHTML = `
    
      <div class="bd-example mt-1">
        <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="3"></li>
          </ol>
          
          <div class="carousel-inner">
            <div class="carousel-item active">
              <img src="src/image/1.jpg" class="d-block w-100 " height="500" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="src/image/2.jpg" class="d-block w-100 " height="500" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="src/image/3.jpg" class="d-block w-100 " height="500" alt="...">
              <div class="carousel-caption d-none d-md-block">
              </div>
            </div>
            <div class="carousel-item">
              <img src="src/image/4.jpg" class="d-block w-100 " height="500" alt="...">
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
customElements.define("main-carousel", Carousel);