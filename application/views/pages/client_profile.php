<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php $this->load->view('pages/client_navigation'); ?>
				<div class="tab-content site-border-left site-border-right site-border-bottom padding-10">
					<div class="tab-pane fade in active">
						<div class="row">
							<div class="col-sm-6">
								<ul class="list-unstyled">
									<li>
										<span class="text-capitalize w3-small">title</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['title']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">name</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['name']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">email</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['email']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">phone</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['phone']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">company</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['company']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">address</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['address']; ?></span>
									</li>
								</ul>
							</div>
							<div class="col-sm-6">
								<ul class="list-unstyled">
									<li>
										<span class="text-capitalize w3-small">city</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['city']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">country</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['country']; ?></span>
									</li>
									<li>
										<span class="text-capitalize w3-small">preferences</span>
									</li>
									<li>
										<span class="roboto-bold text-capitalize w3-large"><?php echo $client_details['preferences']; ?></span>
									</li>
									<li>
										<!--
										<a href="<?php echo site_url('edit-profile'); ?>" class="w3-btn w3-green w3-round-large text-capitalize w3-margin-top">
											<span>edit profile</span>
										</a>-->
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>