<?php
if (isset($_GET['id'])) {
	$id = $_GET['id'];
	$sp = new sanpham();
	$result = $sp->getsanphamID($id);
	$hang = $result['mahang_sp'];
	$masp = $result['ma_sp'];
	$ten = $result['ten_sp'];
	$gia = $result['gia_sp'];
	$gg = $result['giam_gia'];
	$mota = $result['mota_sp'];
	$hinh = $result['img_sp'];
}
?>

<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li><a href="#">Store</a></li>
					<li><a href="#"><?php echo $ten ; ?></a></li>
				</ul>
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /BREADCRUMB -->

<!-- SECTION -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<form action="index.php?action=cart" method="post">
				<input type="text" hidden name="masp" value="<?php echo $masp ?>">
				<!-- Product main img -->
				<div class="col-md-5 col-md-push-2">
					<div id="product-main-img">
						<div class="product-preview">
							<img src="./General/img/<?php echo $hinh ?>" alt="">
						</div>
					</div>
				</div>
				<!-- /Product main img -->

				<!-- Product thumb imgs -->
				<div class="col-md-2  col-md-pull-5">
					<div id="product-imgs">
						
					</div>
				</div>
				<!-- /Product thumb imgs -->

				<!-- Product details -->
				<div class="col-md-5">
					<div class="product-details">
						<h2 class="product-name"><?php echo $ten ?></h2>
						<div>
							<div class="product-rating">
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star-o"></i>
							</div>
						</div>
						<?php if ($gg > 0) { ?>
							<div>
								<h3 class="product-price"><?php echo number_format($gia - $gg) ?>đ <del class="product-old-price"><?php echo number_format($gia) ?>đ</del></h3>
								<span class="product-available">In Stock</span>
							</div>
						<?php } else { ?>
							<div>
								<h3 class="product-price"><?php echo number_format($gia) ?>đ</h3>
								<span class="product-available">In Stock</span>
							</div>
						<?php } ?>
						<p><?php echo $mota ?></p>

						<div class="product-options">
							<label>
								<select name="cauhinh" class="input-select" style="width:150px;">
									<?php
									$cauhinh = $sp->getcauhinh($hang);
									while ($set = $cauhinh->fetch()) :
									?>
										<option value="<?php echo $set['cau_hinh'] ?>"><?php echo $set['cau_hinh'] ?></option>
									<?php endwhile ?>
								</select>
							</label>
							<label>
								Color
								<select name="mausac" class="input-select" style="width:120px;">
									<?php
									$mausac = $sp->getsanphamBrand($hang);
									while ($set = $mausac->fetch()) :
									?>
										<option value="<?php echo $set['mau_sac'] ?>"><?php echo $set['mau_sac'] ?></option>
									<?php endwhile ?>
								</select>
							</label>
						</div>

						<div class="add-to-cart">
							<div class="qty-label">
								Qty
								<div class="input-number">
									<input type="number" name="soluong" min="1" max="100" value="1">
									<span class="qty-up">+</span>
									<span class="qty-down">-</span>
								</div>
							</div>
							<button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to cart</button>
						</div>

						<ul class="product-btns">
							<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
						</ul>

						<ul class="product-links">
							<li>Category:</li>
							<?php
								$ten_hang = $sp->gethangsanpham($masp);
							?>
							<li><a href="index.php?action=store&&mahang=<?php echo $hang ?>"><?php echo $ten_hang[0] ?></a></li>
						</ul>

						<ul class="product-links">
							<li>Share:</li>
							<li><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li><a href="#"><i class="fa fa-envelope"></i></a></li>
						</ul>

					</div>
				</div>
			</form>
			<!-- /Product details -->

			<?php
			if (isset($_GET['id'])) {
				$ma_sp = $_GET['id'];
				$bl = new binhluan();
				$tong = $bl->getCount($ma_sp);
			}
			?>

			<!-- Product tab -->
			<div class="col-md-12">
				<div id="product-tab">
					<!-- product tab nav -->
					<ul class="tab-nav">
						<li class="active"><a data-toggle="tab" href="#tab1">Description</a></li>
						<li><a data-toggle="tab" href="#tab2">Details</a></li>
						<li><a data-toggle="tab" href="#tab3">Reviews (<?php echo $tong ?>)</a></li>
					</ul>
					<!-- /product tab nav -->

					<!-- product tab content -->
					<div class="tab-content">
						<!-- tab1  -->
						<div id="tab1" class="tab-pane fade in active">
							<div class="row">
								<div class="col-md-12">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
						<!-- /tab1  -->

						<!-- tab2  -->
						<div id="tab2" class="tab-pane fade in">
							<div class="row">
								<div class="col-md-12">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
										incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis
										nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
										fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
										culpa qui officia deserunt mollit anim id est laborum.</p>
								</div>
							</div>
						</div>
						<!-- /tab2  -->

						<!-- tab3  -->
						<div id="tab3" class="tab-pane fade in">
							<div class="row">
								<!-- Rating -->
								<div class="col-md-3">
									<div id="rating">
										<div class="rating-avg">
											<span>4.5</span>
											<div class="rating-stars">
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star"></i>
												<i class="fa fa-star-o"></i>
											</div>
										</div>
										<ul class="rating">
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 80%;"></div>
												</div>
												<span class="sum">3</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div style="width: 60%;"></div>
												</div>
												<span class="sum">2</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
											<li>
												<div class="rating-stars">
													<i class="fa fa-star"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
													<i class="fa fa-star-o"></i>
												</div>
												<div class="rating-progress">
													<div></div>
												</div>
												<span class="sum">0</span>
											</li>
										</ul>
									</div>
								</div>
								<!-- /Rating -->

								<!-- Reviews -->
								<div class="col-md-6">
									<div id="reviews">
										<ul class="reviews">
											<?php
											$all_cmt = $bl->Hienthicomment($ma_sp);
											while ($set = $all_cmt->fetch()) {
											?>
												<li>
													<div class="review-heading">
														<h5 class="name"><?php echo $set['tenkh'] ?></h5>
														<p class="date"><?php echo $set['ngaybl'] ?></p>
														<div class="review-rating">
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star"></i>
															<i class="fa fa-star-o empty"></i>
														</div>
													</div>
													<div class="review-body">
														<p><?php echo $set['noidung'] ?></p>
													</div>
												</li>
											<?php } ?>
										</ul>
									</div>
								</div>
								<!-- /Reviews -->

								<!-- Review Form -->
								<?php
								if (isset($_SESSION['makh'])) {
								?>
									<div class="col-md-3">
										<div id="review-form">
											<form class="review-form" method="post" action="index.php?action=detail&&id=<?php echo $_GET['id'] ?>&&act=comment">
												<input type="hidden" name="txtmahh" value="<?php echo $_GET['id']; ?>" />
												<textarea class="input" name="comment" placeholder="Your Review"></textarea>
												<button class="primary-btn" type="submit">Submit</button>
											</form>
										</div>
									</div>
								<?php
								}
								?>
								<!-- /Review Form -->
							</div>
						</div>
						<!-- /tab3  -->
					</div>
					<!-- /product tab content  -->
				</div>
			</div>
			<!-- /product tab -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->

