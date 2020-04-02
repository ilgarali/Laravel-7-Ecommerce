<!-- Newsletter -->

<div class="newsletter">
<div class="container">
<div class="row">
<div class="col">
<div class="newsletter_border"></div>
</div>
</div>
<div class="row">
<div class="col-lg-8 offset-lg-2">
<div class="newsletter_content text-center">
	<div class="newsletter_title">Subscribe to our newsletter</div>
	<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
	<div class="newsletter_form_container">
		<form action="#" id="newsletter_form" class="newsletter_form">
			<input type="email" class="newsletter_input" required="required">
			<button class="newsletter_button trans_200"><span>Subscribe</span></button>
		</form>
	</div>
</div>
</div>
</div>
</div>
</div>

<!-- Footer -->

<div class="footer_overlay"></div>
<footer class="footer">
<div class="footer_background"  style="background-image:url({{asset('front/')}}/images/footer.jpg)"></div>
<div class="container">
<div class="row">
<div class="col">
<div class="d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
	<div class="footer_logo"><a href="#">Sublime.</a></div>
	<div class="copyright ml-auto mr-auto">
		<ul>

			@guest
			<li class="nav-item">
				<a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
			</li>
			@if (Route::has('register'))
				<li class="nav-item">
					<a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
				</li>
			@endif
		@else
			<li class="nav-item dropdown">
				<a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
					{{ Auth::user()->name }} <span class="caret"></span>
				</a>

				<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
					<a class="dropdown-item" href="{{ route('logout') }}"
						onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
						{{ __('Logout') }}
					</a>

					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
				</div>
			</li>
		@endguest

		</ul>
	</div>
	<div class="footer_social ml-lg-auto">
		<ul>
			<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
			<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
		</ul>
	</div>
</div>
</div>
</div>
</div>
</footer>
</div>


<script>
	let writeActive = document.querySelectorAll('.write-active');

	writeActive.forEach(element => {
		element.addEventListener('click',() => {
			element.classList.add('active');
		})
		
	});
</script>

<script src="{{asset('front/')}}/js/jquery-3.2.1.min.js"></script>
<script src="{{asset('front/')}}/styles/bootstrap4/popper.js"></script>
<script src="{{asset('front/')}}/styles/bootstrap4/bootstrap.min.js"></script>
<script src="{{asset('front/')}}/plugins/greensock/TweenMax.min.js"></script>
<script src="{{asset('front/')}}/plugins/greensock/TimelineMax.min.js"></script>
<script src="{{asset('front/')}}/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="{{asset('front/')}}/plugins/greensock/animation.gsap.min.js"></script>
<script src="{{asset('front/')}}/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="{{asset('front/')}}/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="{{asset('front/')}}/plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="{{asset('front/')}}/plugins/easing/easing.js"></script>
<script src="{{asset('front/')}}/plugins/parallax-js-master/parallax.min.js"></script>
<script src="{{asset('front/')}}/js/custom.js"></script>
@yield('product.js')
@yield('cart')
@yield('checkout.js')
@yield('contact.js')
</body>
</html>