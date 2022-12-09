
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="author" content="Codeconvey" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Custom HTML5 Audio Player Example</title>
    <meta name="author" content="Codeconvey" />
    <link rel='stylesheet' href='https://icono-49d6.kxcdn.com/icono.min.css'>
    <!-- Style CSS -->
    <link rel="stylesheet" href="/css/style.css">
    <!--Only for demo purpose - no need to add.-->
    <title>Plot Listing Page</title>
    <link href="//db.onlinewebfonts.com/c/61357b73f548c40ca84179811bc83520?family=Viper+Squadron+Italic" rel="stylesheet" type="text/css"/>
  
    <style>
body {
    min-width: 1280px; 
}

section {
    min-width: 1280px; 
}

</style>

  </head>
@section('musiclist')
<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center"  style="background-image:url('/images/WallpaperDog-10881763.jpg');">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <h1><a href="{{route('homepage')}}">
       </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
        <img src="/images/TentacitV1.1.png"  style="width:400px; height:100px; margin-top:-13px; margin-left: 40px;">
        <nav id="navbar" class="navbar" >
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#portfolio">Store</a></li>
          <li><a class="nav-link scrollto" href="#team">Team</a></li>
          <li><a class="nav-link scrollto" href="#pricing">Events</a></li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          <li><a class="getstarted scrollto" href="#about">Join</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->
  <!-- ***** Header Area End ***** -->  
<!--BANNER AREA!-->
  <div class="musiclibrary-banner">
  </div>

  <div class="musiclibrary-photo" >

  </div>

<div>
  <h4 class="header-artistname-feat"> Featured Artist</h4>
  
  </div>

  <h2 class="header-songname"> astra cartier </h2>
<h4 class="header-artistname"> our song (outro)</h4>

<div class="container" style="position: relative; margin-top:-240px;">
      <div class="row">
        <div class="col-lg-8">
        <div class="top-text header-text" style="position:relative; ">
            <h6></h6>
            <h2><!--Insert HEADER HERE--!</h2>
  </div>
!-->        
        </div>
      </div>
    </div>
  </div>
<!--END OF BANNER!-->
<!-- INSERT SONGS HERE -->
<section class="wrapper" >
    <div class="container-fostrap" >
        <div class="content" >    
            <div class="container" >
                <div class="row">
        
                    <div class="col-xs-12 col-sm-4">
                        <div class="card"  style="width: 20rem; ">
                            <a class="img-card" href="">
                            <img src="/succesor/image/Raez.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> Love Mee Too
                                  </a>
                                </h4>
                                <h5 class="card-title">
                                    <a href=""> Razaec
                                  </a>
                                </h5>
                                <p class="">
                                November 16, 2021 
                                </p>  
                                <h5 class="card-title">
                                    <a href=""> Orchestral
                                  </a>
                                </h5>
                    
                                <!-- Trigger/Play button-->
                                <img src="/succesor/play-button.png" style="width: 50px; height:50px;" 
                                 type="button"  class="modal-button" data-target="play-song" 
                                  href="#song2" type="button">
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>  
<!--MODAL!-->
<div id="song2" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
      <h2 class="songh2">"Album Name"</h2>
    </div>
      
    <div class="modal-body" style="background-image: url(/succesor/image/7bcc75bd4595cd470247bb872031e7d8-700.jpg);
    background-repeat:no-repeat;   background-size: cover;"  >
      <h2 class="song-titleh2" >Love Mee Too</h2>
      <h2 class="song-titleh2">Razaec</h2>

<img src="/succesor/image/Raez.jpg" style="width:300px; height:300px; margin-left:80px; border-radius:3px; border:solid;"  />

<!-- Audio player !-->
<audio src="/succesor/songs/STRINGSfinal.mp3 " controls 
style="margin: 0 auto; width: 550px; margin-left:400px; margin-top:30px; position:relative;
right:150px;"> </audio>  

<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <h3 class="songh2"> Orchestral</h3>
    </div>
  </div>

</div>



<!-- 2ND Song !-->

                    <div class="col-xs-12 col-sm-4">
                        <div class="card"  style="width: 20rem;  ">
                            <a class="img-card" href="">
                            <img src="/succesor/image/cover.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href="" > our song (outro)
                                  </a>
                                </h4>
                                <h5 class="card-title">
                                    <a href=""> astra cartier
                                  </a>
                                </h5>
                                <p class="">
                                November 16, 2021 
                                </p>  
                                <h5 class="card-title">
                                    <a href=""> Drumstep
                                  </a>
                                </h5>
                    
                                <!-- Trigger/Play button-->
                                <img src="/succesor/play-button.png" style="width: 50px; height:50px;" 
                                 type="button"  class="modal-button" data-target="play-song" 
                                  href="#myModal1" type="button">
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>  
<!--MODAL!-->
<div id="myModal1" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
      <h2 class="songh2">Home at Last (2021)</h2>
    </div>
      
    <div class="modal-body" style="background-image: url('/succesor/albumbg/164763-building-atmosphere-skyscraper-world-light-x750.jpg');
    background-repeat:no-repeat;   background-size: cover; " >
      <h2 class="song-titleh2">our song (outro)</h2>
      <h2 class="song-titleh2">astra cartier</h2>

