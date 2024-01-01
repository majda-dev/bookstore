<!DOCTYPE html>

<!--
 // WEBSITE: https://themefisher.com
 // TWITTER: https://twitter.com/themefisher
 // FACEBOOK: https://www.facebook.com/themefisher
 // GITHUB: https://github.com/themefisher/
-->

<html lang="en">
<head>

  <!-- Basic Page Needs
  ================================================== -->
  <meta charset="utf-8">
  <title>Petrichor</title>

  <!-- Mobile Specific Metas
  ================================================== -->
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description" content="Event and Conference Html5 Template">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">
  <meta name="author" content="Themefisher">
  <meta name="generator" content="Themefisher Eventre HTML Template v1.0">

  <!-- PLUGINS CSS STYLE -->
  <!-- Bootstrap -->
  <link href="{{ asset('assets/plugins3/bootstrap/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Font Awesome -->
  <link href="{{ asset('assets/plugins3/font-awsome/css/font-awesome.min.css') }}" rel="stylesheet">
  <!-- Magnific Popup -->
  <link href="{{ asset('assets/plugins3/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
  <!-- Slick Carousel -->
  <link href="{{ asset('assets/plugins3/slick/slick.css') }}" rel="stylesheet">
  <link href="{{ asset('assets/plugins3/slick/slick-theme.css') }}" rel="stylesheet">
  <!-- CUSTOM CSS -->
  <link href="{{ asset('assets/css3/style2.css') }}" rel="stylesheet">

  <!-- FAVICON -->
  <link href="{{ asset('assets/images3/books.png') }}" rel="shortcut icon">

</head>

<body class="body-wrapper">


<!--========================================
=            Navigation Section            =
=========================================-->
<nav class="navbar main-nav border-less fixed-top navbar-expand-lg p-0">
    <div class="container-fluid p-0">
      <!-- logo -->
      <a class="navbar-brand" href="">
        <span class="pet">Petrichor</span>
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item dropdown active">
            <a class="nav-link" href="{{ route('index') }}" >Home<span>/</span></a>
            <!-- Dropdown list -->
            {{-- <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('index') }}">Homepage</a></li>
              <li><a class="dropdown-item" href="homepage-two.html">Homepage 2</a></li>
            </ul> --}}
          </li>
          <li class="nav-item">
            <a class="nav-link" href="speakers.html">Best Sellers
              <span>/</span>
            </a>
          </li>
          @auth
          <li class="nav-item dropdown">
            <a class="nav-link" href="#!" data-toggle="dropdown">Mangement <i class="fa fa-angle-down"></i><span>/</span></a>
            <!-- Dropdown list -->
            <ul class="dropdown-menu">
              {{-- <li><a class="dropdown-item" href="{{ route('categories.add') }}">Add Category</a></li> --}}
              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Books</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('books.add') }}">Add Books</a></li>
                  <li><a class="dropdown-item" href="{{ route('books.index') }}">Books list</a></li>
                </ul>
              </li>

              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Categories</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('categories.add') }}">Add categories</a></li>
                  <li><a class="dropdown-item" href="{{ route('categories.list') }}">Categories' list</a></li>
                </ul>
              </li>

              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Writers</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('writers.add') }}">Add Writers</a></li>
                  <li><a class="dropdown-item" href="{{ route('writers.list') }}">writers list</a></li>
                </ul>
              </li>

              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Publishers</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('publishers.add') }}">Add Publishers</a></li>
                  <li><a class="dropdown-item" href="#">Publishers list</a></li>
                </ul>
              </li>

              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Book Seires</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('book_series.add') }}">Add Book Series</a></li>
                  <li><a class="dropdown-item" href="{{ route('book_series.list') }}">Book Series list</a></li>
                </ul>
              </li>

              <li class="dropdown dropdown-submenu dropright">
                <a class="dropdown-item dropdown-toggle" href="#!" id="dropdown0301" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Admin</a>
                <ul class="dropdown-menu" aria-labelledby="dropdown0301">
                  <li><a class="dropdown-item" href="{{ route('admins.add') }}">Add admins</a></li>
                  <li><a class="dropdown-item" href="{{ route('admins.list') }}">Admins' list</a></li>
                </ul>
              </li>
            </ul>
          </li>
          @endauth

          <li class="nav-item">
            <a class="nav-link" href="schedule.html">Schedule<span>/</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="sponsors.html">Sponsors<span>/</span></a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="contact.html">Contact<span>/</span></a>
          </li>

          @auth
            <li class="nav-item">
                <form action="{{ route("logout") }}" method="GET">
                    @csrf
                    <button type="submit" class="nav-link" style="border: none; background: none; cursor: pointer;">Logout</button>
                </form>
            </li>
         @else
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
         @endauth

         {{-- <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="far fa-cart-shopping" style="color: white"></i>
            </a>
        </li> --}}
        <li class="nav-item">
            <a class="nav-link" href="{{ route('cart') }}">
                <i class="fa fa-shopping-cart" style="color: white"></i>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">
                <i class="fa fa-solid fa-user" style="color: white"></i>
            </a>
        </li>
        </ul>
        {{-- <a href="contact.html" class="ticket">
          <img src="images/icon/ticket.png" alt="ticket">
          <span>Buy Ticket</span>
        </a> --}}
      </div>
    </div>
  </nav>

  @yield('content');





