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
						<div id="content-area" class="content-container w3-margin-top">
							<?php
							if(!empty($rooms))
							{
								?>
								<h4 class="text-capitalize roboto-bold text-right icon-margin-right">
									<span>total records:</span>
									<span><?php echo $total_rooms; ?></span>
								</h4>
								<div class="table-responsive">
									<table id="j-table" class="table table-condensed table-bordered" >
										<thead>
											<tr class="text-capitalize">
												<th class="text-center">star</th>
												<th>#</th>
												<th>room type</th>
												<th>room capacity</th>
												<th>total rooms</th>
												<th>available rooms</th>
												<th>daily charges</th>
												<th>date added</th>
												<th class="text-center">details</th>
											</tr>
										</thead>
										<tbody>
											<?php
											foreach($rooms as $room)
											{
												?>
												<tr class="text-capitalize <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/starred') !== false){echo 'starred-row';} ?>">
													<td class="text-center">
														<svg class="svg-icon w3-large star-btn w3-ripple <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/starred') !== false){echo 'starred-item';} ?>" data-state="<?php if(strcmp($room['starred'],'yes') === 0){echo 1;}elseif(strcmp($room['starred'],'no') === 0){echo 0;} ?>" data-table="hores_rooms" data-column="room_id" data-id="<?php echo $room['room_id']; ?>">
																	<?php
																	if(strcmp($room['starred'],'yes') === 0)
																	{
																		?>
																		<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z"></path>
																		<?php
																	}
																	elseif(strcmp($room['starred'],'no') === 0)
																	{
																		?>
																		<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
																		<?php
																	}
																	?>
																</svg>
													</td>
													<td><?php echo $room['id']; ?></td>
													<td><?php echo $room['type']; ?></td>
													<td><?php echo $room['capacity']; ?></td>
													<td><?php echo $room['total']; ?></td>
													<td><?php echo $room['available']; ?></td>
													<td><?php echo $room['charges'];?></td>
													<td><?php echo $room['date_added']." ".$room['time_added']; ?></td>
													<td class="text-center">
														<a href="<?php echo site_url('room-details/'.$room['room_id']); ?>" class="w3-btn w3-ripple w3-round-large w3-teal text-capitalize">
															<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right white-icon" data-info="eye">
																<path d="M8 3c-3.489 0-6.514 2.032-8 5 1.486 2.968 4.511 5 8 5s6.514-2.032 8-5c-1.486-2.968-4.511-5-8-5zM11.945 5.652c0.94 0.6 1.737 1.403 2.335 2.348-0.598 0.946-1.395 1.749-2.335 2.348-1.181 0.753-2.545 1.152-3.944 1.152s-2.763-0.398-3.945-1.152c-0.94-0.6-1.737-1.403-2.335-2.348 0.598-0.946 1.395-1.749 2.335-2.348 0.061-0.039 0.123-0.077 0.185-0.114-0.156 0.427-0.241 0.888-0.241 1.369 0 2.209 1.791 4 4 4s4-1.791 4-4c0-0.481-0.085-0.942-0.241-1.369 0.062 0.037 0.124 0.075 0.185 0.114v0zM8 6.5c0 0.828-0.672 1.5-1.5 1.5s-1.5-0.672-1.5-1.5 0.672-1.5 1.5-1.5 1.5 0.672 1.5 1.5z"></path>
															</svg>
															<span>view</span>
														</a>
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
												<th>room capacity</th>
												<th>total rooms</th>
												<th>available rooms</th>
												<th>daily charges</th>
												<th>date added</th>
												<th class="text-center">details</th>
											</tr>
										</tfoot>
									</table>
								</div>
								<div class="w3-center">
									<?php echo $links; ?>
								</div>
								<h4 class="text-capitalize roboto-bold text-right icon-margin-right">
									<span>total records:</span>
									<span><?php echo $total_rooms; ?></span>
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
								<span>Sorry,no rooms found.</span>
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