<img src="/succesor/image/cover.jpg" style="width:300px; height:300px; margin-left:80px; border-radius:3px; border:solid;"  />

<!-- Audio player !-->
<audio src="/succesor/songs/5 astra cartier - our song (outro).mp3" controls 
style="margin: 0 auto; width: 550px; margin-left:400px; margin-top:30px; position:relative;
right:150px;"> </audio>  

<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <h3 class="songh2"> Orchestral</h3>
    </div>
  </div>
</div>

<!--3RD Song !-->
<div class="col-xs-12 col-sm-4">
                        <div class="card"  style="width: 20rem;  ">
                            <a class="img-card" href="">
                            <img src="/succesor/image/cover.jpg" />
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                    <a href=""> Hope
                                  </a>
                                </h4>
                                <h5 class="card-title">
                                    <a href=""> astra cartier
                                  </a>
                                </h5>
                                <p class="">
                                November 16, 2021 
                                </p>  
                                <h5 class="card-title">
                                    <a href=""> Kawaii
                                  </a>
                                </h5>
                            <!--    <a class="btn btn-small btn-primary" style=" left:20px;position:relative; width:170px;" href="#">Download</a> !-->

                              
                    
                                <!-- Trigger/Play button-->
                                <img src="succesor/play-button.png" style="width: 50px; height:50px;" 
                                 type="button"  class="modal-button" data-target="play-song" 
                                  href="#song3" type="button">
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                    Read More
                                </a>
                            </div>
                        </div>
                    </div>  
<!--MODAL!-->
<div id="song3" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
      <h2 class="songh2" >Home at Last (2021)</h2>
    </div>
      
    <div class="modal-body" style="background-image: url('/succesor/albumbg/riding-to-synthwave-beach-sy-2560x1440.jpg');
    background-repeat:no-repeat;   background-size: cover;" >
      <h2 class="song-titleh2">Hope</h2>
      <h2 class="song-titleh2">astra cartier</h2>

<img src="/succesor/image/cover.jpg" style="width:300px; height:300px; margin-left:80px; border-radius:3px; border:solid;"  />

<!-- Audio player !-->
<audio src="/succesor/songs/3 astra cartier - hope.mp3" controls 
style="margin: 0 auto; width: 550px; margin-left:400px; margin-top:30px; position:relative;
right:150px;"> </audio>  

<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <h2 class="songh2"> Kawaii</h3>
    </div>
  </div>

</div>



<!--END of Paramenter!-->
<!-- END OF PARAMETER -->


                </div>
            </div>
        </div>  
    </div>
</section>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="about">
            <div class="logo">
              <img src="/succesor/TentacitV1.1.png" alt="Tentacit" style="width: 250px; height:100px;">
            </div>
            <p><!--a little message here><--!--></p>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="helpful-links">
            <h4>Helpful Links</h4>
            <div class="row">
              <div class="col-lg-6 col-sm-6">
                <ul>
                  <li><a href="#">Categories</a></li>
                  <li><a href="#">Reviews</a></li>
                  <li><a href="#">Listing</a></li>
                  <li><a href="#">Contact Us</a></li>
                </ul>
              </div>
              <div class="col-lg-6">  
                <ul>
                  <li><a href="#">About Us</a></li>
                  <li><a href="#">Awards</a></li>
                  <li><a href="#">Useful Sites</a></li>
                  <li><a href="#">Privacy Policy</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="contact-us">
            <h4>Contact Us</h4>
            <p><!--Address Here!--></p>
            <div class="row">
              <div class="col-lg-6">
              <a href="#">Desk Fax#</a>
              </div>
              <div class="col-lg-6">
                <a href="#">Manager mobile #</a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-12">
          <div class="sub-footer">
            <p>Copyright © 2021 Tentacit Records., All Rights Reserved.
            <br>
          </div>
        </div>
      </div>
    </div>
  </footer>


<script  src="/js/player.js"></script>
<script>  // Get the button that opens the modal
var btn = document.querySelectorAll("img.modal-button");

// All page modals
var modals = document.querySelectorAll('.modal');

// Get the <span> element that closes the modal
var spans = document.getElementsByClassName("close");

// When the user clicks the button, open the modal
for (var i = 0; i < btn.length; i++) {
 btn[i].onclick = function(e) {
    e.preventDefault();
    modal = document.querySelector(e.target.getAttribute("href"));
    modal.style.display = "block";
 }
}

// When the user clicks on <span> (x), close the modal
for (var i = 0; i < spans.length; i++) {
 spans[i].onclick = function() {
    for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
    }
 }
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target.classList.contains('modal')) {
     for (var index in modals) {
      if (typeof modals[index].style !== 'undefined') modals[index].style.display = "none";    
     }
    }
}</script>

<script type="text/javascript">
 var urlmenu = document.getElementById( 'genres' );
 urlmenu.onchange = function() {  
      window.open( this.options[ this.selectedIndex ].value );
 };
</script>

</body>
@endsection
</html>