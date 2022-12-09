<html>

<head>

<title>Hearo|HOME</title>


<meta content="" name="description">
<meta content="" name="keywords">

<!-- Favicons -->
<link href="/images/Hearo.png" rel="icon">
<link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">
</head>
@include('temp.artistlike')
@section('site_artistinfo')
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
        <img src="/images/Hearo.png"  class="logo-prop">
        <nav id="navbar" class="navbar" >
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto " href="#store">Store</a></li>
          <li><a class="nav-link scrollto" href="{{route('artists')}}">Artists</a></li>
          <li><a class="nav-link scrollto" href="#events">Events</a></li>
          <li><a class="modal-button" type="button"  data-target="play-song" 
                                  href="#contact" type="button">Contact</a></li>
          <li><a class="getstarted scrollto" href="#contact">Join</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<div style="border:azure;">
<!--BANNER AREA!-->

<section id="artistlist-info" style=" background-image: url('/image/{{ $artist->image }}'); background-size:cover;"  class="d-flex align-items-center">
 <img class="featured-artist" src="/1st_bg/{{ $artist->background_img }}" style="  width: 350px; height:300px;
 margin-top:20px; margin-left:50px; border-color: white; border:solid; border-width:2px;">
    <div class="container">
        
      <div class="row">
        <div class="col-lg-6 pt-5 pt-lg-0 order-2 order-lg-1 d  -flex flex-column justify-content-center">
          <h1 data-aos="fade-up" > {{$artist['artistname']}}</h1>
          <img class="leading-artist">
          <h2 data-aos="fade-up" data-aos-delay="400">Artist Persona</h2>
          <div data-aos="fade-up" data-aos-delay="800">
            <a href="#" class="btn-get-started scrollto">Features</a>
            <a href="#" class="btn-get-started scrollto">Social</a>
          
           <!--   <div class="social-links">
                <a style="border-radius: 50%; border:solid;" href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
             </div>
                       -->
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
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-youtube"></i></a>
              </div>
            </div>
          </div>
    </section>

  </section><!-- End Hero -->
  
<!--END OF BANNER!-->


  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients clients" >
      <div class="container">

        <div class="row">

<!--          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-1.png" class="img-fluid" alt="" data-aos="zoom-in">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-2.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="100">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-3.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="200">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-4.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="300">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-5.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="400">
          </div>

          <div class="col-lg-2 col-md-4 col-6">
            <img src="assets/img/clients/client-6.png" class="img-fluid" alt="" data-aos="zoom-in" data-aos-delay="500">
          </div> -->

        </div>

      </div>
    </section><!-- End Clients Section -->




    <!-- ======= About Us Section ======= --
    <div class="about-cover">
    <section id="about" class="about">
      <div class="container" >

        <div class="section-title" data-aos="fade-up">
          <h2>About Us</h2>
        </div>

<div class="popular-categories">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
        
            <h2></h2>
            <h6></h6>
          </div>
        </div>
        
        <div class="col-lg-12">
          
          <div class="naccs">
            <div class="grid">  
              <div class="row">
                <div class="col-lg-3">
                  <div class="menu">
                    <div class="first-thumb active">
                    <div class="thumb"> 
                       <span class="icon"><img src="/succesor/work.png" alt=""></span>
                        Business
                      </div>
                    </div>
                    <div>
                      <div class="thumb" >                 
                        <span class="icon"><img src="/succesor/11-119451_social-network-social-network-icon-transparent-black-hd.png" alt=""></span>
                       Partner
                      </div>
                    </div>
                    <div>
                      <div class="thumb">                 
                        <span class="icon"><img src="/succesor/vinyl.png" alt=""></span>
                        Our Label
                      </div>
                    </div>
                    <div class="last-thumb">
                      <div class="thumb">                 
                        <span class="icon"><img src="/succesor/corporate.png" alt=""></span>
                        Policy
                      </div>
                    </div>
                  </div>
                </div> 


                <div class="col-lg-9 align-self-center">
                  <ul class="nacc">
                    <li class="active">
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>What we do?</h4>
                                <p>	Hearo is a record label and publisher focused on relieving willing artists the business side of music making 
    and giving the artist and their community the flexibility of creating, sharing and supporting their creative endeavors.
