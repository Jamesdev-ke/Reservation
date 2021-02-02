<?php
const rows1 = 25;
const rows2 = 50;
const rows3 = 100;
const rows4 = 250;
const rows5 = 500;
const rows6 = 1000;
 ?>
<!doctype html>
<html>
<head>
	<title><?php echo $title; ?></title>
	<meta charset="utf-8" />
	<meta name="author" content="lauvic systems" />
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<meta name="viewport" content="width=device-width,initial-scale=1" />
	<link rel="preload" as="font" href="<?php echo base_url(); ?>assets/styles/fonts/Roboto-Regular.ttf" type="font/ttf" crossorigin="anonymous" />
	<link rel="preload" as="font" href="<?php echo base_url(); ?>assets/styles/fonts/Roboto-Bold.ttf" type="font/ttf" crossorigin="anonymous" />
	<link rel="preload" as="font" href="<?php echo base_url(); ?>assets/styles/fonts/Elianto-Regular.ttf" type="font/ttf" crossorigin="anonymous" />
	<link rel="preload" as="font" href="<?php echo base_url(); ?>assets/styles/fonts/Lato-Regular.ttf" type="font/ttf" crossorigin="anonymous" />
	<link rel="preload" as="font" href="<?php echo base_url(); ?>assets/styles/fonts/Roboto-Italic.ttf" type="font/ttf" crossorigin="anonymous" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/bootstrap/css/bootstrap.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/w3/w3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/w3/w3-colors-flat.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/w3/w3-colors-metro.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/styles/w3/w3-colors-win8.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/aos-master/dist/aos.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/overlay-scrollbar/css/OverlayScrollbars.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/bootstrap-datepicker/css/bootstrap-datepicker3.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/timepicker/stylesheets/wickedpicker.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/select2/dist/css/select2.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/owlcarousel/styles/owl.carousel.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/owlcarousel/styles/owl.theme.default.min.css" />
	<link rel="stylesheet" href="<?php echo base_url(); ?>assets/summernote/summernote.min.css" />
	<link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url(); ?>apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url(); ?>favicon-32x32.png">
	<link rel="manifest" href="<?php echo base_url(); ?>site.webmanifest">
	<script src="<?php echo base_url(); ?>assets/scripts/jquery-3.4.1.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/styles/bootstrap/js/bootstrap.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/aos-master/dist/aos.js"></script>
	<script src="<?php echo base_url(); ?>assets/overlay-scrollbar/js/jquery.overlayScrollbars.js"></script>
	<script src="<?php echo base_url(); ?>assets/bootstrap-datepicker/js/bootstrap-datepicker.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/timepicker/src/wickedpicker.js"></script>
	<script src="<?php echo base_url(); ?>assets/select2/dist/js/select2.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/owlcarousel/scripts/owl.carousel.js"></script>
	<script src="<?php echo base_url(); ?>assets/summernote/summernote.min.js"></script>
	<script src="<?php echo base_url(); ?>assets/ckeditor/ckeditor.js"></script>
	<style>
		/*
			***hores btn color codes***
			delete -- w3-red
			add -- w3-blue
			upload -- w3-indigo
			update -- w3-green
			refresh/login - w3-teal
			download -- w3-blue-grey
			print -- w3-dark-grey
		*/
		:root
		{
			--material-bg:#f5f5f5;/*96%*/
			--material-dark:#f5f5f5;/*96%*/
			--material-dark-var:#ffffff;/*100%*/
			--main-col:#000000;/*0%*/
			--default-col:#262626;/*15%*/
			--site-border:#e3e3e3;/*89%*/
			--teal-col:#00b3a1;
		}
		@font-face
		{
			font-family:"Roboto Regular";
            font-weight:normal;
            font-style:normal;
            font-display:swap;
            src:local('Roboto Regular'),url("<?php echo base_url(); ?>assets/styles/fonts/Roboto-Regular.ttf") format("truetype");
		}
		@font-face
		{
			font-family:"Roboto Bold";
            font-weight:normal;
            font-style:normal;
            font-display:swap;
            src:local('Roboto Bold'),url("<?php echo base_url(); ?>assets/styles/fonts/Roboto-Bold.ttf") format("truetype");
		}
		@font-face
		{
			font-family:"Elianto Regular";
            font-weight:normal;
            font-style:normal;
            font-display:swap;
            src:local('Elianto Regular'),url("<?php echo base_url(); ?>assets/styles/fonts/Elianto-Regular.ttf") format("truetype");
		}
		@font-face
		{
			font-family:"Lato Regular";
            font-weight:normal;
            font-style:normal;
            font-display:swap;
            src:local('Lato Regular'),url("<?php echo base_url(); ?>assets/styles/fonts/Lato-Regular.ttf") format("truetype");
		}
		@font-face
		{
			font-family:"Roboto Italic";
			font-weight:normal;
            font-style:normal;
            font-display:swap;
            src:local('Roboto Italic'),url("<?php echo base_url(); ?>assets/styles/fonts/Roboto-Italic.ttf") format("truetype");
		}
		body
		{
			font-family:"Roboto Regular";
			color:var(--default-col);
		}
		.material-background
		{
			background:var(--material-bg) !important;
		}
		.material-dark,.select2-search__field
		{
			background:var(--material-dark) !important;
		}
		.material-dark-variant,.page-container,.select2-dropdown,.select2-container--default,.select2-selection--single
		{
			background:var(--material-dark-var) !important;
		}
		.main-color,.select2-selection__rendered,.select2-container--disabled
		{
			color:var(--main-col) !important;
		}
		.default-color
		{
			color:var(--default-col) !important;
		}
		.lato-regular
		{
			font-family: "Lato Regular";
		}
		.roboto-regular
		{
			font-family:"Roboto Regular";
		}
		.elianto-regular
		{
			font-family:"Elianto Regular";
		}
		.roboto-bold
		{
			font-family:"Roboto Bold";
		}
		.roboto-italic
		{
			font-family:"Roboto Italic";
		}
		.icon-margin-right
		{
			margin-right:5px;
		}
		.padding-10
		{
			padding:10px;
		}
		.site-name-color
		{
			color:#bf0040;
		}
		<?php 
			if(isset($_SESSION['hores_userid']))
			{
				?>
				@media screen and (min-width:768px){
					.page-container,#footer-container
					{
						margin-left:280px;
					}
				}
				#side-bar
				{
					width:280px;
				}
				<?php
			}
			else
			{
				?>
				#side-bar
				{
					width:0px !important;
				}
				<?php
			}
		?>
			#side-bar
			{
				top:60px;
				width:280px;
				height:calc(100% - 60px);
			}
			#side-bar-inner
			{
				border-right:1px solid var(--site-border);
			}
			.page-container
			{
				padding-top:65px;
			}
			#nav-header
			{
				position:fixed;
				z-index:2;
			}
			#nav-header,#mobile-nav-header
			{
				width:100%;
				height:60px;
			}
			#main-admin-search-form
			{
				display:inline-block;
				width:400px;
			}
			.admin-nav-profile-image
			{
				width:50px;
				height:50px;
				border-radius:50%;
			}
			@media screen and (max-width:768px){
				#side-bar
				{
					top:0px;
					width:calc(100% - 80px) !important;
					height:100%;
				}
				.side-link-btn
				{
					text-align:left !important;
				}
				.side-link-text
				{
					display:inline-block !important;
				}
			}
			@media screen and (max-width:1000px){
				.page-container,#footer-container
				{
					margin-left:0px !important;
				}
			}
			.modal-backdrop
			{
				z-index:-1;
			}
			.modal-dialog,.modal-content
			{
				background:var(--material-bg);
			}
			.close
			{
				color:var(--main-col) !important;
			}
			#cover-image-container
			{
				height:200px;
				background-size:cover;
				background-repeat:no-repeat;
			}
		.user-profile-image
		{
			width:100px;
			height:100px;
			border-radius:50%;
		}
		input[type="text"],input[type="password"],input[type="email"],textarea,input[type="search"],select,input[type="url"],input[type="number"],input[type="file"]
		{
			color:var(--main-col) !important;
			border:1px solid var(--site-border);
		}
		.w3-btn,.nav-btn
		{
			text-decoration:none !important;
		}
		.w3-text-teal,.w3-hover-text-teal:hover
		{
			color:var(--teal-col) !important;
		}
		.w3-hover-text-teal:hover
		{
			background:var(--material-dark) !important;
			border:1px solid var(--site-border) !important;
		}
		.nav-btn
		{
			color:var(--main-col) !important;
		}
		.site-border,.select2-container--default
		{
			border:1px solid var(--site-border) !important;
		}
		.site-border-left,.select2-dropdown
		{
			border-left:1px solid var(--site-border) !important;
		}
		.site-border-top
		{
			border-top:1px solid var(--site-border) !important;
		}
		.site-border-right,.select2-dropdown
		{
			border-right:1px solid var(--site-border) !important;
		}
		.site-border-bottom,.select2-dropdown
		{
			border-bottom:1px solid var(--site-border) !important;
		}
		.content-container,.nav-container,.page-container,#nav-header,#mobile-nav-header
		{
			overflow:hidden;
		}
		.nav-container
		{
			width:100%;
			padding:0px !important;
		}
		.content-img
		{
			width:100%;
			height:auto;
			object-fit:fill;
		}
		@media screen and (min-width:768px){
			.content-img
			{
				height:200px;
			}
		}
		/*
		lined header for forms
		*/
		.lined-header
		{
			display:flex;
			flex-direction:row;
			padding-left:20px;
			padding-right:20px;
		}
		.lined-header:before,.lined-header:after
		{
			content:"";
			flex: 1 1;
			border-bottom:1px solid var(--site-border);
			margin:auto;
		}
		#footer-container
		{
			background-image:url('<?php echo base_url(); ?>assets/media/background/map.png');
			background-attachment:fixed;
		}
		.no-bg
		{
			background:transparent;
		}
		textarea
		{
			height:150px !important;
			resize:none !important;
		}
		.border-radius-50
		{
			border-radius:50%;
		}
		.reviews-container
		{
			background: linear-gradient(to top right, #121212 0%, #009688 100%);
			height:250px;
		}
		.fixed-container
		{
			position:fixed;
			left:0;
			top:0;
			width:100%;
			height:100%;
			overflow:hidden;
			overflow-y:auto;
		}
		.flex-container
		{
			width:100%;
			height:100%;
			position:relative;
			display:flex;
			flex-direction:column;
			justify-content:center !important;
		}
		legend
		{
			width:auto;
			margin:auto;
			border:none;
		}
		.switch
		{
			position: relative;
    		display: inline-block;
    		width: 55px;
    		height: 24px;
		}
		.slider
		{
			position: absolute;
  			cursor: pointer;
    		top: 0;
  			left: 0;
  			right: 0;
  			bottom: 0;
  			background-color: #808080;
  			-webkit-transition: .4s;
  			transition: .4s;
		}
		.slider:before
		{
			position: absolute;
  			content: "";
  			height: 20px;
 			width: 20px;
  			left: 2px;
  			bottom: 2px;
  			background-color: white;
  			-webkit-transition: .4s;
  			transition: .4s;
		}
		input:checked + .slider
		{
			background-color: #2196F3;
		}
		input:focus + .slider
		{
			box-shadow: 0 0 1px #2196F3;
		}
		input:checked + .slider:before
		{
			-webkit-transform: translateX(32px);
  			-ms-transform: translateX(32px);
  			transform: translateX(32px);
		}
		.slider.round
		{
			border-radius:34px;
		}
		.slider.round:before
		{
			border-radius:50%;
		}
		.chat-container
		{
			height:300px !important;
		}
		#main-loader
		{
			position:fixed;
			left:0;
			top:0;
			width:100%;
			height:100%;
			background:rgba(0,0,0,0.8);
			z-index:3;
			display:none;
		}
		hr
		{
			border-top:1px solid var(--site-border) !important;
		}
		.svg-icon
		{
			width:1em;
			height:1em;
		}
		.svg-icon path
		{
			fill:var(--default-col)
		}
		.svg-icon-25
		{
			width:25px;
			height:25px;
		}
		.svg-icon-50
		{
			width:50px;
			height:50px;
		}
		.svg-icon-50 path
		{
			fill:var(--default-col);
		}
		#main-spinner
		{
			width:60px;
			height:60px;
			animation: spin 2s linear infinite;
		}
		.teal-icon path,.w3-hover-text-teal:hover path,.w3-text-teal path
		{
			fill:var(--teal-col);
		}
		.red-icon path
		{
			fill:#f44336;
		}
		.white-icon path
		{
			fill:#ffffff;
		}
		@keyframes spin {
    	0% { transform: rotate(0deg); }
    	100% { transform: rotate(360deg); }
		}
		.menu-container
		{
    		display: inline-block;
    		cursor: pointer;
		}
		.bar1, .bar2, .bar3
		{
    		width: 35px;
    		height: 5px;
    		background-color:var(--default-col);
    		margin: 5px 0;
    		transition: 0.4s;
		}
		.change .bar1
		{
    		-webkit-transform: rotate(-45deg) translate(-8px, 8px);
    		transform: rotate(-45deg) translate(-8px, 8px);
    		-ms-transform: rotate(-45deg) translate(-8px, 8px);
		}
		.change .bar2
		{
			opacity: 0;
		}
		.change .bar3
		{
    		-webkit-transform: rotate(45deg) translate(-6px, -6px);
    		transform: rotate(45deg) translate(-6px, -6px);
    		-ms-transform: rotate(45deg) translate(-6px, -6px);
    	}
    	table,tr,th,td,.table-responsive
    	{
    		border-color:var(--site-border) !important;
    	}
    	td
    	{
    		vertical-align:middle !important;
    	}
    	.text-decoration-none
    	{
    		text-decoration:none !important;
    	}
    	.social-links
    	{
    		transition:1s;
    	}
    	.social-links:hover
    	{
    		transform:rotateY(360deg);
    	}
		.checkbox-container
		{
    		display: block;
    		position: relative;
    		padding-left: 35px;
    		margin-bottom: 12px;
    		cursor: pointer;
    		-webkit-user-select: none;
    		-moz-user-select: none;
    		-ms-user-select: none;
    		user-select: none;
		}
		.checkbox-container input
		{
    		position: absolute;
    		opacity: 0;
    		cursor: pointer;
		}
		.checkmark
		{
    		position: absolute;
    		top: 0;
    		left: 0;
    		height: 25px;
    		width: 25px;
    		background-color: #ccc;
		}
		.checkbox-container:hover input ~ .checkmark
		{
    		background-color: #a6a6a6;
		}
		.checkbox-container input:checked ~ .checkmark
		{
    		background-color: #2196F3;
		}
		.checkmark:after
		{
    		content: "";
    		position: absolute;
    		display: none;
		}
		.checkbox-container input:checked ~ .checkmark:after
		{
    		display: block;
		}
		.checkbox-container .checkmark:after
		{
    		left: 9px;
    		top: 5px;
    		width: 5px;
    		height: 10px;
    		border: solid white;
    		border-width: 0 3px 3px 0;
    		-webkit-transform: rotate(45deg);
    		-ms-transform: rotate(45deg);
    		transform: rotate(45deg);
		}
		.h-scroll
		{
			overflow-x:scroll;
			white-space:nowrap;
			overflow-y:hidden;
		}
		#search-item-results,#search-customer-results
		{
			margin-top:5px;
			width:100%;
			overflow-x:auto;
		}
		.margin-vertical
		{
			margin-top:5px;
			margin-bottom:5px;
		}
		.w3-dropdown-content
		{
			z-index:5 !important;
			right:3px;
		}
		a,button
		{
			outline:none !important;
		}
		.item-quantity,.item-discount
		{
			width:50px;
		}
		/*
		override spinners
		*/
		input::-webkit-outer-spin-button,input::-webkit-inner-spin-button
		{
			-webkit-appearance:none;
			margin:0;
		}
		input[type=number]
		{
			-moz-appearance:textfield;
		}
		.nav-tabs
		{
			border-bottom:1px solid var(--site-border);
			overflow-x:auto;
			overflow-y:hidden;
			white-space:nowrap;
			<?php
			if($this->agent->is_mobile())
			{
				?>
				scrollbar-width:none;
				<?php
			}
			else
			{
				?>
				scrollbar-width:thin;
				<?php
			}
			?>
		}
		.nav-tabs > li
		{
			float:none;
			display:inline-block;
		}
		.nav-tabs > li.active > a, .nav-tabs > li.active > a:focus, .nav-tabs > li.active > a:hover
		{
			background-color:var(--material-dark-var);
			border: 1px solid var(--site-border);
			border-bottom:none !important;
			color:var(--teal-col) !important;
		}
		.sales-feedback
		{
			display:none;
		}
		.datepicker-days,.wickedpicker
		{
			color:#000 !important;
		}
		.select2-selection--single,.select2-search__field
		{
			border:none !important;
		}
		.select2-dropdown
		{
			border-top:none !important;
		}
		.print-preview-h1
		{
			font-size:24px;
		}
		.print-preview-h2
		{
			font-size:20px;
		}
		.print-preview-h3
		{
			font-size:18px;
		}
		.article-container
    	{
    		display:flex;
    		flex-wrap:wrap;
    		justify-content:center;
    	}
    	.article-container > div
    	{
    		width:300px;
    		margin:10px;
    		position:relative;
    		top:0;
    		transition:top ease 0.5s;
    	}
    	@media screen and (max-width:500px){
    		.article-container > div
    		{
    			width:100%;
    		}
    	}
    	.article-link
    	{
    		text-decoration:none !important;
    		overflow:hidden;
    		display:block;
    	}
    	.article-container > div:hover
    	{
    		top:-20px;
    	}
	</style>
</head>