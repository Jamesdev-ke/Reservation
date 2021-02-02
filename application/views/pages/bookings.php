<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-12 w3-round-large">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<ul class="nav nav-tabs">
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/all') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('bookings/all/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/all') !== false){echo 'w3-text-teal';} ?>">
							<span>all bookings</span>
						</a>
					</li>
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/starred') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('bookings/starred/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/starred') !== false){echo 'w3-text-teal';} ?>">
							<span>starred bookings</span>
						</a>
					</li>
				</ul>
				<div class="tab-content site-border-left site-border-right site-border-bottom padding-10">
					<div class="tab-pane fade in active">
						<div id="content-area" class="content-container w3-margin-top">
							<?php
							if(!empty($bookings))
							{
								?>
								<h4 class="text-capitalize roboto-bold text-right icon-margin-right">
									<span>total records:</span>
									<span><?php echo $total_bookings; ?></span>
								</h4>
								<div class="table-responsive">
									<table id="j-table" class="table table-condensed table-bordered" >
										<thead>
											<tr class="text-capitalize">
												<th class="text-center">star</th>
												<th>#</th>
												<th>client</th>
												<th>room type</th>
												<th>rooms booked</th>
												<th>guests</th>
												<th>days</th>
												<th>total charges</th>
												<th>mode of payment</th>
												<th>check in</th>
												<th>check out</th>
												<th>booking date</th>
												<th>status</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($bookings as $booking)
											{
												?>
												<tr class="text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/starred') !== false){echo 'starred-row';} ?>">
													<td class="text-center">
														<svg class="svg-icon w3-large star-btn w3-ripple <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'bookings/starred') !== false){echo 'starred-item';} ?>" data-state="<?php if(strcmp($booking['starred'],'yes') === 0){echo 1;}elseif(strcmp($booking['starred'],'no') === 0){echo 0;} ?>" data-table="hores_bookings" data-column="booking_id" data-id="<?php echo $booking['booking_id']; ?>">
																	<?php
																	if(strcmp($booking['starred'],'yes') === 0)
																	{
																		?>
																		<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z"></path>
																		<?php
																	}
																	elseif(strcmp($booking['starred'],'no') === 0)
																	{
																		?>
																		<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
																		<?php
																	}
																	?>
																</svg>
													</td>
													<td><?php echo $booking['id']; ?></td>
													<td><?php
													//get client details
													$client = $this->main_model->check_client_id($booking['client_id']);
													if(!empty($client))
													{
														echo $client['name'];
													}
													else
													{
														echo "-";
													}
													 ?></td>
													<td><?php
													//get room details
													$room = $this->main_model->check_room_id($booking['room_id']);
													if(!empty($room))
													{
														?>
														<span><?php echo $room['type']; ?></span>
														<?php
													}
													else
													{
														echo "-";
													}
												 	?></td>
													<td><?php echo $booking['rooms_booked']; ?></td>
													<td><?php echo $booking['guests']; ?></td>
													<td><?php echo $booking['days']; ?></td>
													<td><?php echo $booking['total_charges']; ?></td>
													<td><?php echo $booking['payment_mode']; ?></td>
													<td><?php echo $booking['check_in_date']." ".$booking['check_in_time']; ?></td>
													<td><?php echo $booking['check_out_date']." ".$booking['check_out_time']; ?></td>
													<td><?php echo $booking['booking_date']." ".$booking['booking_time']; ?></td>
													<td><?php echo $booking['status']; ?></td>
												</tr>
												<?php
											}
											?>
										</tbody>
										<tfoot>
											<tr class="text-capitalize">
												<th class="text-center">star</th>
												<th>#</th>
												<th>client</th>
												<th>room type</th>
												<th>rooms booked</th>
												<th>guests</th>
												<th>days</th>
												<th>total charges</th>
												<th>mode of payment</th>
												<th>check in</th>
												<th>check out</th>
												<th>booking date</th>
												<th>status</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="w3-center">
									<?php echo $links; ?>
								</div>
								<h4 class="text-capitalize roboto-bold text-right icon-margin-right">
									<span>total records:</span>
									<span><?php echo $total_bookings; ?></span>
								</h4>
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
								<span>Sorry,no bookings found.</span>
								</p>
								<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>