<section class="cta-subscribe bg-subscribe overlay-dark">
	<div class="container">
		<div class="row">
			<div class="col-md-6 mr-auto">
				<!-- Subscribe Content -->
				<div class="content">
					<h3>Subscribe to Our <span class="alternate">Newsletter</span></h3>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusm tempor</p>
				</div>
			</div>
			<div class="col-md-6 ml-auto align-self-center">
				<!-- Subscription form -->
				<form action="#" class="row">
					<div class="col-lg-8 col-md-12">
						<input type="email" class="form-control main white mb-lg-0" placeholder="Email">
					</div>
					<div class="col-lg-4 col-md-12">
						<div class="subscribe-button">
							<button class="btn btn-main-md">Subscribe</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</section>

<!--====  End of Call to Action Subscribe  ====-->

<!--================================
=            Google Map            =
=================================-->
<section class="map">
	<!-- Google Map -->
	<div id="map" data-latitude="40.712776" data-longitude="-74.005974" data-marker="images/icon/marker.png" data-marker-name="Eventre"></div>
	<div class="address-block">
		<h4>Docklands Convention</h4>
		<ul class="address-list p-0 m-0">
			<li><i class="fa fa-home"></i><span>Street Address, Location, <br>City, Country.</span></li>
			<li><i class="fa fa-phone"></i><span>[00] 000 000 000</span></li>
		</ul>
		<a href="#" class="btn btn-white-md">Get Direction</a>
	</div>
</section>
<!--====  End of Google Map  ====-->

<!--============================
=            Footer            =
=============================-->

<footer class="footer-main">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="block text-center">
          <div class="footer-logo">
            <img src="{{ asset('assets/images3/books1.png') }}" alt="logo" class="img-fluid">
          </div>
          <ul class="social-links-footer list-inline">
            <li class="list-inline-item">
              <a href="https://themefisher.com/"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="https://themefisher.com/"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="https://themefisher.com/"><i class="fa fa-instagram"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="https://themefisher.com/"><i class="fa fa-rss"></i></a>
            </li>
            <li class="list-inline-item">
              <a href="https://themefisher.com/"><i class="fa fa-vimeo"></i></a>
            </li>
          </ul>
        </div>

      </div>
    </div>
  </div>
</footer>
<!-- Subfooter -->
<footer class="subfooter">
  <div class="container">
    <div class="row">
      <div class="col-md-6 align-self-center">
        <div class="copyright-text">
          <p><a href="index.html">Petrichor</a> &copy; 2023, Designed &amp; Developed by <a href="#">Yousra Lahrichi</a></p>
        </div>
      </div>
      <div class="col-md-6">
        <a href="#" class="to-top"><i class="fa fa-angle-up"></i></a>
      </div>
    </div>
  </div>
</footer>



  <!-- JAVASCRIPTS -->
  <!-- jQuey -->
  <script src="{{ asset('assets/plugins3/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap 4 -->
  <script src="{{ asset('assets/plugins3/bootstrap/bootstrap.min.js') }}"></script>
  <!-- Shuffle -->
  <script src="{{ asset('assets/plugins3/shuffle/shuffle.min.js') }}"></script>
  <!-- Magnific Popup -->
  <script src="{{ asset('assets/plugins3/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
  <!-- Slick Carousel -->
  <script src="{{ asset('assets/plugins3/slick/slick.min.js') }}"></script>
  <!-- SyoTimer -->
  <script src="{{ asset('assets/plugins3/syotimer/jquery.syotimer.min.js') }}"></script>
  <!-- Google Mapl -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcABaamniA6OL5YvYSpB3pFMNrXwXnLwU"></script>
  <script src="plugins/google-map/gmap.js"></script>
  <!-- Custom Script -->
  <script src="{{ asset('assets/js3/script.js') }}"></script>
</body>

</html>

