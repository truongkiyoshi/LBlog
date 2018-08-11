<!DOCTYPE HTML>
<!--
	Strata by HTML5 UP
	html5up.net | @ajlkn
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>@yield('title')</title>
		<meta charset="utf-8" />
		<?php 
			if(isset($data['content'])){
				$xuly = html_entity_decode(strip_tags($data['content']));
				if(strlen($xuly)<=150){
					echo "<meta name='description' content='".$xuly."'>";
				}else{
					
					$cutStr = substr($xuly,0,150);
					$word = substr($cutStr,0,strrpos($cutStr," "));
					echo"<meta name='description' content='".$word."'>";
				}

			}else{
			if(isset($setting['des']))
				echo "<meta name='description' content='".strip_tags(html_entity_decode($setting['des']))."'>";
		}
		 ?>
		
		<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
		<link rel="stylesheet" href="{{URL::asset('assets/css/main.css')}}" />
	</head>
	<body class="is-preload">

		<!-- Header -->
			<header id="header">
				<div class="inner">
					<a href="#" class="image avatar">
						<img src="{{URL::asset($setting['avatar'])}}" alt="" />
					</a>
					<h1><?php echo html_entity_decode($setting['des']) ?></h1>
				</div>
			</header>

		<!-- Main -->
			<div id="main">
				@yield('content')
				<section id="two">
						<h2>Liên hệ với tôi</h2>
						<p>Bạn có thể gửi tin nhắn cho tôi bằng cách nhập vào form bên dưới. Hoặc bạn cũng có thể liên hệ với tôi qua số điện thoại, email, địa chỉ phía dưới.</p>
						<div class="row">
							<div class="col-8 col-12-small">
								<form method="post" action="{{URL::asset('mess/send')}}">
									{{ csrf_field() }}
									<?php 
										if(session('flash_message'))
										 echo "<script type='text/javascript'>alert('".session('flash_message')."')</script>";
									 ?>
									<div class="row gtr-uniform gtr-50">
										<div class="col-6 col-12-xsmall"><input type="text" name="name" id="name" placeholder="Name"></div>
										<div class="col-6 col-12-xsmall"><input type="email" name="email" id="email" placeholder="Email"></div>
										<div class="col-12"><textarea name="message" id="message" placeholder="Message" rows="4"></textarea></div>
									</div>
									<ul class="actions">
									<li><input type="submit" value="Send Message"></li>
								</ul>
								</form>
								
							</div>
							<div class="col-4 col-12-small">
								<ul class="labeled-icons">
									<li>
										<h3 class="icon fa-home"><span class="label">Address</span></h3>
										{{$setting['address']}}
									</li>
									<li>
										<h3 class="icon fa-mobile"><span class="label">Phone</span></h3>
										{{$setting['phone']}}
									</li>
									<li>
										<h3 class="icon fa-envelope-o"><span class="label">Email</span></h3>
										<a href="mailto:{{$setting['email']}}">{{$setting['email']}}</a>
									</li>
								</ul>
							</div>
						</div>
					</section>
			</div>
			
		<!-- Footer -->
			<footer id="footer">
				<div class="inner">
					<ul class="icons">
						<li><a href="{{$setting['twitter']}}" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
						<li><a href="{{$setting['github']}}" class="icon fa-github"><span class="label">Github</span></a></li>
						<li><a href="{{$setting['facebook']}}" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
						<li><a href="mailto:{{$setting['envelope']}}" class="icon fa-envelope-o"><span class="label">Email</span></a></li>
					</ul>
					<ul class="copyright">
						<li>&copy; 2018</li><li>Design: <a href="https://facebook.com/truongvp97">AntKing</a></li>
					</ul>
				</div>
			</footer>

		<!-- Scripts -->
			<script src="{{URL::asset('assets/js/jquery.min.js')}}"></script>
			<script src="{{URL::asset('assets/js/jquery.poptrox.min.js')}}"></script>
			<script src="{{URL::asset('assets/js/browser.min.js')}}"></script>
			<script src="{{URL::asset('assets/js/breakpoints.min.js')}}"></script>
			<script src="{{URL::asset('assets/js/util.js')}}"></script>
			<script src="{{URL::asset('assets/js/main.js')}}"></script>

	</body>
</html>