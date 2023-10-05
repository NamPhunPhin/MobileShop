<?php
$sp = new sanpham();
$kq = $sp->getsanpham();
$count = $kq->rowCount();

$limit = 9;

$p = new page();

$page = $p->findPage($count, $limit);

$start = $p->findStart($limit);
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
			<!-- ASIDE -->
			<div id="aside" class="col-md-3">

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Brand</h3>
					<div class="checkbox-filter">
						<?php
						$h = new hang();
						$hang = $h->gethang();
						?>
						<div class="input-checkbox">
							<a href="index.php?action=store">
								All
								<small>(<?php
										$quantity = $h->count_spAll();
										$All_sl = $quantity->fetch();
										echo $All_sl['quantity'];
										?>)</small>
							</a>
						</div>
						<?php
						while ($set = $hang->fetch()) {
						?>
							<div class="input-checkbox">
								<a href="index.php?action=store&&mahang=<?php echo $set['ma_hang'] ?>">
									<?php echo $set["ten_hang"] ?>
									<small>(<?php
											$qtyh = $h->count_sp($set["ma_hang"]);
											$sl = $qtyh->fetch();
											echo $sl['qty'];
											?>)</small>
								</a>
							</div>
						<?php
						}
						?>
					</div>
				</div>
				<!-- /aside Widget -->

				<!-- aside Widget -->
				<div class="aside">
					<h3 class="aside-title">Top selling</h3>
					<?php
					$top_list = $sp->topsell();
					while ($set = $top_list->fetch()) :
						$sp_top = $sp->getsanphamID($set['ma_sp']);
					?>
						<div class="product-widget">
							<div class="product-img">
								<img src="./General/img/<?php echo $sp_top['img_sp'] ?>" alt="">
							</div>
							<div class="product-body">
								<p class="product-category"><?php echo $sp_top['mahang_sp'] ?></p>
								<h3 class="product-name"><a href="index.php?action=detail&&id=<?php echo $sp_top['ma_sp'] ?>"><?php echo $sp_top['ten_sp'] ?></a></h3>
								<?php if ($sp_top['giam_gia'] > 0) { ?>
									<h4 class="product-price"><?php echo number_format($sp_top['gia_sp'] - $sp_top['giam_gia']) ?>đ <del class="product-old-price"><?php echo number_format($sp_top['gia_sp']) ?>đ</del></h4>
								<?php } else { ?>
									<h4 class="product-price"><?php echo number_format($sp_top['gia_sp']) ?>đ</h4>
								<?php } ?>
							</div>
						</div>
					<?php endwhile ?>
				</div>
				<!-- /aside Widget -->
			</div>
			<!-- /ASIDE -->

			<!-- STORE -->
			<div id="store" class="col-md-9">
				<!-- store top filter -->
				<div class="store-filter clearfix">
					<div class="store-sort">
						<label>
							Sort By:
							<select class="input-select">
								<option value="0">Popular</option>
								<option value="1">Position</option>
							</select>
						</label>

						<label>
							Show:
							<select class="input-select">
								<option value="0">20</option>
								<option value="1">50</option>
							</select>
						</label>
					</div>
				</div>
				<!-- /store top filter -->

				<!-- store products -->
				<div class="row">
					<!-- product -->
					<?php

					if (isset($_GET['act'])) {
						if ($_GET['act'] == 'timkiem') {
							$result = $sp->timkiem($_POST['txtsearch']);
							echo "<h4>SẢN PHẨM TÌM KIẾM</h4>";
						}
					} elseif (isset($_GET['mahang'])) {
						$result = $sp->getListpageHHwBrand($start, $limit, $_GET['mahang']);
					} else {
						$result = $sp->getListpageHH($start, $limit);
					}

					$current_page = isset($_GET['page']) ? $_GET['page'] : 1;
					while ($set = $result->fetch()) :
						$brand = $sp->gethangsanpham($set['ma_sp']);
						if ($set['giam_gia'] > 0) {

					?>
							<div class="col-md-4 col-xs-6">
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
										<h4 class="product-price"><?php echo number_format($set['gia_sp'] - $set['giam_gia']) ?>đ <del class="product-old-price"><?php echo number_format($set['gia_sp']) ?>đ</h4>
										<div class="product-rating">
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a></button>
									</div>
								</div>
							</div>

							<div class="clearfix visible-sm visible-xs"></div>
						<?php } else { ?>
							<div class="col-md-4 col-xs-6">
								<div class="product">
									<div class="product-img">
										<img src="./General/img/<?php echo $set['img_sp'] ?>" alt="">
									</div>
									<div class="product-body">
										<p class="product-category"><?php echo $brand['ten_hang'] ?></p>
										<h3 class="product-name"><a href="#"><?php echo $set['ten_sp'] ?></a></h3>
										<h4 class="product-price"><?php echo number_format($set['gia_sp']) ?>đ</h4>
										<div class="product-rating">
										</div>
										<div class="product-btns">
											<button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to wishlist</span></button>
										</div>
									</div>
									<div class="add-to-cart">
										<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i><a href="index.php?action=detail&&id=<?php echo $set['ma_sp'] ?>"> View detail</a></button>
									</div>
								</div>
							</div>

							<div class="clearfix visible-sm visible-xs"></div>
					<?php }
					endwhile ?>
				</div>
				<!-- /store products -->

				<!-- store bottom filter -->
				<div class="store-filter clearfix">
					<span class="store-qty">Showing 20-100 products</span>
					<ul class="store-pagination">
						<?php
						for ($i = 1; $i <= $page; $i++) {
						?>
							<li><a href="index.php?action=store&page=<?php echo $i ?>"> <?php echo $i; ?> </a></li>
						<?php } ?>
					</ul>
				</div>
				<!-- /store bottom filter -->
			</div>
			<!-- /STORE -->
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->