<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Checkout</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Checkout</li>
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
		<form action="index.php?action=order" method="post">
			<div class="row">
				<div class="col-md-7">
					<?php
						if(isset($_SESSION['makh']))
						{
							$ur = new user() ;
							$username = $_SESSION['username'] ;
							$info = $ur->user_info($username) ;
					?>
					<!-- Billing Details -->
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Billing address</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="user-name" placeholder="User Name" value="<?php echo $info['tenkh'] ?>" disabled>
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email" value="<?php echo $info['email'] ?>" disabled>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address" value="<?php echo $info['diachi'] ?>" disabled>
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone" value="<?php echo $info['sodienthoai'] ?>" disabled>
						</div>
					</div>
					<?php
						}else{
					?>
					<div class="billing-details">
						<div class="section-title">
							<h3 class="title">Billing address</h3>
						</div>
						<div class="form-group">
							<input class="input" type="text" name="first-name" placeholder="First Name">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="last-name" placeholder="Last Name">
						</div>
						<div class="form-group">
							<input class="input" type="email" name="email" placeholder="Email">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="address" placeholder="Address">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="city" placeholder="City">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="country" placeholder="Country">
						</div>
						<div class="form-group">
							<input class="input" type="text" name="zip-code" placeholder="ZIP Code">
						</div>
						<div class="form-group">
							<input class="input" type="tel" name="tel" placeholder="Telephone">
						</div>
						<?php
						}
						?>
					<!-- /Billing Details -->
				</div>

				<!-- Order Details -->
				<div class="col-md-5 order-details">
					<div class="section-title text-center">
						<h3 class="title">Your Order</h3>
					</div>
					<div class="order-summary">
						<div class="order-col">
							<div><strong>PRODUCT</strong></div>
							<div><strong>TOTAL</strong></div>
						</div>
						<div class="order-products">
							<?php
							$cart = new cart();
							$subtotal = $cart->gettotal();
							foreach ($_SESSION['cart'] as $key=>$item) {
							?>
								<div class="order-col">
									<div><?php echo $item['soluong'] ?>x <?php echo $item['ten'] ?> <?php echo $item['mausac'] ?> <?php echo $item['cauhinh'] ?></div>
									<a class="btn-del" href="index.php?action=cart&act=delete&id=<?php echo $key ?>"><i class="delete fa fa-close"></i></a>
									<div><?php echo number_format($item['total']) ?>đ</div>
								</div>
							<?php
							}
							?>
						</div>
						<div class="order-col">
							<div>Shiping</div>
							<div><strong>FREE</strong></div>
						</div>
						<div class="order-col">
							<div><strong>TOTAL</strong></div>
							<div><strong class="order-total"><?php echo number_format($subtotal) ?>đ</strong></div>
						</div>
					</div>
					<div class="payment-method">
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-1">
							<label for="payment-1">
								<span></span>
								Direct Bank Transfer
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-2">
							<label for="payment-2">
								<span></span>
								Cheque Payment
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
						<div class="input-radio">
							<input type="radio" name="payment" id="payment-3">
							<label for="payment-3">
								<span></span>
								Paypal System
							</label>
							<div class="caption">
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua.</p>
							</div>
						</div>
					</div>
					<div class="input-checkbox">
						<input type="checkbox" id="terms">
						<label for="terms">
							<span></span>
							I've read and accept the <a href="#">terms & conditions</a>
						</label>
					</div>
					<input type="submit" class="primary-btn order-submit" value="Place order">
				</div>
				<!-- /Order Details -->
			</div>
			<!-- /row -->
		</form>
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->