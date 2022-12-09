<html>

<head>

<title>Hearo|HOME</title>


<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="/images/Hearo.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>

@section('like_artist') 
<body>
  
    <!-- ======= Store Section ======= -->


        <div class="section-title" data-aos="fade-up">
          <h2>You Also Like</h2>
        </div>

        

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="400">


          <!-- First Element -->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src='\image\20220212191058.jpg' class="img-fluid" alt="" style="width:360px; height:300px; border-color: white; border:solid; border-width:10px;">
              <div class="portfolio-info">
                <h4 >Razaec</h4>
                <p>Future House</p>
                <div class="portfolio-links">
                  <a style="font-size:16px; color:white;" href="#" data-gallery="portfolioGallery" class="default-button" title="App 1">Tracks</a>
                  <a style="font-size:16px; color:white;" href="/artist-information/2"  class="default-button"  title="More Details">About</a>
                </div>
              </div>
            </div>
          </div> 

            <!-- Third Element -->
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src='\succesor\image\cover.jpg' class="img-fluid" alt="" style="width:360px; height:300px;">
              <div class="portfolio-info">
                <h4 >Astra Cartier</h4>
                <p>Future Bass</p>
                <div class="portfolio-links">
                  <a style="font-size:16px; color:white;" href="#" data-gallery="portfolioGallery" class="default-button" title="App 1">Tracks</a>
                  <a style="font-size:16px; color:white;" href="/artist-information/1"  class="default-button"  title="More Details">About</a>
                </div>
              </div>
            </div>
          </div>


            <!-- Third Element -->
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src='\image\20220119000159.jpg' class="img-fluid" alt="" style="width:360px; height:300px;">
              <div class="portfolio-info">
                <h4 >VIA</h4>
                <p>Dance</p>
                <div class="portfolio-links">
                  <a style="font-size:16px; color:white;" href="#" data-gallery="portfolioGallery" class="default-button" title="App 1">Tracks</a>
                  <a style="font-size:16px; color:white;" href="/artist-information/3"  class="default-button"  title="More Details">About</a>
                </div>
              </div>
            </div>
          </div>

          <!-- Endforelse -->
   
        </div>

      </div>
    </section><!-- End Portfolio Section -->
    </div>


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  
  <script>  // Get the button that opens the modal
var btn = document.querySelectorAll(".modal-button");

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






