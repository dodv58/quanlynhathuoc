<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="assets/img/favicon.ico">

    <title>Hệ thống quản lý nhà thuốc</title>

    <!-- Bootstrap core CSS -->
    <link href="{{ asset('landing/css/bootstrap.css') }}" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="{{ asset('landing/css/custom-animations.css') }}" rel="stylesheet">
    <link href="{{ asset('landing/css/style.css') }}" rel="stylesheet">


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="{{ asset('landing/js/ie10-viewport-bug-workaround.js') }}"></script>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

	<! -- ********** HEADER ********** -->
	<div id="h">
		<div class="container">
			<div class="row">
			@if (Auth::check())
				<li>
			    <meta http-equiv="refresh" content="0; url=/home" />
			    </li>
			@else
			    <li>
			    <button class="btn btn-lg btn-white btn-register link"><a href="{{ url('/register') }}">Đăng Ký</a></button>
			    <button class="btn btn-lg btn-white btn-register link"><a href="{{ url('/login') }}">Đăng Nhập</a></button>
			    </li>
			@endif
			    <div class="col-md-10 col-md-offset-1 mt">
			    	<h3>QUẢN LÝ NHÀ THUỐC CỦA BẠN</h3>
			    	<h1 class="mb">MỌI LÚC MỌI NƠI</h1>
			    </div>
			    <div class="col-md-12 mt hidden-xs">
			    	<img src="{{ asset('landing/img/graph.png') }}" class="img-responsive aligncenter" alt="" data-effect="slide-bottom">
			    </div>
			</div>
		</div><! --/container -->
	</div><! --/h -->
	
	<! -- ********** FIRST ********** -->
	<div id="w">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Handsome Analytics</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-info btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 pull-right">
				<img src="{{ asset('landing/img/shot01.png') }}" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div><! --/row -->
	</div><! --/container !-->
	

	<! -- ********** BLUE SECTION - PICTON ********** -->
	<div id="picton">
		<div class="row nopadding">
			<div class="col-md-6 pull-left">
				<img src="{{ asset('landing/img/shot02.png') }}" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Multiple Templates Options</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
	
		</div><! --row -->
	</div><! --/Picton -->
	
	
	<! -- ********** BLUE SECTION - CURIOUS ********** -->
	<div id="curious">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Important Tools Provided</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 pull-right">
				<img src="{{ asset('landing/img/shot03.png') }}" class="img-responsive alignright" alt="" data-effect="slide-right">
			</div>
		</div><! --/row -->
	</div><! --/curious -->

	<! -- ********** BLUE SECTION - MALIBU ********** -->
	<div id="malibu">
		<div class="row nopadding">
			<div class="col-md-6 pull-left">
				<img src="{{ asset('landing/img/shot04.png') }}" class="img-responsive alignleft" alt="" data-effect="slide-left">
			</div>
			<div class="col-md-5 mt">
				<h4>Try Us For Free</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
	
		</div><! --row -->
	</div><! --/Malibu -->


	<! -- ********** BLUE SECTION - JELLY ********** -->
	<div id="jelly">
		<div class="row nopadding">
			<div class="col-md-5 col-md-offset-1 mt">
				<h4>Don't Wait, Try Us Now</h4>
				<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry.</p>
				<p>Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.</p>
				<p>It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>
				<p class="mt"><button class="btn btn-white btn-theme">Sign Up Now | 14 Days Free</button></p>
			</div>
			
			<div class="col-md-6 mt centered">
				<h1 data-effect="slide-bottom">24</h1>
				<h3>$ per month</h3>
			</div>
		</div><! --/row -->
	</div><! --/Jelly -->

	<! -- ********** FOOTER ********** -->
	<div id="f">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-md-offset-2 centered">
					<h4 class="mb">Hãy để lại email cho chúng tôi để có thể hỗ trợ bạn tốt nhất</h4>
					<form role="form" action="register.php" method="post" enctype="plain"> 
	    				<input type="email" name="email" class="subscribe-input" placeholder="Nhập địa chỉ email của bạn..." required>
						<button class='btn btn-lg btn-info btn-sub subscribe-submit' type="submit">Đồng ý hỗ trợ</button>
					</form>
				
				</div>

			</div><! --/row -->
		</div><! --/container -->
	</div><! --/F -->

	<! -- ********** CREDITS ********** -->
	<div id="c">
		<div class="container">
			<div class="row">
				<div class="col-md-6 col-md-offset-3 centered">
					<p>Copyright 2017 | HT team</p>
				</div>
			</div>
		</div><! --/container -->
	</div><! --/C -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="{{ asset('landing/js/jquery.min.js') }}"></script>
    <script src="{{ asset('landing/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('landing/js/retina-1.1.0.js') }}"></script>
    <script src="{{ asset('landing/js/jquery.unveilEffects.js') }}"></script>
  </body>
</html>
