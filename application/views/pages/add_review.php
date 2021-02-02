<div class="page-container padding-10">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-3"></div>
		<div class="col-sm-6">
			<div class="w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<?php echo form_open('new-review','name="add-review-form" id="add-review-form" autocomplete="off"'); ?>
				<?php
				if(isset($_SESSION['review_empty']))
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
								<span><?php echo $_SESSION['review_empty']; ?></span>
							</p>
							</div>
					<?php
				}
				elseif(isset($_SESSION['add_review_error']))
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
								<span><?php echo $_SESSION['add_review_error']; ?></span>
							</p>
							</div>
					<?php
				}
				elseif(isset($_SESSION['add_review_success']))
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
								<span><?php echo $_SESSION['add_review_success']; ?></span>
							</p>
							</div>
					<?php
				}
				?>
					<ul class="list-unstyled">
						<li>
							<span class="text-capitalize icon-margin-right">room</span><span class="w3-text-red">*</span>
						</li>
						<li>
							<select name="room-id" class="form-control no-bg w3-margin-bottom w3-round-large input-lg site-border">
								<?php
														if(isset($target_room))
														{
															?>
															<option value="<?php echo $target_room['room_id']; ?>"><?php echo ucwords($target_room['type']); ?></option>
															<?php
														}
														else
														{
															//block start
															if(isset($_SESSION['room_id_temp']))
														{
															//get room details
															$room = $this->main_model->check_room_id($_SESSION['room_id_temp']);
															if(!empty($room))
															{
																?>
																<option value="<?php echo $room['room_id']; ?>"><?php echo ucwords($room['type']); ?></option>
																<?php
															}
														}
														//block end
														}
														
														if(!empty($rooms))
														{
															foreach($rooms as $room)
															{
																?>
																<option value="<?php echo $room['room_id']; ?>"><?php echo ucwords($room['type']); ?></option>
																<?php
															}
														}
														?>
							</select>
						</li>
						<li>
							<span class="text-capitalize">rating</span>
						</li>
						<li>
							<span>
								<svg viewBox="0 0 16 16" id="rating-btn1" class="svg-icon icon-margin-right w3-xlarge w3-ripple rating-btn" data-info="star-empty" data-state="0">
											<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
										</svg>
										<svg viewBox="0 0 16 16" id="rating-btn2" class="svg-icon icon-margin-right w3-xlarge w3-ripple rating-btn" data-info="star-empty" data-state="0">
											<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
										</svg>
										<svg viewBox="0 0 16 16" id="rating-btn3" class="svg-icon icon-margin-right w3-xlarge w3-ripple rating-btn" data-info="star-empty" data-state="0">
											<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
										</svg>
										<svg viewBox="0 0 16 16" id="rating-btn4" class="svg-icon icon-margin-right w3-xlarge w3-ripple rating-btn" data-info="star-empty" data-state="0">
											<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
										</svg>
										<svg viewBox="0 0 16 16" id="rating-btn5" class="svg-icon icon-margin-right w3-xlarge w3-ripple rating-btn" data-info="star-empty" data-state="0">
											<path d="M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z"></path>
										</svg>
							</span>
						</li>
						<li>
							<span class="text-capitalize icon-margin-right">review</span><span class="w3-text-red">*</span>
						</li>
						<li>
							<textarea name="review" class="form-control w3-round-large no-bg w3-margin-bottom <?php if(isset($_SESSION['review_empty'])){echo 'w3-border-red';} ?>" maxlength="250" required placeholder="Review"><?php if(isset($_SESSION['review_temp'])){echo $_SESSION['review_temp'];} ?></textarea>
						</li>
						<li>
							<input type="hidden" name="r-rating" id="r-rating" value="0" />
							<input type="hidden" name="add-review-sys-id" value="<?php echo $sys_id; ?>" />
							<input type="submit" name="add-review-btn" value="submit" class="form-control w3-margin-bottom w3-round-large input-lg w3-blue text-capitalize w3-border-0 w3-ripple" />
						</li>
					</ul>
					<p class="text-center w3-margin-bottom">
						<a href="<?php echo site_url('home'); ?>" class="w3-btn w3-round-large text-capitalize w3-ripple w3-hover-text-teal">
							<span>back to rooms</span>
						</a>
					</p>
				</form>
			</div>
		</div>
		<div class="col-sm-3"></div>
	</div>
</div>