<!-- Section -->
<div class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">

			<div class="col-md-12">
				<div class="section-title text-center">
					<h3 class="title">Related Products</h3>
				</div>
			</div>
			<?php
			$related_results = $sp->getsanphamBrand($hang);
			while ($set = $related_results->fetch()) :
				$brand = $sp->gethangsanpham($masp);
				if ($set['giam_gia'] > 0) {
			?>
					<!-- product -->
					<div class="col-md-3 col-xs-6">
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
								<h4 class="product-price"><?php echo number_format($set['gia_sp'] - $set['giam_gia']) ?>đ <del class="product-old-price"><?php echo number_format($set['gia_sp']) ?>đ</del></h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
											wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
											compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
											view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a></button>
							</div>
						</div>
					</div>
					<!-- /product -->
				<?php } else { ?>
					<div class="col-md-3 col-xs-6">
						<div class="product">
							<div class="product-img">
								<img src="./General/img/<?php echo $set['img_sp'] ?>" alt="">
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $brand['ten_hang'] ?></p>
								<h3 class="product-name"><a href="#"><?php echo $set['ten_sp'] ?></a></h3>
								<h4 class="product-price"><?php echo number_format($set['gia_sp'] - $set['giam_gia']) ?>đ</h4>
								<div class="product-rating">
								</div>
								<div class="product-btns">
									<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
											wishlist</span></button>
									<button class="add-to-compare"><i class="fa fa-exchange"></i><span class="tooltipp">add to
											compare</span></button>
									<button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
											view</span></button>
								</div>
							</div>
							<div class="add-to-cart">
								<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> <a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a></button>
							</div>
						</div>
					</div>
			<?php }
			endwhile ?>

		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /Section -->