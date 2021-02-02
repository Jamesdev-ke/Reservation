<body class="material-background">
	<div id="top"></div>
	<!--main navigation-->
	<div id="nav-header" class="material-dark w3-hide-small w3-hide-medium site-border-bottom">
		<a href="<?php echo site_url('home'); ?>" class="w3-btn w3-ripple nav-btn  w3-animate-zoom w3-left-align icon-margin-right">
				<h3 class="text-uppercase roboto-bold">
					<b>
						<span><?php echo $hores_details['sys_name']; ?></span>
					</b>
				</h3>
			</a>
			<div class="pull-right w3-container">
			<a href="<?php echo site_url('home'); ?>" class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'home') === 0){echo 'w3-text-teal';} ?>">
				<span>rooms</span>
			</a>
			<?php 
			if(isset($_SESSION['hores_client_id']))
			{
				?>
				<a href="<?php echo site_url('client-profile'); ?>" class="w3-btn w3-ripple w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-profile') === 0){echo 'w3-text-teal';} ?>">
					<img src="<?php echo base_url().$client_details['profile_image_thumb'];?>" class="admin-nav-profile-image icon-margin-right" />
					<span><?php echo $client_details['name']; ?></span>
				</a>
				<a href="<?php echo site_url('client-logout'); ?>" class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize">
					<span>logout</span>
				</a>
				<?php
			}
			else
			{
				//show login and register button
				?>
				<a href="<?php echo site_url('client-register'); ?>" class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-register') === 0){echo 'w3-text-teal';} ?>">
					<span>register</span>
				</a>
				<a href="<?php echo site_url('client-login'); ?>" class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-login') === 0){echo 'w3-text-teal';} ?>">
					<span>login</span>
				</a>
				<?php
			}

			?>
			</div>
	</div>
	<!--top navigation for mobile devices-->
	<div id="mobile-nav-header" class="w3-top material-dark w3-hide-large site-border-bottom">
		<div class="nav-container">
			<a href="<?php echo site_url('home'); ?>" class="w3-btn w3-ripple nav-btn w3-animate-zoom padding-10">
				<h4 class="text-uppercase roboto-bold">
					<b>
						<span><?php echo $hores_details['sys_name']; ?></span>
					</b>
				</h4>
			</a>
			<a href="javascript:void(0);" id="toggle-sidebar-btn" class="w3-btn w3-ripple nav-btn w3-large pull-right">
				<div class="menu-container">
					<div class="bar1"></div>
					<div class="bar2"></div>
					<div class="bar3"></div>
				</div>
			</a>
		</div>
	</div>
	<!--side navigation-->
	<div class="w3-sidebar w3-collapse material-background" id="side-bar">
		<div class="w3-bar-block" id="side-bar-inner">
			<?php
			if(isset($_SESSION['hores_client_id']))
			{
				?>
				<a href="<?php echo site_url('client-profile'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal w3-hide-large text-capitalize site-border-bottom <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-profile') === 0){echo 'w3-text-teal';} ?>">
					<img src="<?php echo base_url().$client_details['profile_image_thumb'];?>" class="admin-nav-profile-image icon-margin-right" />
					<span><?php echo $client_details['name']; ?></span>
				</a>
				<?php
			}
			?>
			<a href="<?php echo site_url('home'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'home') === 0){echo 'w3-text-teal';} ?>">
				<span>rooms</span>
			</a>
			<?php
			if(isset($_SESSION['hores_client_id']))
			{
				?>
				<a href="<?php echo site_url('client-logout'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize">
					<span>logout</span>
				</a>
				<?php
			}
			else
			{
				?>
				<a href="<?php echo site_url('client-register'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-register') === 0){echo 'w3-text-teal';} ?>">
					<span>register</span>
				</a>
				<a href="<?php echo site_url('client-login'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strcmp($_SESSION['hores_current_link'],'client-login') === 0){echo 'w3-text-teal';} ?>">
					<span>login</span>
				</a>
				<?php
			}
			?>
		</div>
	</div>