</p>
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i>Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="/images/Hearo.png" alt="">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Heyoo Weebs</h4>
                                <p>One of our major music distributors, a social network company headquartered in Japan
                                    has multiple updated anime shows users can download and stream for free!, Otakunity.Inc also Owns a anime broadcast station
                                    mainly streaming anime OST in particular genres.
                                </p>
                                <div class="main-white-button"><a href="#"><i class="fa fa-eye"></i>Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="/succesor/Otakunity.jpg" alt="Otakunity_Logo">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Mission/Vission<h4>
                                <p> 
Hearo Records envisions to be a company that gives hope and opportunity to all artist looking to monetize their artistic fervor and to form a friendly relationship among artist in all ages.
</p>
                                <div class="main-white-button" ><a href="{{route('mission/vission')}}"><i class="fa fa-eye"></i> Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="/images/Hearo.png" alt="cars in the city">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb">
                          <div class="row">
                            <div class="col-lg-5 align-self-center">
                              <div class="left-text">
                                <h4>Guidelines/Policy</h4>
                                <p>	Rouse Records established these guidelines so that creators outside of Rouse Records can be guided on how to share or
    create their derivative works. There is no need to contact us for permission if the derivative works and creations 
    comply with these guidelines but you are free to contact us anytime for more information.
</p>
                                <div class="main-white-button"><a href="{{route('policy')}}"><i class="fa fa-eye"></i> Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="/images/Hearo.png" alt="Shopping Girl">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div>
                        <div class="thumb" >
                          <div class="row" >
                            <div class="col-lg-5 align-self-center" >
                              <div class="left-text" >
                                <h4>Guidelines</h4>
                                <p>
	
</p>
                                <div class="main-white-button"><a rel="nofollow" href="#"><i class="fa fa-eye"></i> Read More</a></div>
                              </div>
                            </div>
                            <div class="col-lg-7 align-self-center">
                              <div class="right-image">
                                <img src="/images/Hearo.png" alt="Traveling Beach">
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>          
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

      </div>
    </section><!-- End About Us Section -->
    </div>

    <!-- ======= Counts Section ======= --
    
    <div class="count-cover">
    <section id="counts" class="counts">
      <div class="container">

        <div class="row">
          <div class="image col-xl-5 d-flex align-items-stretch justify-content-center justify-content-xl-start" data-aos="fade-right" data-aos-delay="150">
            <img src="images/Vinyl-Record-PNG-HD-Quality.png" alt="" class="img-fluid">
          </div>

          <div class="col-xl-7 d-flex align-items-stretch pt-4 pt-xl-0" data-aos="fade-left" data-aos-delay="300">
            <div class="content d-flex flex-column justify-content-center">
              <div class="row">
                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-emoji-smile"></i>
                    <span style="color: white;" data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Artists </strong> NULL</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span style="color: white;" data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Tracks</strong>  NULL</p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-clock"></i>
                    <span style="color: white;" data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Albums Monetized</strong> </p>
                  </div>
                </div>

                <div class="col-md-6 d-md-flex align-items-md-stretch">
                  <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span style="color: white;" data-purecounter-start="0" data-purecounter-end="0" data-purecounter-duration="1" class="purecounter"></span>
                    <p><strong>Commends and Recognitions</strong> </p>
                  </div>
                </div>
              </div>
            </div><!-- End .content-->
          </div>
        </div>
      </div>
    </section><!-- End Counts Section -->
    </div>
    <!-- ======= Services Section ======= --
    <div class="services-cover">
    <section id="services" class="services">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Services</h2>
          <p class="common-p">Here is how we can help you build your music career.</p>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
              <div class="icon"><i class="bx bxl-dribbble"></i></div>
              <h4 class="title"><a href="">Collaboration</a></h4>
              <p class="common-p">Work with cool EDM artist on our label.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="200">
              <div class="icon"><i class="bx bx-file"></i></div>
              <h4 class="title"><a href="">Manegerial Support</a></h4>
              <p class="common-p">Get your releases managed and dessiminated to the public</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="300">
              <div class="icon"><i class="bx bx-tachometer"></i></div>
              <h4 class="title"><a href="">Speed up your music brand Business</a></h4>
              <p class="common-p"> We had collected exemplary resources to and technology to systematized your music endeavors.</p>
            </div>
          </div>

          <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0">
            <div class="icon-box" data-aos="fade-up" data-aos-delay="400">
              <div class="icon"><i class="bx bx-world"></i></div>
              <h4 class="title"><a href="">Global Exposure</a></h4>
              <p class="common-p">We had partnered with the right companies to provide you sufficient demographics for growing your community.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->
    </div>  
    <!-- ======= More Services Section ======= --
    <div class="more-services-cover">
    <section id="more-services" class="more-services">
      <div class="container">

        <div class="row">
          
          <div class="col-md-6 d-flex align-items-stretch">
            <div class="card" style='background-image: url("/images/distri2.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">Music Distribution</a></h5>
                <p class="card-text">Get your works listed in well known streaming medias like Spotify, Youtube , Amazon and Soundcloud.</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>


          <div class="col-md-6 d-flex align-items-stretch mt-4" STYLE="POSITION:RELATIVE; BOTTOM:25PX;">
            <div class="card" style='background-image: url("/images/propublish.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">Rights Management</a></h5>
                <p class="card-text"> You make the songs while we do what we are known for monetizing your music to mainstream media.</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- End More Services Section -->


