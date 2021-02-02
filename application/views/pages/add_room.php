<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-12 w3-round-large">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php $this->load->view('pages/rooms_navigation'); ?>
				<div class="tab-content site-border-left site-border-right site-border-bottom padding-10">
					<div class="tab-pane fade in active">
						<?php echo form_open_multipart('new-room','name="add-room-form" id="add-room-form" autocomplete="off"'); ?>
						<?php
						if(isset($_SESSION['type_empty']))
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
								<span><?php echo $_SESSION['type_empty']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['capacity_empty']))
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
								<span><?php echo $_SESSION['capacity_empty']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['total_empty']))
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
								<span><?php echo $_SESSION['total_empty']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['charges_empty']))
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
								<span><?php echo $_SESSION['charges_empty']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['capacity_invalid']))
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
								<span><?php echo $_SESSION['capacity_invalid']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['total_invalid']))
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
								<span><?php echo $_SESSION['total_invalid']; ?></span>
							</p>
							</div>
					<?php
						} 
						elseif(isset($_SESSION['charges_invalid']))
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
								<span><?php echo $_SESSION['charges_invalid']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['type_exists']))
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
								<span><?php echo $_SESSION['type_exists']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['image1_invalid']))
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
								<span><?php echo $_SESSION['image1_invalid']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['image2_invalid']))
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
								<span><?php echo $_SESSION['image2_invalid']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['image3_invalid']))
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
								<span><?php echo $_SESSION['image3_invalid']; ?></span>
							</p>
							</div>
					<?php
						}
						elseif(isset($_SESSION['add_room_success']))
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
								<span><?php echo $_SESSION['add_room_success']; ?></span>
							</p>
							</div>
					<?php
						}
						 ?>
							<div class="row">
								<div class="col-sm-6">
									<ul class="list-unstyled">
										<li>
											<span class="text-capitalize icon-margin-right">room type</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="text" name="type" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['type_empty']) || isset($_SESSION['type_exists'])){echo 'w3-border-red';} ?>" maxlength="50" autocomplete="off" autofocus="on" required placeholder="Room type" value="<?php if(isset($_SESSION['type_temp'])){echo $_SESSION['type_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">room capacity</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="number" name="capacity" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['capacity_empty']) || isset($_SESSION['capacity_invalid'])){echo 'w3-border-red';} ?>" min="1" max="100" autocomplete="off" required placeholder="Room capacity" value="<?php if(isset($_SESSION['capacity_temp'])){echo $_SESSION['capacity_temp'];} ?>" /> 
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">total rooms</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="number" name="total" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['total_empty']) || isset($_SESSION['total_invalid'])){echo 'w3-border-red';} ?>" min="1" max="100" autocomplete="off" required placeholder="Total rooms" value="<?php if(isset($_SESSION['total_temp'])){echo $_SESSION['total_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">daily charge (Ksh)</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="text" name="charges" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['charges_empty']) || isset($_SESSION['charges_invalid'])){echo 'w3-border-red';} ?>" autocomplete="off" required placeholder="Daily charge" value="<?php if(isset($_SESSION['charges_temp'])){echo $_SESSION['charges_temp'];} ?>" />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">description</span>
										</li>
										<li>
											<textarea name="desc" id="desc" maxlength="250" placeholder="Description"><?php if(isset($_SESSION['desc_temp'])){echo $_SESSION['desc_temp'];} ?></textarea>
										</li>
									</ul>
								</div>
								<div class="col-sm-6">
									<ul class="list-unstyled">
										<li>
											<span class="text-capitalize icon-margin-right">image1 (Not exceed 500Kb)</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="file" name="image1" class="form-control no-bg w3-margin-bottom <?php if(isset($_SESSION['image1_invalid'])){echo 'w3-border-red';} ?>" required />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">image2 (Not exceed 500Kb)</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="file" name="image2" class="form-control no-bg w3-margin-bottom <?php if(isset($_SESSION['image2_invalid'])){echo 'w3-border-red';} ?>" required />
										</li>
										<li>
											<span class="text-capitalize icon-margin-right">image3 (Not exceed 500Kb)</span><span class="w3-text-red">*</span>
										</li>
										<li>
											<input type="file" name="image3" class="form-control no-bg w3-margin-bottom <?php if(isset($_SESSION['image3_invalid'])){echo 'w3-border-red';} ?>" required />
										</li>
										<li>
											<input type="hidden" name="add-room-sys-id" value="<?php echo $sys_id; ?>" />
											<input type="submit" name="add-room-btn" value="save" class="form-control w3-margin-bottom w3-round-large input-lg w3-blue text-capitalize w3-border-0 w3-ripple" />
										</li>
									</ul>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	CKEDITOR.replace('desc');
</script>