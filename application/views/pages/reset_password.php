<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php echo form_open('process-reset-password','name="reset-password-form" id="reset-password-form" autocomplete="off"'); ?>
					<ul class="list-unstyled">
						<li>
							<label class="switch pull-right w3-margin-bottom toggle-pass">
								<input type="checkbox" class="hidden pass-checkbox" />
								<span class="slider round"></span>
							</label>
							<span class="text-capitalize pull-right w3-margin-bottom icon-margin-right">show password</span>
						</li>
						<li>
							<input type="password" name="pass1" class="form-control no-bg w3-margin-bottom w3-round-large input-lg pass-input" maxlength="15" autocomplete="off" autofocus="on" required placeholder="New Password" />
						</li>
						<li>
							<input type="password" name="pass2" class="form-control no-bg w3-margin-bottom w3-round-large input-lg pass-input" maxlength="15" autocomplete="off" required placeholder="Confirm Password" />
						</li>
					</ul>
					<p class="text-center w3-margin-bottom">
						<a href="<?php echo site_url('login'); ?>" class="w3-btn w3-round-large text-capitalize w3-ripple w3-hover-text-teal">
							<span>back to login</span>
						</a>
					</p>
				</form>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>