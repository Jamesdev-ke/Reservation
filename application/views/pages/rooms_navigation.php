<ul class="nav nav-tabs">
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/all') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('rooms/all/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/all') !== false){echo 'w3-text-teal';} ?>">
							<span>all rooms</span>
						</a>
					</li>
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/starred') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('rooms/starred/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'rooms/starred') !== false){echo 'w3-text-teal';} ?>">
							<span>starred rooms</span>
						</a>
					</li>
					<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-room') !== false){echo "class='active'";} ?>>
						<a href="<?php echo site_url('add-room'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-room') !== false){echo 'w3-text-teal';} ?>">
							<span>add room</span>
						</a>
					</li>
				</ul>