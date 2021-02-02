<div class="page-container w3-container">
	<div class="row w3-margin-top w3-margin-bottom">
		<div class="col-sm-1"></div>
		<div class="col-sm-10 w3-container w3-border-red w3-round-large">
			<div class="w3-border-0 w3-round-large content-container" data-aos="fade-right">
				<h1 class="text-capitalize roboto-bold text-center">
					<span><?php echo $page_heading; ?></span>
				</h1>
				<hr>
				<div class="w3-container w3-margin-top">
					<p class="text-center text-capitalize w3-jumbo roboto-bold">
						<span>no access</span>
					</p>
					<p class="text-center w3-large roboto-bold">
						<svg viewBox="0 0 16 16" class="svg-icon-50" data-info="alert-circle">
								<path d="M8 1.5c-1.736 0-3.369 0.676-4.596 1.904s-1.904 2.86-1.904 4.596c0 1.736 0.676 3.369 1.904 4.596s2.86 1.904 4.596 1.904c1.736 0 3.369-0.676 4.596-1.904s1.904-2.86 1.904-4.596c0-1.736-0.676-3.369-1.904-4.596s-2.86-1.904-4.596-1.904zM8 0v0c4.418 0 8 3.582 8 8s-3.582 8-8 8c-4.418 0-8-3.582-8-8s3.582-8 8-8zM7 11h2v2h-2zM7 3h2v6h-2z"></path>
							</svg>
							<br>
						<span>Sorry, you are not authorized to access this content [<span class="text-capitalize w3-text-blue"><?php if(isset($_SESSION['page_denied'])){echo $_SESSION['page_denied'];} ?></span>]. Please contact the System Administrator.</span>
					</p>
				</div>
			</div>
		</div>
		<div class="col-sm-1"></div>
	</div>
</div>