<!--
          <div class="col-md-6 d-flex align-items-stretch mt-4 mt-md-0">
            <div class="card" style='background-image: url("/images/piano.jpg");' data-aos="fade-up" data-aos-delay="200">
              <div class="card-body">
                <h5 class="card-title"><a href="">Mentoring</a></h5>
                <p class="card-text"> Get to know and learn magic from other professional producers .</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
-->
<!--
          <div class="col-md-6 d-flex align-items-stretch mt-4">
            <div class="card" style='background-image: url("/images/system.jpg");' data-aos="fade-up" data-aos-delay="100">
              <div class="card-body">
                <h5 class="card-title"><a href="">Touring/Hosting</a></h5>
                <p class="card-text">We had established a team capable of bringing your artist reputation known to the world.</p>
                <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
              </div>
            </div>
          </div>
-->

    <!-- ======= Features Section ======= --
    <div class="features-cover"
    <section id="features" class="features">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Features</h2>
          <p class="common-p">Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-3 col-md-4"> 
            <div class="icon-box">
              <i class="ri-store-line" style="color: #ffbb2c;"></i>
              <h3 ><a class="Feature-a" href="">Lorem Ipsum</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
              <h3><a class="Feature-a" href="">Dolor Sitema</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-md-0">
            <div class="icon-box">
              <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
              <h3><a class="Feature-a" href="">Sed perspiciatis</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4 mt-lg-0">
            <div class="icon-box">
              <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
              <h3><a class="Feature-a" href="">Magni Dolores</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-database-2-line" style="color: #47aeff;"></i>
              <h3><a class="Feature-a" href="">Nemo Enim</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
              <h3><a class="Feature-a" href="">Eiusmod Tempor</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
              <h3><a class="Feature-a" href="">Midela Teren</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
              <h3><a class="Feature-a" href="">Pira Neve</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-anchor-line" style="color: #b2904f;"></i>
              <h3><a class="Feature-a" href="">Dirada Pack</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-disc-line" style="color: #b20969;"></i>
              <h3><a class="Feature-a" href="">Moton Ideal</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-base-station-line" style="color: #ff5828;"></i>
              <h3><a class="Feature-a" href="">Verdo Park</a></h3>
            </div>
          </div>
          <div class="col-lg-3 col-md-4 mt-4">
            <div class="icon-box">
              <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
              <h3><a class="Feature-a" href="">Flavor Nivelanda</a></h3>
            </div>
          </div>
        </div>

      </div>
    </section> End Features Section -->
    </div>
    <!-- ======= Testimonials Section ======= --
    <div class="testimonial-cover">
    <section id="testimonials" class="testimonials section-bg"  style="background-image:url('/images/slide_37.jpg');
    background-repeat:no-repeat; background-size:1360px 800px;" >
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Testimonials</h2>
          <p class="common-p">Magnam dolores commodi suscipit eum quidem consectetur velit</p>
        </div>

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div>-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><!- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><-- End testimonial item --

            <div class="swiper-slide">
              <div class="testimonial-wrap">
                <div class="testimonial-item">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            </div><-- End testimonial item --

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><-- End Testimonials Section -->
    </div>


    <!-- ======= Song Information Details ======= -->
    <section id="portfolio-details" style="background-color:black;" class="portfolio-details" >
      <div class="container">

        <div class="row gy-4">

          <div class="col-lg-8">
            <div class="portfolio-details-slider swiper">
              <div class="swiper-wrapper align-items-center">

                <div class="swiper-slide" >
                  <img src=" /image/{{ $artist->image }} " style="height: 500px; width:600px;" alt="">
                </div>

                <div class="swiper-slide"> 
                  <img src=" /1st_bg/{{ $artist->background_img }}" style="height: 500px; width:600px;" alt="">
                </div>

                <div class="swiper-slide">
                  <img src="/2nd_bg/{{ $artist->secondbackground_img }}" style="height: 500px; width:600px;" alt="">
                </div>

              </div>
              <div class="swiper-pagination"></div>
            </div>
          </div>

          <div class="col-lg-4">
            <div class="portfolio-info">
              <h3 class="song-data-h3">Artist information</h3>
              <ul>
                <li><strong>Name</strong>: --------------- </li>
                <li><strong>Tracks</strong>: ---------------</li>
                <li><strong>Album</strong>:---------------</li>
                <li><strong>Nationality  </strong>:---------------</li>
                <li><strong>Genre</strong>:---------------</li>
                <li><strong>Mood </strong>:--------------- </li>
                <li><strong>Theme</strong>:---------------</li>
             
              </ul>
            </div>
            <div class="portfolio-description">
              <h2 class="song-data-h2">About</h2>
              
              <p>
                __________________________
              </p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Song Information Details Section -->

  </main><!-- End #main -->



  <main id="main">




    <!-- ======= Store Section ======= -->
    <div class="artist-info-cover"  >
    <section id="portfolio" class="portfolio" style="background-color:black;">
      <div class="container">

        <div class="section-title" data-aos="fade-up" >
          <h2>{{$artist ['artistname']}} releases</h2>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="200" style="background-color:black;">
          <div class="col-lg-12 d-flex justify-content-center">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">Famous</li>
              <li data-filter=".filter-card">Latest</li>
              <li data-filter=".filter-web">Old</li>
            </ul>
          </div>
        </div>

        <div class="row portfolio-container"    data-aos="fade-up" data-aos-delay="400"  >

        @forelse($artist->Song as $songs)
          <div class="col-lg-4 col-md-6 portfolio-item filter-app"  >
            <div class="portfolio-wrap">
              <img src="/image/{{ $songs->image }}" class="img-fluid" alt="" style="width:360px; height:300px;">
              <div class="portfolio-info">
                <h4 >{{$songs ['songname']}}</h4>
                <p>{{$songs ['genre']}}</p>
                <div class="portfolio-links">
                 <i class="play-button"> <a style="font-size:16px; color:white;" data-gallery="portfolioGallery" type="button" href="#song{{$songs->id}}"  data-target="play-song"  class="default-button " title="App 1">Play</a> </i>
                  <a style="font-size:16px; color:white;" href="{{route('song_info', $songs['id'])}}"  class="default-button"  title="More Details">Readmore</a>
                </div>
              </div>
            </div>
          </div>

