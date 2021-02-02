<body class="material-background">
	<div id="top"></div>
	<!--main navigation-->
	<div id="nav-header" class="material-dark w3-hide-small w3-hide-medium site-border-bottom">
			<a href="<?php echo site_url('bookings/all/0'); ?>" class="w3-btn w3-ripple nav-btn  w3-animate-zoom w3-left-align icon-margin-right">
				<h3 class="text-uppercase elianto-regular">
					<b>
						<span><?php echo $hores_details['sys_name']; ?></span>
					</b>
				</h3>
			</a>
			<div class="text-capitalize" style="display:inline-block;">
				<a href="javascript:void(0);" id="toggle-dashboard-btn" class="w3-btn w3-ripple w3-large icon-margin-right">
					<svg viewBox="0 0 16 16" class="svg-icon" data-info="menu">
						<path  d="M1 3h14v3h-14zM1 7h14v3h-14zM1 11h14v3h-14z"></path>
					</svg>
				</a>
				<span>dashboard /</span>
				<span><?php echo $page_heading; ?></span>
				<?php
					if(isset($page_sub_heading))
					{
						?>
						/ <span><?php echo $page_sub_heading; ?></span>
						<?php
					}
				 ?>
			</div>
			<div class="pull-right w3-container">
				<a class="w3-btn w3-ripple w3-hover-text-teal text-capitalize">
					<img src="<?php echo base_url().$user_details['profile_image_thumb'];?>" class="admin-nav-profile-image icon-margin-right" />
						<span><?php echo $user_details['username']; ?></span>
				</a>
				<button class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize toggle-mode-btn" data-mode="light">
					<span>dark mode</span>
				</button>
			<a href="<?php echo site_url('admin-logout'); ?>" class="w3-btn w3-ripple w3-padding-16 w3-hover-text-teal text-capitalize">
				<span>logout</span>
			</a>
			</div>
	</div>
	<!--top navigation for mobile devices-->
	<div id="mobile-nav-header" class="w3-top material-dark w3-hide-large site-border-bottom">
		<div class="nav-container">
			<a href="<?php echo site_url('bookings/all/0'); ?>" class="w3-btn w3-ripple nav-btn w3-animate-zoom padding-10">
				<h3 class="text-uppercase elianto-regular">
					<b>
						<span><?php echo $hores_details['sys_name']; ?></span>
					</b>
				</h3>
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
			<a class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal w3-hide-large text-capitalize site-border-bottom">
				<img src="<?php echo base_url().$user_details['profile_image_thumb'];?>" class="admin-nav-profile-image icon-margin-right" />
				<span><?php echo $user_details['username']; ?></span>
			</a>
				<?php
				//dashboard
					if($user_perm['dashboard'] == 1)
					{
						?>
						<a href="javascript:void(0);" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'dashboard') === 0){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="meter">
								<path d="M8 1c4.418 0 8 3.582 8 8 0 3.012-1.665 5.635-4.125 7h-7.75c-2.46-1.365-4.125-3.988-4.125-7 0-4.418 3.582-8 8-8zM12.53 13.53c1.21-1.21 1.876-2.819 1.876-4.53h-1.406v-1h1.329c-0.11-0.703-0.334-1.377-0.665-2h-1.664v-1h1.004c-0.147-0.184-0.306-0.361-0.475-0.53-0.722-0.722-1.587-1.251-2.53-1.559v1.089h-1v-1.329c-0.328-0.051-0.662-0.078-1-0.078s-0.672 0.026-1 0.078v1.329h-1v-1.089c-0.943 0.309-1.808 0.837-2.53 1.559-0.169 0.169-0.327 0.346-0.475 0.53h1.004v1h-1.664c-0.331 0.623-0.555 1.297-0.665 2h1.329v1h-1.406c0 1.711 0.666 3.32 1.876 4.53 0.167 0.167 0.343 0.324 0.524 0.47h3.006l0.571-8h0.857l0.571 8h3.006c0.182-0.146 0.357-0.303 0.524-0.47z"></path>
							</svg>
							<span class="side-link-text">dashboard</span>
						</a>
						<?php
					}
					//bookings
					if($user_perm['bookings'] == 1)
					{
						?>
						<a href="<?php echo site_url('bookings/all/0'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'bookings') === 0){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="calendar">
								<path d="M5 6h2v2h-2zM8 6h2v2h-2zM11 6h2v2h-2zM2 12h2v2h-2zM5 12h2v2h-2zM8 12h2v2h-2zM5 9h2v2h-2zM8 9h2v2h-2zM11 9h2v2h-2zM2 9h2v2h-2zM13 0v1h-2v-1h-7v1h-2v-1h-2v16h15v-16h-2zM14 15h-13v-11h13v11z"></path>
							</svg>
							<span class="side-link-text">bookings</span>
						</a>
						<?php
					}
					//clients
					if($user_perm['clients'] == 1)
					{
						?>
						<a href="<?php echo site_url('clients/all/0'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'clients') === 0){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="man-woman">
								<path d="M4 1.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
								<path d="M13 1.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5c0-0.828 0.672-1.5 1.5-1.5s1.5 0.672 1.5 1.5z"></path>
								<path d="M4 4h-3c-0.552 0-1 0.448-1 1v5h1v6h1.25v-6h0.5v6h1.25v-6h1v-5c0-0.552-0.448-1-1-1z"></path>
								<path d="M15.234 8l0.766-0.555-2.083-3.221c-0.092-0.14-0.249-0.225-0.417-0.225h-4c-0.168 0-0.325 0.084-0.417 0.225l-2.083 3.221 0.766 0.555 1.729-2.244 0.601 1.402-2.095 3.841h1.917l0.333 5h1v-5h0.5v5h1l0.333-5h1.917l-2.095-3.842 0.601-1.402 1.729 2.244z"></path>
							</svg>
							<span class="side-link-text">clients</span>
						</a>
						<?php
					}
					//rooms
					if($user_perm['rooms'] == 1)
					{
						?>
						<a href="<?php echo site_url('rooms/all/0'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'rooms') === 0){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="library">
								<path d="M16 15v-1h-1v-6h1v-1h-3v1h1v6h-3v-6h1v-1h-3v1h1v6h-3v-6h1v-1h-3v1h1v6h-3v-6h1v-1h-3v1h1v6h-1v1h-1v1h17v-1h-1z"></path>
								<path d="M8 0h1l8 5v1h-17v-1l8-5z"></path>
							</svg>
							<span class="side-link-text">rooms</span>
						</a>
						<?php
					}
					//users
					if($user_perm['users'] == 1)
					{
						?>
						<a href="<?php echo site_url('users/all/0'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'users') === 0 ){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="users">
								<path d="M12 12.041v-0.825c1.102-0.621 2-2.168 2-3.716 0-2.485 0-4.5-3-4.5s-3 2.015-3 4.5c0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h14c0-2.015-2.608-3.682-6-3.959z"></path>
								<path d="M5.112 12.427c0.864-0.565 1.939-0.994 3.122-1.256-0.235-0.278-0.449-0.588-0.633-0.922-0.475-0.863-0.726-1.813-0.726-2.748 0-1.344 0-2.614 0.478-3.653 0.464-1.008 1.299-1.633 2.488-1.867-0.264-1.195-0.968-1.98-2.841-1.98-3 0-3 2.015-3 4.5 0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h4.359c0.227-0.202 0.478-0.393 0.753-0.573z"></path>
							</svg>
							<span class="side-link-text">users</span>
						</a>
						<?php
					}
					//userlogs
					if($user_perm['user_logs'] == 1)
					{
						?>
						<a href="<?php echo site_url('user-logs/all/0'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn <?php if(isset($_SESSION['hores_current_category']) && strcmp($_SESSION['hores_current_category'],'user-logs') === 0){echo 'w3-text-teal site-border';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="history">
								<path d="M10 1c3.866 0 7 3.134 7 7s-3.134 7-7 7v-1.5c1.469 0 2.85-0.572 3.889-1.611s1.611-2.42 1.611-3.889c0-1.469-0.572-2.85-1.611-3.889s-2.42-1.611-3.889-1.611c-1.469 0-2.85 0.572-3.889 1.611-0.799 0.799-1.322 1.801-1.52 2.889h2.909l-3.5 4-3.5-4h2.571c0.485-3.392 3.402-6 6.929-6zM13 7v2h-4v-5h2v3z"></path>
							</svg>
							<span class="side-link-text">user logs</span>
						</a>
						<?php
					}					
				 ?>
				<button class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn toggle-mode-btn" data-mode="light">
					<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="wand">
						<path d="M4 3l-2-2h-1v1l2 2zM5 0h1v2h-1zM9 5h2v1h-2zM10 2v-1h-1l-2 2 1 1zM0 5h2v1h-2zM5 9h1v2h-1zM1 9v1h1l2-2-1-1zM15.781 13.781l-9.939-9.939c-0.292-0.292-0.769-0.292-1.061 0l-0.939 0.939c-0.292 0.292-0.292 0.769 0 1.061l9.939 9.939c0.292 0.292 0.769 0.292 1.061 0l0.939-0.939c0.292-0.292 0.292-0.769 0-1.061zM7.5 8.5l-3-3 1-1 3 3-1 1z"></path>
					</svg>
					<span class="side-link-text">dark mode</span>
				</button>
				<a href="<?php echo site_url('admin-logout'); ?>" class="w3-btn w3-ripple w3-block w3-left-align w3-hover-text-teal text-capitalize side-link-btn">
				<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="sign out">
					<path d="M10 2.29v2.124c0.566 0.247 1.086 0.6 1.536 1.050 0.944 0.944 1.464 2.2 1.464 3.536s-0.52 2.591-1.464 3.536c-0.944 0.944-2.2 1.464-3.536 1.464s-2.591-0.52-3.536-1.464c-0.944-0.944-1.464-2.2-1.464-3.536s0.52-2.591 1.464-3.536c0.45-0.45 0.97-0.803 1.536-1.050v-2.124c-2.891 0.861-5 3.539-5 6.71 0 3.866 3.134 7 7 7s7-3.134 7-7c0-3.171-2.109-5.849-5-6.71zM7 0h2v8h-2z"></path>
				</svg>
				<span class="side-link-text">logout</span>
				</a>
		</div>
	</div>
