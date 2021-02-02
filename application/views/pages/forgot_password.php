<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php echo form_open('process-forgot-password','name="forgot-password-form" id="forgot-password-form" autocomplete="off"'); ?>
					<ul class="list-unstyled">
						<li>
							<input type="email" name="email" class="form-control no-bg w3-margin-bottom w3-round-large input-lg" maxlength="50" required autocomplete="off" autofocus="on" placeholder="Email" />
						</li>
						<li>
							<input type="hidden" name="forgot-pass-sys-id" value="<?php echo $sys_id; ?>" />
							<input type="submit" name="forgot-pass-btn" value="submit" class="form-control w3-margin-bottom w3-round-large input-lg w3-blue text-capitalize w3-border-0 w3-ripple" />
						</li>
					</ul>
					<p class="text-center w3-margin-bottom">
						<a href="<?php echo site_url('client-login'); ?>" class="w3-btn w3-round-large text-capitalize w3-ripple w3-hover-text-teal">
							<span>back to login</span>
						</a>
					</p>
				</form>
			</div>
		</div>
		<div class="col-sm-4"></div>
	</div>
</div>