<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div  class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="w3-round-large content-container  padding-10" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php
				if(!empty($room_details))
				{
					?>
					<div class="owl-carousel owl-theme">
						<?php
						foreach($room_images as $image)
						{
							?>
							<div class="item">
								<img src="<?php echo base_url().$image['room_image']; ?>" class="img-responsive" />
							</div>
							<?php
						}
						?>
					</div>
					<p>
						<?php
					if(!isset($_SESSION['hores_userid']))
					{
						?>
						<a href="<?php echo site_url('add-booking/'.$room_details['room_id']); ?>" class="w3-btn w3-deep-orange w3-round-large text-capitalize">
							<span>book now</span>
						</a>
						<?php
					}
					?>
					</p>
					<h2 class="roboto-bold text-capitalize">
						<span>description</span>
					</h2>
					<div id="editor-content" class="w3-large" data-info="<?php echo $room_details['description']; ?>"></div>
					<h3 class="roboto-bold text-capitalize">
						<span>room capacity</span>
					</h3>
					<p class="w3-large"><?php echo $room_details['capacity']; ?></p>
					<h3 class="roboto-bold text-capitalize">
						<span>available rooms</span>
					</h3>
					<p class="w3-large"><?php echo $room_details['available']; ?></p>
					<h3 class="roboto-bold text-capitalize">
						<span>daily charges</span>
					</h3>
					<p class="w3-large"><?php echo "Ksh.".number_format($room_details['charges'],2); ?></p>
					<h3 class="roboto-bold text-capitalize">
						<span>reviews and ratings</span>
					</h3>
					<div class="reviews">
						<a href="<?php echo site_url('add-review/'.$room_details['room_id']); ?>" class="w3-btn w3-orange w3-round-large text-capitalize">
							<span>add review</span>
						</a>
						<?php
						if(!empty($reviews))
						{
							foreach($reviews as $review)
							{
								?>
								<div>
									<h5 class="text-capitalize roboto-bold" style="margin-left:10px;">
										<span><?php
										//get client name
										$client = $this->main_model->check_client_id($review['client_id']);
										if(!empty($client))
										{
											echo $client['name'];
										}
										else
										{
											echo "-";
										}
										 ?></span>
									</h5>
									<p>
										<span>
											<span class="icon-margin-right">
												<?php
												if($review['rating'] != 0)
												{
													for($i = 0; $i < $review['rating']; $i++)
													{
														?>
														<svg viewBox="0 0 16 16" class="svg-icon gold-icon icon-margin-right">
																			<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z"></path>
																		</svg>
														<?php
													}
												}
												?>
											</span>
											<span><?php echo $review['review_date']; ?></span>
										</span><br>
										<span></span>
										<?php echo $review['review']; ?></p>
								</div>
								<?php
							}
						}
						else
						{
							?>
							<p>No reviews yet.</p>
							<?php
						}
						?>
					</div>
					<?php
				}
				else
				{
					?>
					<p class="text-center w3-large roboto-bold">
								<svg viewBox="0 0 16 16" class="svg-icon-50" data-info="alert-circle">
									<path d="M8 1.5c-1.736 0-3.369 0.676-4.596 1.904s-1.904 2.86-1.904 4.596c0 1.736 0.676 3.369 1.904 4.596s2.86 1.904 4.596 1.904c1.736 0 3.369-0.676 4.596-1.904s1.904-2.86 1.904-4.596c0-1.736-0.676-3.369-1.904-4.596s-2.86-1.904-4.596-1.904zM8 0v0c4.418 0 8 3.582 8 8s-3.582 8-8 8c-4.418 0-8-3.582-8-8s3.582-8 8-8zM7 11h2v2h-2zM7 3h2v6h-2z"></path>
								</svg>
								<br>
								<span>Sorry,no room found.</span>
								</p>
					<?php
				}
				 ?>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>