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
						<?php $this->load->view('pages/client_bookings_navigation'); ?>
						<div class="tab-content site-border-left site-border-right site-border-bottom padding-10">
							<div class="tab-pane fade in active">
								<?php
								if(isset($_SESSION['cancel_booking_success']))
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
								<span><?php echo $_SESSION['cancel_booking_success']; ?></span>
							</p>
							</div>
									<?php
								}
								elseif(isset($_SESSION['cancel_booking_error']))
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
								<span><?php echo $_SESSION['cancel_booking_error']; ?></span>
							</p>
							</div>
									<?php
								}

								?>
								<!--block start-->
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
												<th class="text-center">cancel</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($bookings as $booking)
											{
												?>
												<tr class="text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/starred') !== false){echo 'starred-row';} ?>">
													<td class="text-center">
														<svg class="svg-icon w3-large star-btn w3-ripple <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/starred') !== false){echo 'starred-item';} ?>" data-state="<?php if(strcmp($booking['starred'],'yes') === 0){echo 1;}elseif(strcmp($booking['starred'],'no') === 0){echo 0;} ?>" data-table="hores_bookings" data-column="booking_id" data-id="<?php echo $booking['booking_id']; ?>">
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
													//get room details
													$room = $this->main_model->check_room_id($booking['room_id']);
													if(!empty($room))
													{
														?>
														<span><?php echo $room['type']; ?></span><a href="<?php echo site_url('room-details/'.$booking['room_id']); ?>" class="w3-btn w3-ripple w3-round-large w3-teal text-capitalize">
															<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right white-icon" data-info="eye">
																<path d="M8 3c-3.489 0-6.514 2.032-8 5 1.486 2.968 4.511 5 8 5s6.514-2.032 8-5c-1.486-2.968-4.511-5-8-5zM11.945 5.652c0.94 0.6 1.737 1.403 2.335 2.348-0.598 0.946-1.395 1.749-2.335 2.348-1.181 0.753-2.545 1.152-3.944 1.152s-2.763-0.398-3.945-1.152c-0.94-0.6-1.737-1.403-2.335-2.348 0.598-0.946 1.395-1.749 2.335-2.348 0.061-0.039 0.123-0.077 0.185-0.114-0.156 0.427-0.241 0.888-0.241 1.369 0 2.209 1.791 4 4 4s4-1.791 4-4c0-0.481-0.085-0.942-0.241-1.369 0.062 0.037 0.124 0.075 0.185 0.114v0zM8 6.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5 0.672-1.5 1.5-1.5 1.5 0.672 1.5 1.5z"></path>
															</svg>
															<span>view</span>
														</a>
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
													<td class="text-center">
														<?php
														//check if status confirmed
														if(strcmp($booking['status'],'confirmed') === 0)
														{
															echo "-";
														}
														else
														{
															?>
															<button class="w3-btn w3-ripple w3-round-large w3-red text-capitalize" data-id="<?php echo $booking['booking_id']; ?>" onclick="document.getElementById('cancel-booking').style.display = 'block';document.getElementById('cancel-booking-btn').setAttribute('href','<?php echo site_url('cancel-booking/') ?>'+this.getAttribute('data-id'));">
																<svg viewBox="0 0 16 16" class="svg-icon white-icon icon-margin-right" data-info="cancel">
																	<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
																</svg>
																<span>cancel</span>
															</button>
															<?php
														}
														?>
													</td>
												</tr>
												<?php
											}
											?>
										</tbody>
										<tfoot>
											<tr class="text-capitalize">
												<th class="text-center">star</th>
												<th>#</th>
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
												<th class="text-center">cancel</th>
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
								<!--block end-->
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-sm-2"></div>
	</div>
</div>
<div id="cancel-booking" class="w3-modal w3-animate-zoom">
	<div class="w3-modal-content material-background w3-round-large">
		<p class="text-right padding-10">
				<a class="w3-btn w3-ripple w3-circle" onclick="document.getElementById('cancel-booking').style.display = 'none';">
					<svg viewBox="0 0 16 16" class="svg-icon" data-info="cancel">
						<path d="M15.854 12.854c-0-0-0-0-0-0l-4.854-4.854 4.854-4.854c0-0 0-0 0-0 0.052-0.052 0.090-0.113 0.114-0.178 0.066-0.178 0.028-0.386-0.114-0.529l-2.293-2.293c-0.143-0.143-0.351-0.181-0.529-0.114-0.065 0.024-0.126 0.062-0.178 0.114 0 0-0 0-0 0l-4.854 4.854-4.854-4.854c-0-0-0-0-0-0-0.052-0.052-0.113-0.090-0.178-0.114-0.178-0.066-0.386-0.029-0.529 0.114l-2.293 2.293c-0.143 0.143-0.181 0.351-0.114 0.529 0.024 0.065 0.062 0.126 0.114 0.178 0 0 0 0 0 0l4.854 4.854-4.854 4.854c-0 0-0 0-0 0-0.052 0.052-0.090 0.113-0.114 0.178-0.066 0.178-0.029 0.386 0.114 0.529l2.293 2.293c0.143 0.143 0.351 0.181 0.529 0.114 0.065-0.024 0.126-0.062 0.178-0.114 0-0 0-0 0-0l4.854-4.854 4.854 4.854c0 0 0 0 0 0 0.052 0.052 0.113 0.090 0.178 0.114 0.178 0.066 0.386 0.029 0.529-0.114l2.293-2.293c0.143-0.143 0.181-0.351 0.114-0.529-0.024-0.065-0.062-0.126-0.114-0.178z"></path>
					</svg>
				</a>
			</p>
			<header class="material-dark">
				<h2 class="text-capitalize roboto-bold lined-header">
					<span>cancel booking</span>
				</h2>
			</header>
			<div class="w3-container">
				<p class="text-center roboto-bold">
					<span>Do you want to cancel this booking?</span>
				</p>
				<p class="text-center">
					<a id="cancel-booking-btn" class="w3-btn w3-round-large w3-ripple text-capitalize w3-hover-text-teal icon-margin-right">
						<span>yes</span>
					</a>
					<button class="w3-btn w3-round-large w3-ripple text-capitalize w3-hover-text-teal" onclick="document.getElementById('cancel-booking').style.display = 'none';">
						<span>no</span>
					</button>
				</p>
			</div>
	</div>
</div>