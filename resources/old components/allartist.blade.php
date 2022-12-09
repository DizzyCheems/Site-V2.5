
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link href="//db.onlinewebfonts.com/c/61357b73f548c40ca84179811bc83520?family=Viper+Squadron+Italic" rel="stylesheet" type="text/css"/>
    <title>Plot Listing Page</title>

    <style>
body {
    min-width: 1480px; 
}
</style>


  </head>
@section('tentacitmembers')
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

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="#" class="logo"> <img src="/TentacitV1.1.png" class="hover-logo " style="width: 250px; height:100px; margin-top:-23px; margin-left: -160px;">  
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.html" class="active">Home</a></li>
              <li><a href="category.html">Open Social</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact Us</a></li> 
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->  

  <div class="musiclibrary-banner">
  </div>
  
  <div class="artistlisting-photo" >

  </div>
<h2 class="header-songname">Cheemscake</h2>
<h4 class="header-artistname">
   Future House, Electro, Drumstep, Big Room</h4>

<div class="container" style="position: relative; margin-top:-240px;">
      <div class="row">
        <div class="col-lg-8">
        <div class="top-text header-text" style="position:relative; ">
            <h6></h6>
            <h2>Current Singles</h2>
  </div>
   

        
        </div>
      </div>
    </div>
  </div>

  <section class="wrapper-artistlisting" >
    <div class="container-fostrap" >
        <div class="content" >
            <div class="container" >
                <div class="row">
                
               @foreach($artists as $artists)
                <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                            <img src="/image/{{ $artists->image }}">
                          </a>
                            <div class="card-content-artist-list">
                                <h4 class="card-title-artist-list">
                                    {{$artists['artistname']}}
                                </h4>
                                <h5 class="card-title">
                                    <a href="#"> 
                                  </a>
                                </h5>
                                <p class="date-joined-title" style="text-align:center;"> Joined:
                                {{$artists['dateregistered']}}
                                </p>  
                                <p p class="artist-genre-title" > 
                                  {{$artists['genre']}} 
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                <!--    Read More !-->
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach

                
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
              <img src="/TentacitV1.1.png" alt="Tentacit" style="width: 250px; height:100px;">
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


</body>
@endsection
</html>