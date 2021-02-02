<ul class="nav nav-tabs">
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-profile') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('client-profile'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-profile') !== false){echo 'w3-text-teal';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="user">
								<path d="M9 11.041v-0.825c1.102-0.621 2-2.168 2-3.716 0-2.485 0-4.5-3-4.5s-3 2.015-3 4.5c0 1.548 0.898 3.095 2 3.716v0.825c-3.392 0.277-6 1.944-6 3.959h14c0-2.015-2.608-3.682-6-3.959z"></path>
							</svg>
							<span>my profile</span>
						</a>
					</li>
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings') !== false || strpos($_SESSION['hores_current_link'],'add-booking') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('client-bookings/all/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings') !== false || strpos($_SESSION['hores_current_link'],'add-booking') !== false){echo 'w3-text-teal';} ?>">
							<svg viewBox="0 0 16 16" class="svg-icon icon-margin-right" data-info="calendar">
								<path d="M5 6h2v2h-2zM8 6h2v2h-2zM11 6h2v2h-2zM2 12h2v2h-2zM5 12h2v2h-2zM8 12h2v2h-2zM5 9h2v2h-2zM8 9h2v2h-2zM11 9h2v2h-2zM2 9h2v2h-2zM13 0v1h-2v-1h-7v1h-2v-1h-2v16h15v-16h-2zM14 15h-13v-11h13v11z"></path>
							</svg>
							<span>my bookings</span>
						</a>
					</li>
				</ul>