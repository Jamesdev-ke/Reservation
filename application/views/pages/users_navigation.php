<ul class="nav nav-tabs">
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/all') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/all/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/all') !== false){echo 'w3-text-teal';} ?>">
			<span>all users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/starred') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/starred/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/starred') !== false){echo 'w3-text-teal';} ?>">
			<span>starred users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/active') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/active/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/active') !== false){echo 'w3-text-teal';} ?>">
			<span>active users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/inactive') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/inactive/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/inactive') !== false){echo 'w3-text-teal';} ?>">
			<span>inactive users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/online') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/online/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/online') !== false){echo 'w3-text-teal';} ?>">
			<span>online users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/offline') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('users/offline/0'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'users/offline') !== false){echo 'w3-text-teal';} ?>">
			<span>offline users</span>
		</a>
	</li>
	<li <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-user') !== false){echo "class='active'";} ?>>
		<a href="<?php echo site_url('add-user'); ?>" class="text-capitalize w3-hover-text-teal <?php if(isset($_SESSION['hores_current_link']) && strpos($_SESSION['hores_current_link'],'add-user') !== false){echo 'w3-text-teal';} ?>">
			<span>add user</span>
		</a>
	</li>
</ul>