<!--MODAL!-->
<div id="song{{$songs->id}}" class="modal">
  <!-- Modal content -->
  <div class="modal-content">   
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
      <h2 class="songh2">"{{$songs ['album']}}"</h2>
    </div>
      
    <div class="modal-body" style="background-image: url('/1st_bg/{{$songs ->background_image}}');
    background-repeat:no-repeat;   background-size: cover;"  >
      <h2 class="song-titleh2" >{{$songs ['songname']}}</h2>
      <h2 class="song-titleh2">{{$songs ['author']}}</h2>

<img src="/image/{{$songs ->image}}" style="width:300px; height:300px; margin-left:80px; border-radius:3px; border:solid;"  >

<!-- Audio player !-->
<div class="container-audio">
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
        <div class="colum1">
            <div class="row"></div>
        </div>
    </div>

<div class="container-audio">
        <audio controls >
                   <source src="/songs/{{$songs->audio}} " type="audio/ogg">
                   Your browser dose not Support the audio Tag
               </audio>
    </div>
    

<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <h3 class="songh2"> {{$songs ['genre']}}</h3>
    </div>
  </div>
</div>

                               
          @empty
                <p style="font-size: 16; font-weight:bold; color:white;">
                    Looks like there are no songs ATM :< 
                </p>
          @endforelse

        </div>

      </div>
    </section><!-- End Portfolio Section -->
    </div>


    <div class="artist-info-cover">
    <section id="portfolio" class="portfolio">
      <div class="container">

    @yield('like_artist')
    
    </div>
    </section><!-- End Portfolio Section -->
    </div>
    <!-- ======= Team Section ======= --
    <div class="team-cover">
    <section id="team" class="team section-bg" style="background-image:url('/images/slide_37.jpg');
    background-repeat:no-repeat; background-size:1360px 800px;" >
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Team</h2>
          <p class="common-p">Necessitatibus eius consequatur ex aliquid fuga eum quidem</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="100">
              <div class="member-img">
                <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="200">
              <div class="member-img">
                <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Sarah Jhonson</h4>
                <span>Product Manager</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="300">
              <div class="member-img">
                <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>William Anderson</h4>
                <span>CTO</span>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
            <div class="member" data-aos="fade-up" data-aos-delay="400">
              <div class="member-img">
                <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                <div class="social">
                  <a href=""><i class="bi bi-twitter"></i></a>
                  <a href=""><i class="bi bi-facebook"></i></a>
                  <a href=""><i class="bi bi-instagram"></i></a>
                  <a href=""><i class="bi bi-linkedin"></i></a>
                </div>
              </div>
              <div class="member-info">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
              </div>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Team Section -->
    </div>
    <!-- ======= Pricing Section ======= --
    <div class="events-cover">
    <section id="pricing" class="pricing">
      <div class="container">

        <div class="section-title">
          <h2>Events</h2>
          <p class="common-p"> Here's what's cookin recently, come party with us!</p>
        </div>

        <div class="row">
         <!-- INSERT EVENTS HERE !--

                <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                            <img src="/succesor/Tentacit Shape transparent-0.png">
                          </a>
                            <div class="card-content-artist-list">
                                <h4 class="card-title-artist-list">
                                   NULL
                                </h4>
                                <h5 class="card-title">
                                    <a href="#"> 

                                  </a>
                                </h5>
                                <p class="date-joined-title" style="text-align:center;"> Date:
                                NULL
                                </p>  
                                
                                <p p class="artist-genre-title" > 
                                  NULL
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                <!--    Read More !--
                                </a>
                            </div>
                        </div>
                    </div>
                    

               

                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                            <img src="/succesor/Tentacit Shape transparent-0.png">
                          </a>
                            <div class="card-content-artist-list">
                                <h4 class="card-title-artist-list">
                                   NULL
                                </h4>
                                <h5 class="card-title">
                                    <a href="#"> 

                                  </a>
                                </h5>
                                <p class="date-joined-title" style="text-align:center;"> Date:
                                NULL
                                </p>  
                                
                                <p p class="artist-genre-title" > 
                                  NULL
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                <!--    Read More !--
                                </a>
                            </div>
                        </div>
                    </div>
                    

               

                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <a class="img-card" href="#">
                            <img src="/succesor/Tentacit Shape transparent-0.png">
                          </a>
                            <div class="card-content-artist-list">
                                <h4 class="card-title-artist-list">
                                   NULL
                                </h4>
                                <h5 class="card-title">
                                    <a href="#"> 

                                  </a>
                                </h5>
                                <p class="date-joined-title" style="text-align:center;"> Date:
                                NULL
                                </p>  
                                
                                <p p class="artist-genre-title" > 
                                  NULL
                                </p>
                            </div>
                            <div class="card-read-more">
                                <a href="#" class="btn btn-link btn-block">
                                <!--    Read More !-->
                                </a>
                            </div>
                        </div>
                    </div>
                    

               

         <!--END OF EVENTS SECTION!-->
        </div>

      </div>
    </section><!-- End Pricing Section -->
    </div>
    <!-- ======= F.A.Q Section ======= --
    <div class="faq-cover">
    <section id="faq" class="faq">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Frequently Asked Questions</h2>
        </div>

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>NULL?</h4>
          </div>
          <div class="col-lg-7">
            <p>
                NULL
            </p>
          </div>
        </div><!-- End F.A.Q Item--

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="200">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>NULLS?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              NULL
            </p>
          </div>
        </div><!-- End F.A.Q Item--

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="300">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>NULL</h4>
          </div>
          <div class="col-lg-7">
            <p>
               NULL
            </p>
          </div>
        </div><!-- End F.A.Q Item--

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="400">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>NULL?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              NULL
            </p>
          </div>
        </div><!-- End F.A.Q Item--

        <div class="row faq-item d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="500">
          <div class="col-lg-5">
            <i class="ri-question-line"></i>
            <h4>NULL?</h4>
          </div>
          <div class="col-lg-7">
            <p>
              NULL
            </p>
          </div>
        </div><!-- End F.A.Q Item--

      </div>
    </section><!-- End F.A.Q Section -->
    </div>

    <!-- ======= Contact Section ======= --
    <div class="contact-cover">
    <section id="contact" class="contact">
      <div class="container">

        <div class="section-title" data-aos="fade-up">
          <h2>Contact Us</h2>
        </div>
