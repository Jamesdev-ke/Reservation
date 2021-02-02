<ul class="nav nav-tabs">
							<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/all') !== false){echo "class='active'";} ?>>
								<a href="<?php echo site_url('client-bookings/all/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/all') !== false){echo 'w3-text-teal';} ?>">
									<span>all bookings</span>
								</a>
							</li>
							<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/starred') !== false){echo "class='active'";} ?>>
								<a href="<?php echo site_url('client-bookings/starred/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'client-bookings/starred') !== false){echo 'w3-text-teal';} ?>">
									<span>starred bookings</span>
								</a>
							</li>
							<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-booking') !== false){echo "class='active'";} ?>>
								<a href="<?php echo site_url('add-booking/new'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-booking') !== false){echo 'w3-text-teal';} ?>">
									<span>new booking</span>
								</a>
							</li>
						</ul>