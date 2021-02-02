<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-2"></div>
		<div class="col-sm-8">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php
				if(!empty($rooms))
				{
					?>
					<div class="w3-margin-bottom w3-margin-top content-container article-container">
						<?php
						foreach($rooms as $room)
						{
							?>
							<div class="site-border w3-round-large content-container article-item">
								<a href="<?php echo site_url('room-details/'.$room['room_id']); ?>" class="w3-ripple w3-hover-text-teal article-link">
									<img src="<?php echo base_url().$room['room_image_thumb']; ?>" class="img-responsive article-img" loading="lazy" width="330" height="186" />
									<div class="padding-10">
									<h4 class="text-capitalize roboto-bold">
										<span><?php echo $room['type']; ?></span>
									</h4>
									<p class="text-capitalize">
										<span class="icon-margin-right">room capacity:</span><span class="roboto-bold"><?php echo $room['capacity']; ?></span>
									</p>
									<p class="text-capitalize">
										<span class="icon-margin-right">available rooms:</span><span class="roboto-bold"><?php echo $room['available']; ?></span>
									</p>
								</div>
								</a>
							</div>
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
								<span>Sorry,no rooms found.</span>
								</p>
					<?php
				}
				?>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>