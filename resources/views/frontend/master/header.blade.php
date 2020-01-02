<div class="colorlib-loader"></div>
	<div id="page">
		<nav class="colorlib-nav" role="navigation">
			<div class="top-menu">
				<div class="container">
					<div class="row">
						<div class="col-xs-2">
							<div id="colorlib-logo"><a href="{{ asset('') }}">Fashion</a></div>
						</div>
						<div class="col-xs-10 text-right menu-1">
							<ul>
								<li class="active"><a href="{{ asset('') }}">Trang chủ</a></li>
								<li class="has-dropdown">
									<a href="{{ asset('') }}product">Cửa hàng</a>
									<ul class="dropdown">
										<li><a href="{{ asset('') }}cart">Giỏ hàng</a></li>
										<li><a href="{{ asset('') }}checkout">Thanh toán</a></li>

									</ul>
								</li>
								<li><a href="{{ asset('') }}about">Giới thiệu</a></li>
								<li><a href="{{ asset('') }}contact">Liên hệ</a></li>
								<li><a href="{{ asset('') }}cart"><i class="icon-shopping-cart"></i> Giỏ hàng [{{ Cart::content()->count()}}]</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</nav>
