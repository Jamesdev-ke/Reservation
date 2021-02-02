<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-12 w3-round-large">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php $this->load->view('pages/users_navigation'); ?>
				<div class="tab-content site-border-left site-border-right site-border-bottom padding-10">
					<div class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-3"></div>
							<div class="col-sm-6">
								<?php echo form_open_multipart('new-user','name="add-user-form" id="add-user-form" autocomplete="off"'); ?>
								<?php
									if(isset($_SESSION['name_empty']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['name_empty']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['email_empty']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['email_empty']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['pass1_empty']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['pass1_empty']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['pass2_empty']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['pass2_empty']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['pass_mismatch']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['pass_mismatch']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['name_invalid']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['name_invalid']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['email_invalid']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['email_invalid']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['pass1_invalid']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['pass1_invalid']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['email_exists']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['email_exists']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['profile_image_invalid']))
									{
										?>
					<div class="w3-panel w3-red w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-red w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>attention!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['profile_image_invalid']; ?></span>
							</p>
							</div>
					<?php
									}
									elseif(isset($_SESSION['add_user_success']))
									{
										?>
					<div class="w3-panel w3-green w3-margin-top w3-display-container  w3-round-large padding-10">
							<span onclick="this.parentElement.style.display='none'" class="w3-btn w3-green w3-display-topright w3-ripple w3-circle">
								<svg viewBox="0 0 16 16" class="svg-icon white-icon" data-info="cancel">
									<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
								</svg>
							</span>
							<h4 class="text-center text-capitalize roboto-bold">
								<span>success!</span>
							</h4>
							<p class="text-center roboto-bold">
								<span><?php echo $_SESSION['add_user_success']; ?></span>
							</p>
							</div>
					<?php
									}
								 ?>
									<ul class="list-unstyled">
										<li>
											<span class="text-capitalize icon-margin-right">name</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="text" name="name" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['name_empty']) || isset($_SESSION['name_invalid'])){echo 'w3-border-red';} ?>" placeholder="Name" maxlength="50" autocomplete="off" autofocus="on" required value="<?php if(isset($_SESSION['name_temp'])){echo $_SESSION['name_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">email</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="email" name="email" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['email_empty']) || isset($_SESSION['email_invalid']) || isset($_SESSION['email_exists'])){echo 'w3-border-red';} ?>" placeholder="Email" maxlength="50" autocomplete="off" required value="<?php if(isset($_SESSION['email_temp'])){echo $_SESSION['email_temp'];} ?>" />
										</li>
										<li>
											<label class="switch pull-right w3-margin-bottom toggle-pass">
												<input type="checkbox" class="hidden pass-checkbox" />
												<span class="slider round"></span>
											</label>
											<span class="text-capitalize pull-right w3-margin-bottom icon-margin-right">show password</span>
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">password</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="password" name="pass1" class="form-control no-bg w3-margin-bottom w3-round-large input-lg pass-input <?php if(isset($_SESSION['pass1_empty']) || isset($_SESSION['pass1_invalid'])){echo 'w3-border-red';} ?>" placeholder="Password" maxlength="15" autocomplete="off" required value="<?php if(isset($_SESSION['pass1_temp'])){echo $_SESSION['pass1_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">confirm password</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="password" name="pass2" class="form-control no-bg w3-margin-bottom w3-round-large input-lg pass-input <?php if(isset($_SESSION['pass2_empty']) || isset($_SESSION['pass_mismatch'])){echo 'w3-border-red';} ?>" placeholder="Confirm Password" maxlength="15" autocomplete="off" required value="<?php if(isset($_SESSION['pass2_temp'])){echo $_SESSION['pass2_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize">profile image</span>
										</li>
										<li>
											<input type="file" name="profile-image" class="form-control no-bg w3-margin-bottom <?php if(isset($_SESSION['profile_image_invalid'])){echo 'w3-border-red';} ?>" />
										</li>
										<li>
											<input type="hidden" name="add-user-sys-id" value="<?php echo $sys_id; ?>" />
											<input type="submit" name="add-user-btn" value="save" class="form-control w3-margin-bottom w3-round-large input-lg w3-blue text-capitalize w3-border-0 w3-ripple" />
										</li>
									</ul>
								</form>
							</div>
							<div class="col-sm-3"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>