<!--
        <div class="row">

          <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
            <div class="contact-about">
              <h3>Rouser</h3>
              <p> Need some executive class help? we are very glad to answer your question.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
              </div>
            </div>
          </div>
--
          <div class="col-lg-3 col-md-6 mt-4 mt-md-0" data-aos="fade-up" data-aos-delay="200">
            <div class="info">
         
              <div>
                <i class="ri-mail-send-line"></i>
                <p class="common-p">Domain@Domain.com</p>
              </div>

         
            </div>
          </div>

          <div class="col-lg-5 col-md-12" data-aos="fade-up" data-aos-delay="300">
            <form action="forms/contact.php" method="post" role="form" class="php-email-form">
              <div class="form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group">
                <input type="email" class="form-control" name="mail" id="email" placeholder="Your Email" required>
              </div>
              <div class="form-group">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
              </div>
              <div class="form-group">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
              </div>
              <div class="my-3">
                <div class="loading">Loading</div>
                <div class="error-message"></div>
                <div class="sent-message">Your message has been sent. Thank you!</div>
              </div>
              <div class="text-center"><button type="submit">Send Message</button></div>
            </form>
          </div>

        </div>

      </div>
    </section><!-- End Contact Section -->
    </div>
  </main><!-- End #main -->

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
            Designed by <a href="#"> Hearo Inc.</a>
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

  
  <script>  // Get the button that opens the modal
