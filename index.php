<?php
session_start();
if (isset($_SESSION['admin'])) {
	header('location: admin/home.php');
	exit();
}

if (isset($_SESSION['voter'])) {
	header('location: home.php');
	exit();
}
?>
<?php include 'includes/header.php'; ?>

<body class="hold-transition login-page">
	<div class="login-box">
		<div class="login-logo">
			<b>Voting System</b>
		</div>
		<?php
		if (isset($_GET['voterid'])) {
			echo '<div class="alert alert-success text-center">';
		?>
			<p>
				<h5>You Have Been Registered Successfully !</h5>
			</p>

			<p>
				<h5>Your Voter(Login) Id Is : <?php echo "<b>&nbsp;&nbsp;" . $_GET['voterid'] . "</b>"; ?></h5>
			</p>
		<?php
			echo '</div>';
		} else if (isset($_GET['resetpasswordempty'])) {
			echo '<div class="alert alert-danger text-center">';
		?>
			<p>Password Reset Fail. Reason(<b>EmptyFields</b>)</p>
		<?php
			echo '</div>';
		}

		else if(isset($_GET['resetpassword']))
		{echo '<div class="alert alert-danger text-center">';
			?>
			<p>Password Reset Fail. Reason(<b>Password Not Matching</b>)</p>
			<?php
			echo '</div>';
		}
		else if(isset($_GET['passwordchange']) && $_GET['passwordchange'] == TRUE)
		{echo '<div class="alert alert-success text-center">';
		?>
			<p>Password Has Been Updated</p>
			<?php
			echo '</div>';
		}
			?>
		<div class="login-box-body">
			<p class="login-box-msg">Sign in to start your session</p>

			<form action="login.php" method="POST">
				<div class="form-group has-feedback">
					<input type="text" class="form-control" name="voter" placeholder="Voter's ID" required>
					<span class="glyphicon glyphicon-user form-control-feedback"></span>
				</div>
				<div class="form-group has-feedback">
					<input type="password" class="form-control" name="password" placeholder="Password" required>
					<span class="glyphicon glyphicon-lock form-control-feedback"></span>
				</div>
				<div class="row" style="display: flex;justify-content: space-between;">
					<div class="col-xs-4" style="padding:0;">
						<button type="submit" class="btn btn-primary btn-block btn-flat" name="login"><i class="fa fa-sign-in"></i> Sign In</button>
					</div>

					<div class="col-xs-4" style="padding:0;">
						<a href="#addnew" data-toggle="modal" class="btn btn-primary btn-block btn-flat"><i class="fa fa-plus"></i> Sign Up</a>
					</div>
				</div>
			</form>
			<div class="container-fluid" style="margin-top:20px;">
				<p class="text-primary text-center">Forget Password?&nbsp;<a href="#resetpass" class="text-danger" data-toggle="modal"><b>Reset Here</b></a></p>
			</div>
		</div>
		<?php
		if (isset($_SESSION['error'])) {
			echo "
  				<div class='callout callout-danger text-center mt20'>
			  		<p>" . $_SESSION['error'] . "</p> 
			  	</div>
  			";
			unset($_SESSION['error']);
		}
		?>
	</div>

	<?php include 'includes/scripts.php' ?>
</body>
<?php include 'voters_modal.php'; ?>
</div>

</html>