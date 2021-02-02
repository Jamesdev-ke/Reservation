<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php echo form_open('process-login','name="login-form" id="login-form" autocomplete="off"'); ?>
				<?php 
				if(isset($_SESSION['email_empty']))
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
				elseif(isset($_SESSION['pass_empty']))
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
								<span><?php echo $_SESSION['pass_empty']; ?></span>
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
				elseif(isset($_SESSION['invalid_credentials']))
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
								<span><?php echo $_SESSION['invalid_credentials']; ?></span>
							</p>
							</div>
					<?php
				}
				elseif(isset($_SESSION['login_msg']))
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
								<span><?php echo $_SESSION['login_msg']; ?></span>
							</p>
							</div>
					<?php
				}
				?>
					<ul class="list-unstyled">
						<li>
							<span class="text-capitalize">email</span>
						</li>
						<li>
							<input type="text" name="email" class="form-control no-bg w3-margin-bottom w3-round-large input-lg <?php if(isset($_SESSION['email_empty']) || isset($_SESSION['email_invalid']) || isset($_SESSION['invalid_credentials'])){echo 'w3-border-red';} ?>" maxlength="50" required autocomplete="off" placeholder="Email" autofocus="on" value="<?php if(isset($_SESSION['email_temp'])){echo $_SESSION['email_temp'];} ?>" />
						</li>
						<li>
							<label class="switch pull-right w3-margin-bottom toggle-pass">
								<input type="checkbox" class="hidden pass-checkbox" />
								<span class="slider round"></span>
							</label>
							<span class="text-capitalize pull-right w3-margin-bottom icon-margin-right">show password</span>
						</li>
						<li>
							<span class="text-capitalize">password</span>
						</li>
						<li>
							<input type="password" name="pass" class="form-control no-bg w3-margin-bottom w3-round-large input-lg pass-input <?php if(isset($_SESSION['pass_empty']) || isset($_SESSION['invalid_credentials'])){echo 'w3-border-red';} ?>" maxlength="15" required autocomplete="off" placeholder="Password" value="<?php if(isset($_SESSION['pass_temp'])){echo $_SESSION['pass_temp'];} ?>" />
						</li>
						<li>
							<input type="hidden" name="login-sys-id" value="<?php echo $sys_id; ?>" />
							<input type="hidden" name="utype-id" value="<?php echo $utype_id; ?>" />
							<input type="submit" name="login-btn" value="login" class="form-control w3-margin-bottom w3-round-large input-lg w3-teal text-capitalize w3-border-0 w3-ripple" />
						</li>
					</ul>
					<p class="text-center w3-margin-bottom">
						<a href="<?php echo site_url('client-login'); ?>" class="w3-btn w3-round-large text-capitalize w3-ripple w3-hover-text-teal">
							<span>forgot password? reset it</span>
						</a>
					</p>
				</form>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>