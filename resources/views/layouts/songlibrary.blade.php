<html>

<head>
<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="/images/Hearo.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
@include ('genres.songs')
@section('site_songlibrary')
<body>
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center"  style="background-image:url('/images/WallpaperDog-10881763.jpg');">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
       <h1><a href="{{route('homepage')}}">
       </a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>
        <img class="logo-prop" src="/images/Hearo.png"  > 
        <nav id="navbar" class="navbar" style="margin-right:40px;" >
        <ul>
          <li class="home-char"><a class="nav-link scrollto active" href="{{route('homepage')}}">Home</a></li>
        <li >  <input class="input" type="text" placeholder="Search.."> </li>

          <fieldset class="genre-prop" >
                      <select name="genres" class="form-select" aria-label="Area" id="genres" onchange="this.form.click()">
                          <option selected>Genre</option>
                          <option value="New Village">Electro</option>
                          <option value="Old Town">Bass</option>
                          <option value= "orchestral">Orchestral </option>
                          <option value="Modern City">House</option>
                          <option value="lofi">Lo-Fi</option>
                          <option value="Modern City">Synthwave</option>
                          <option value="Modern City">Ambient</option>
                          <option value="Modern City">Dubstep</option>
                          <option value="drums&bass">Drums and Bass</option>
                          <option value="Modern City">Future House</option>
                          <option value="Modern City">Trance</option>
                          <option value="Modern City">Progressive</option>
                          <option value="kawaii">Kawaii</option>
                          <option value="Modern City">Electro Swing</option>
                          <option value="Modern City">Trap</option>
                          <option value="Future Bass">Future Bass</option>
                          <option value="Modern City">Complextro</option>
                          <option value="/Dance">Dance</option>
                          <option value="Modern City">Bounce</option>
                      </select>
            </fieldset>

            <fieldset class="mood-prop">
                      <select name="area" class="form-select" aria-label="Area" id="chooseCategory" onchange="this.form.click()">
                          <option selected>Mood</option>
                          <option value="New Village">Happy/Upbeat</option>
                          <option value="Old Town">Chill</option>
                          <option value="Modern City">Peaceful</option>
                          <option value="Modern City">Hard</option>
                          <option value="Modern City">Depressing</option>
                          <option value="Modern City">Anime</option>
                          <option value="Modern City">Classical</option>
                      </select>
            </fieldset>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

  <body>

<!--BANNER AREA!-->

 <section id="home-musiclist" class="d-flex align-items-center">
 <img class="featured-artist" src="/succesor/image/cover.jpg" style="  width: 350px; height:300px;
 margin-top:20px; margin-left:50px; border-color: white; border:solid; border-width:2px;">
    <div class="container">
        
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Favourites!</h1>
          <img class="leading-artist">
          <h2 data-aos="fade-up" data-aos-delay="400">Our Song - Astra Cartier</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="song-information/24" class="btn-get-started scrollto">Readmore</a>
            <a href="#song3" class="btn-get-started scrollto, modal-button "
            data-target="play-song"  type="button" >Listen</a>
          
          </div>
        </div>
        <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="fade-left" data-aos-delay="200">
       <!--   <img src="assets/img/hero-img.png" class="img-fluid animated" alt=""> -->
        </div>
      </div>
    </div>    
    <section id="contact" class="contact">
    <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-spotify"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
    </section>
  </section><!-- End Hero -->
<!--END OF BANNER!-->

  
      
  <!--=======MUSIC LIBRARY========-->
  <div class="musiclibrary-cover">
    <section id="portfolio" class="portfolio">
      <div class="container">

    <!-- INSERT SONGS HERE !-->
<!-- INSERT SONGS HERE -->
@yield('song-data')
<!--END of Paramenter!-->
<!-- END OF PARAMETER -->


                </div>
            </div>
        </div>  
    </div>
</section>

    <!--END OF SONGS SECTION!-->


      </div>
    </section><!-- End Portfolio Section -->
    </div>

  <!-- ======= END OF MUSIC LIBRARY ======= -->



  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>Hearo Records</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!-- All the links in the footer should remain intact. -->
            <!-- You can delete the links only if you purchased the pro version. -->
            <!-- Licensing information: https://bootstrapmade.com/license/ -->
            <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/vesperr-free-bootstrap-template/ -->
            Designed by <a href="https://bootstrapmade.com/"> Rouser (Former Tentacit) Media</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#about" class="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

</body>



<script>  // Get the button that opens the modal
var btn = document.querySelectorAll("a.modal-button, img.modal-button");

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

@endsection
</html>
