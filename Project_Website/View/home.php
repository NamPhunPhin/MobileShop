<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./General/img/Oppo_thumb.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Oppo<br>Collection</h3>
						<a href="index.php?action=store&&mahang=OP" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./General/img/Samsung_thumb.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Samsung<br>Collection</h3>
						<a href="index.php?action=store&&mahang=SS" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->

			<!-- shop -->
			<div class="col-md-4 col-xs-6">
				<div class="shop">
					<div class="shop-img">
						<img src="./General/img/Apple_thumb.jpg" alt="">
					</div>
					<div class="shop-body">
						<h3>Apple<br>Collection</h3>
						<a href="index.php?action=store&&mahang=AP" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
					</div>
				</div>
			</div>
			<!-- /shop -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Sale Products</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab1">Smartphones</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab1" class="tab-pane active">
							<div class="products-slick" data-nav="#slick-nav-1">
								<!-- product -->
								<?php
								$sp = new sanpham();
								$result = $sp->getsanpham();
								while ($set = $result->fetch()) :
									$brand = $sp->gethangsanpham($set['ma_sp']);
									if ($set['giam_gia'] > 0) {

								?>
										<div class="product">
											<div class="product-img">
												<img src="./General/img/<?php echo $set['img_sp'] ?>" alt="">
												<div class="product-label">
													<span class="sale">SALE</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $brand['ten_hang'] ?></p>
												<h3 class="product-name"><a href="#"><?php echo $set['ten_sp'] ?></a></h3>
												<h4 class="product-price"><?php echo number_format($set['gia_sp'] - $set['giam_gia']) ?>đ <del class="product-old-price"><?php echo number_format($set['gia_sp']) ?>đ</del>
												</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a>
											</div>
										</div>
									<?php } else { ?>
										<div class="product">
											<div class="product-img">
												<img src="./General/img/<?php echo $set['img_sp'] ?>" alt="">
												<div class="product-label">
													<span class="new">NEW</span>
												</div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $brand['ten_hang'] ?></p>
												<h3 class="product-name"><a href="#"><?php echo $set['ten_sp'] ?></a></h3>
												<h4 class="product-price"><?php echo number_format($set['gia_sp']) ?>đ</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a>
											</div>
										</div>
								<?php }
								endwhile ?>
								<!-- /product -->
							</div>
							<div id="slick-nav-1" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- HOT DEAL SECTION -->
<div id="hot-deal" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<div class="hot-deal">
					<h2 class="text-uppercase">hot deal this week</h2>
					<p>New Collection Up to 50% OFF</p>
					<form action="index.php?action=store" method="post"><input type="submit" class="primary-btn cta-btn" value="Shop now"></form>
				</div>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /HOT DEAL SECTION -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<!-- section title -->
			<div class="col-md-12">
				<div class="section-title">
					<h3 class="title">Products</h3>
					<div class="section-nav">
						<ul class="section-tab-nav tab-nav">
							<li class="active"><a data-toggle="tab" href="#tab2">Smartphones</a></li>
						</ul>
					</div>
				</div>
			</div>
			<!-- /section title -->

			<!-- Products tab & slick -->
			<div class="col-md-12">
				<div class="row">
					<div class="products-tabs">
						<!-- tab -->
						<div id="tab2" class="tab-pane fade in active">
							<div class="products-slick" data-nav="#slick-nav-2">
								<!-- product -->
								<?php
								$sp = new sanpham();
								$result = $sp->getsanpham();
								while ($set = $result->fetch()) :
									$brand = $sp->gethangsanpham($set['ma_sp']);
									if ($set['giam_gia'] == 0) {

								?>
										<div class="product">
											<div class="product-img">
												<img src="./General/img/<?php echo $set['img_sp'] ?>" alt="">
												<div class="product-label"></div>
											</div>
											<div class="product-body">
												<p class="product-category"><?php echo $brand['ten_hang'] ?></p>
												<h3 class="product-name"><a href="#"><?php echo $set['ten_sp'] ?></a></h3>
												<h4 class="product-price"><?php echo number_format($set['gia_sp']) ?>đ</h4>
												<div class="product-rating">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="product-btns">
													<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
												</div>
											</div>
											<div class="add-to-cart">
												<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a>
											</div>
										</div>
									<?php } ?>
								<?php endwhile ?>
								<!-- /product -->
							</div>
							<div id="slick-nav-2" class="products-slick-nav"></div>
						</div>
						<!-- /tab -->
					</div>
				</div>
			</div>
			<!-- /Products tab & slick -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->