var btn = document.querySelectorAll("i");

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





<!---CONTACT FORM MODAL!--->
<!--MODAL!-->
<div id="contact" class="modal">
  <!-- Modal content -->
  <div class="modal-content">
    <div class="modal-header" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
      <span class="close">&times;</span>
     
    </div>
    <section class="ftco-section img bg-hero" style="background-image: url(/images/wp6854481-neon-minimalist-hd-wallpapers.png);">      
    <div class="modal-body" style="background-image: url('#');
    background-repeat:no-repeat;   background-size: cover;" >
  
<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Submit Your Queries Here</h2>
				</div>
			</div>
			<div class="row justify-content-center">
				<div class="col-lg-11">
					<div class="wrapper">
						<div class="row no-gutters justify-content-between">
							<div class="col-lg-6 d-flex align-items-stretch">
								<div class="info-wrap w-100 p-5">
									<h3 class="mb-4">Contact us</h3>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-envelope-open"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p class="common-p"><span  style="color:white;">Email:</span> Hearo@Mussio.com</p>
					          </div>
				          </div>
				        	<div class="dbox w-100 d-flex align-items-start">
				        		<div class="icon d-flex align-items-center justify-content-center">
				        			<span class="fa fa-globe"></span>
				        		</div>
				        		<div class="text pl-4">
					            <p class="common-p"><span  style="color:white;">Website</span> Hearo.com</p>
					          </div>
				          </div>
			          </div>
							</div>
							<div class="col-lg-5">
								<div class="contact-wrap w-100 p-md-5 p-4">
									<h3 class="mb-4">Get in touch</h3>
									<div id="form-message-warning" class="mb-4"></div> 
				      		<div id="form-message-success" class="mb-4">
				            Your message was sent, thank you!
				      		</div>
									<form method="POST" id="contactForm" action="{{route('concern')}}" name="contactForm">
                    @csrf
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="name" id="name" placeholder="Name">
												</div>
											</div>
											<div class="col-md-12"> 
												<div class="form-group">
													<input type="email" class="form-control" name="mail" id="mail" placeholder="Email">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<input type="text" class="form-control" name="subject" id="subject" placeholder="Subject">
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
													<textarea name="message" class="form-control" id="message" cols="30" rows="5" placeholder="Message"></textarea>
												</div>
											</div>
											<div class="col-md-12">
												<div class="form-group">
                        <input type="submit" value="Send Message" class="contact-button">
													<div class="submitting"></div>
												</div>
											</div>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>



<!-- partial -->
        
  <script  src="js/player.js"></script>
           
    		</div>
		
<!-- Analytics -->
<!-- End of Audio Control Parameter -->
    <div class="modal-footer" style="background-image: url('/succesor/ios13DarkPreview-768x432.png');
    background-repeat:no-repeat;   background-size: cover;"> 
    </div>
  </div>

</div>



<!--END of Paramenter!-->




