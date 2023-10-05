<!-- BREADCRUMB -->
<div id="breadcrumb" class="section">
	<!-- container -->
	<div class="container">
		<!-- row -->
		<div class="row">
			<div class="col-md-12">
				<h3 class="breadcrumb-header">Regular Page</h3>
				<ul class="breadcrumb-tree">
					<li><a href="#">Home</a></li>
					<li class="active">Account</li>
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
			<div class="col-md-6">
				<!-- Form Login -->
				<form method="post" action="index.php?action=account&&act=signin" class="order-details" >
					<div class="section-title text-center">
						<h3 class="title">Login Account</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="name_login" placeholder="Login name">
					</div>
					<div class="form-group">
						<input class="input" type="password" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input class="primary-btn order-submit" type="submit" value="Sign in">
					</div>
				</form>
				<!-- /Form Login -->
			</div>
			<div class="col-md-6">
				<!-- Form Register -->
				<form method="post" action="index.php?action=account&&act=signup" class="billing-details">
					<div class="section-title">
						<h3 class="title">Register now!!</h3>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="user-name" placeholder="User Name">
						<span class="error">*<?php if(isset($nameErr)) echo $nameErr; ?></span>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="login-name" placeholder="Login Name">
						<span class="error">*<?php if(isset($unameErr)) echo $unameErr; ?></span>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="password" placeholder="Password">
						<span class="error">*<?php if(isset($passErr)) echo $passErr; ?></span>
					</div>
					<div class="form-group">
						<input class="input" type="email" name="email" placeholder="Email">
						<span class="error">*<?php if(isset($emailErr)) echo $emailErr; ?></span>
					</div>
					<div class="form-group">
						<input class="input" type="text" name="address" placeholder="Address">
						<span class="error">*<?php if(isset($diachiErr)) echo $diachiErr; ?></span>
					</div>
					<div class="form-group">
						<input class="input" type="tel" name="tel" placeholder="Telephone">
						<span class="error">*<?php if(isset($phoneErr)) echo $phoneErr; ?></span>
					</div>
					<div class="form-group">
						<input class="primary-btn order-submit" type="submit" value="Sign up">
					</div>
				</form>
				<!-- /Form Register -->
			</div>
		</div>
		<!-- /row -->
	</div>
	<!-- /container -->
</div>
<!-- /SECTION -->