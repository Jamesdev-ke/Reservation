<div id="footer-container" class="w3-container material-dark content-container site-border-top">
	<p class="text-center roboto-bold w3-margin-top">
		<span><?php echo $hores_details['address']; ?></span> | <span>Tel <?php echo $hores_details['phone1']; ?></span> | <span>Fax <?php echo $hores_details['phone2']; ?></span> | <span>Email <?php echo $hores_details['email']; ?></span>
	</p>
	<p class="text-center roboto-bold text-capitalize">
		<span>&copy; <?php echo $copyright_yr; ?></span> <span class="text-uppercase"><?php echo $hores_details['sys_name'] ?>.</span>
	</p>
</div>
<?php
if(isset($_SESSION['print_approved']) && strcmp($_SESSION['print_approved'],'okay') === 0)
{
	?>
	<script>
		document.addEventListener('DOMContentLoaded',function(){
			printPage("<?php echo site_url($_SESSION['print_page']); ?>");
		});
	</script>
	<?php
}
?>
<script>
	AOS.init();
	function closePrint(){
		document.body.removeChild(this.__container__);
	}
	function setPrint(){
		this.contentWindow.__container__ = this;
		this.contentWindow.onbeforeunload = closePrint;
		this.contentWindow.onafterprint = closePrint;
		this.contentWindow.focus();
		this.contentWindow.print();
	}
	function printPage(sURL){
		//check if iframe element had been created
		if(document.getElementsByTagName("iframe") !== null)
		{
			//remove iframe elements
			var iframes = document.getElementsByTagName("iframe"),i;
			for(i = iframes.length - 1; i >= 0; i--)
			{
				iframes[i].parentNode.removeChild(iframes[i]);
			}
		}
		var oHiddFrame = document.createElement("iframe");
		oHiddFrame.onload = setPrint;
		oHiddFrame.style.position = "fixed";
		oHiddFrame.style.right = "0";
		oHiddFrame.style.bottom = "0";
		oHiddFrame.style.width = "0";
		oHiddFrame.style.height = "0";
		oHiddFrame.style.border = "0";
		oHiddFrame.src = sURL;
		document.body.appendChild(oHiddFrame);
	}
</script>
<script>
	$(document).ready(function(){
		//check if theme set
		if(localStorage.getItem("material_bg") !== null && localStorage.getItem("material_dark") !== null && localStorage.getItem("material_dark_var") !== null && localStorage.getItem("main_col") !== null && localStorage.getItem("default_col") !== null && localStorage.getItem("site_border") !== null && localStorage.getItem("teal_col") !== null && localStorage.getItem("data_mode") !== null && localStorage.getItem("data_mode_text") !== null)
		{
			//set theme
			document.documentElement.style.setProperty('--material-bg',localStorage.material_bg);
			document.documentElement.style.setProperty('--material-dark',localStorage.material_dark);
			document.documentElement.style.setProperty('--material-dark-var',localStorage.material_dark_var);
			document.documentElement.style.setProperty('--main-col',localStorage.main_col);
			document.documentElement.style.setProperty('--default-col',localStorage.default_col);
			document.documentElement.style.setProperty('--site-border',localStorage.site_border);
			document.documentElement.style.setProperty('--teal-col',localStorage.teal_col);
			//check if toggle mode btn is present
			if(document.getElementsByClassName("toggle-mode-btn") !== null)
			{
				$(".toggle-mode-btn").attr("data-mode",localStorage.data_mode).find("span").text(localStorage.data_mode_text);
			}
		}
		//initialize scroll bar
		$("body,#side-bar,.table-responsive,.h-scroll").overlayScrollbars({
			className:"os-theme-dark",
			resize:"none",
			sizeAutoCapable:true,
			clipAlways:true,
			normalizeRTL:true,
			paddingAbsolute:true,
			scrollbars:{
				autoHide:"leave"
			}
		});
		//initialize bs toolltip
		$('[data-toggle="tooltip"]').tooltip();
		//smooth scrolling
		$("a[href='#top']").on('click',function(event){
			if(this.hash !== "")
			{
				event.preventDefault();
				var hash = this.hash;
				$('html,body').animate({
					scrollTop:$(hash).offset().top
				},900,function(){
					window.location.hash = hash;
				});
			}
		});
		//initialize select 2
		$(".select2").select2();
		if(document.getElementsByClassName("toggle-pass") !== null)
		{
			var toggle_pass = $(".toggle-pass");
			toggle_pass.click(function(){
				if($(this).find(".pass-checkbox").prop("checked") === false)
				{
					$(".pass-input").attr("type","password");
					$(".pass-checkbox").prop("checked",false);
				}
				else
				{
					$(".pass-input").attr("type","text");
					$(".pass-checkbox").prop("checked",true);
				}
			});
		}
		//initialize wicked picker]
		$("#check-in-time").wickedpicker();
		$("#check-out-time").wickedpicker();
		//initialize date picker
		var date = new Date();
		var today = new Date(date.getFullYear(),date.getMonth(),date.getDate());
		$('.datepicker').datepicker({
			autoclose:true,
			format:'dd/mm/yyyy'
		});
		//initialize owl
		var owl = $(".owl-carousel");
		owl.owlCarousel({
			items:1,
			loop:true,
			margin:10,
			autoplay:true,
			autoplayTimeout:3000,
			autoplayHoverPause:true
		});
		//parse editor content
		if(document.getElementById("editor-content") !== null)
		{
			$("#editor-content").html($("#editor-content").attr("data-info"));
		}
		//check if auto hide is enabled
		if(localStorage.getItem("dashboard_auto_hide") !== null)
		{
			$("#side-bar").css("width","45px").find(".side-link-text").css("display","none").find(".side-link-btn").removeClass("w3-left-align");
			$(".page-container").css("margin-left","45px");
			$("#footer-container").css("margin-left","45px");
		}
		if(document.getElementById("toggle-sidebar-btn") !== null)
		{
			var toggle_sidebar_btn = $("#toggle-sidebar-btn");
			var toggle_dashboard_btn = $("#toggle-dashboard-btn");
			var side_bar = $("#side-bar");
			var page_container = $(".page-container");
			var footer_container = $("#footer-container");
			//for mobile devices
			toggle_sidebar_btn.click(function(){
				if(side_bar.css("display") !== "block")
				{
					$(this).find("div.menu-container").addClass("change");
					side_bar.css("display","block");
				}
				else
				{
					$(this).find("div.menu-container").removeClass("change");
					side_bar.css("display","none");
				}
			});
			//for desktop
			toggle_dashboard_btn.click(function(){
				if(side_bar.css("width") === "280px")
				{
					side_bar.css("width","45px").find(".side-link-text").css("display","none").find(".side-link-btn").removeClass("w3-left-align");
					page_container.css("margin-left","45px");
					footer_container.css("margin-left","45px");
					localStorage.dashboard_auto_hide = true;
				}
				else
				{
					side_bar.css("width","280px").find(".side-link-text").css("display","inline-block").find(".side-link-btn").addClass("w3-left-align");
					page_container.css("margin-left","280px");
					footer_container.css("margin-left","280px");
					localStorage.removeItem("dashboard_auto_hide");
				}
			});
			//hover
			side_bar.hover(function(){
				if(localStorage.getItem("dashboard_auto_hide") !== null)
				{
					$(this).css("width","280px").find(".side-link-text").css("display","inline-block").find(".side-link-btn").addClass("w3-left-align");
					page_container.css("margin-left","280px");
					footer_container.css("margin-left","280px");
				}
			},function(){
				if(localStorage.getItem("dashboard_auto_hide") !== null)
				{
					$(this).css("width","45px").find(".side-link-text").css("display","none").find(".side-link-btn").removeClass("w3-left-align");
					page_container.css("margin-left","45px");
					footer_container.css("margin-left","45px");
				}
			});
		}
		if(document.getElementsByClassName("star-btn") !== null)
		{
			var star_btn = $(".star-btn");
			var content_area = $("#content-area");
			var target_id,target_table,target_column,target_state,starred,starred_index;
			star_btn.click(function(){
				target_id = $(this).attr("data-id");
				target_table = $(this).attr("data-table");
				target_column = $(this).attr("data-column");
				target_state = $(this).attr("data-state");
				if(target_state == 0)
				{
					target_state = 1;
					starred = "yes";
					$(this).attr("data-state",target_state).html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
				}
				else if(target_state == 1)
				{
					target_state = 0;
					starred = "no";
					$(this).attr("data-state",target_state).html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
					//check class starred item
					if($(this).hasClass("starred-item"))
					{
						starred_index = parseInt($(".star-btn").index($(this)));
						//remove selected row
						$(".starred-row").eq(starred_index).remove();
						checkStarredRow();
					}
				}
				star_item(target_id,target_table,target_column,starred);
			});
		}
		function checkStarredRow(){
			//clear table and show corresponding message
			if(document.getElementsByClassName("starred-row").length < 1)
			{
				//hide x-btns
				$(".x-btn").addClass("hidden");
				content_area.html("<p class='text-center w3-large roboto-bold'><svg viewBox='0 0 16 16' class='svg-icon-50' data-info='alert-circle'><path d='M8 1.5c-1.736 0-3.369 0.676-4.596 1.904s-1.904 2.86-1.904 4.596c0 1.736 0.676 3.369 1.904 4.596s2.86 1.904 4.596 1.904c1.736 0 3.369-0.676 4.596-1.904s1.904-2.86 1.904-4.596c0-1.736-0.676-3.369-1.904-4.596s-2.86-1.904-4.596-1.904zM8 0v0c4.418 0 8 3.582 8 8s-3.582 8-8 8c-4.418 0-8-3.582-8-8s3.582-8 8-8zM7 11h2v2h-2zM7 3h2v6h-2z'></path></svg><br><span>No starred items.</span></p>");
			}
		}
		function star_item(target_id,target_table,target_column,starred){
			$.ajax({
				url:"<?php echo site_url('star-item');?>",
				method:"post",
				data:{targetId:target_id,targetTable:target_table,targetColumn:target_column,Starred:starred},
				dataType:"text",
				success:function(data){
					console.log(data);
				},
				error:function(xhr){
					console.log("star error");
				}
			})
		}
		if(document.getElementById("j-search") !== null)
		{
			var j_search = $("#j-search");
			j_search.keyup(function(){
				filterTable();
			});
		}
		function filterTable(){
			var input,filter,table,tr,td,cell,i,j;
			input = document.getElementById("j-search");
			filter = input.value.toUpperCase();
			table = document.getElementById("j-table");
			tr = table.getElementsByTagName("tr");
			for(i = 1; i < tr.length; i++)
			{
				tr[i].style.display = "none";
				td = tr[i].getElementsByTagName("td");
				for(var j = 0; j < td.length; j++)
				{
					cell = tr[i].getElementsByTagName("td")[j];
					if(cell)
					{
						if(cell.innerText.toUpperCase().indexOf(filter) > - 1)
						{
							tr[i].style.display = "";
						}
					}
				}
			}
		}
		if(document.getElementsByClassName("toggle-mode-btn") !== null)
		{
			var toggle_mode_btn = $(".toggle-mode-btn");
			toggle_mode_btn.click(function(){
				if($(this).attr("data-mode") === "light")
				{
					//change to dark mode
					toggle_mode_btn.attr("data-mode","dark");
					toggle_mode_btn.find("span").text("light mode");
					localStorage.data_mode = "dark";
					localStorage.data_mode_text = "light mode";
					document.documentElement.style.setProperty('--material-bg','#090909');
					document.documentElement.style.setProperty('--material-dark','#090909');
					document.documentElement.style.setProperty('--material-dark-var','#000000');
					document.documentElement.style.setProperty('--main-col','#ffffff');
					document.documentElement.style.setProperty('--default-col','#d9d9d9');
					document.documentElement.style.setProperty('--site-border','#1d1d1d');
					document.documentElement.style.setProperty('--teal-col','#009688');
				}
				else if($(this).attr("data-mode") === "dark")
				{
					//change to light mode
					toggle_mode_btn.attr("data-mode","light");
					toggle_mode_btn.find("span").text("dark mode");
					localStorage.data_mode = "light";
					localStorage.data_mode_text = "dark mode";
					document.documentElement.style.setProperty('--material-bg','#f5f5f5');
					document.documentElement.style.setProperty('--material-dark','#f5f5f5');
					document.documentElement.style.setProperty('--material-dark-var','#ffffff');
					document.documentElement.style.setProperty('--main-col','#000000');
					document.documentElement.style.setProperty('--default-col','#262626');
					document.documentElement.style.setProperty('--site-border','#e3e3e3');
					document.documentElement.style.setProperty('--teal-col','#00b3a1');
				}
				localStorage.material_bg = document.documentElement.style.getPropertyValue('--material-bg');
				localStorage.material_dark = document.documentElement.style.getPropertyValue('--material-dark');
				localStorage.material_dark_var = document.documentElement.style.getPropertyValue('--material-dark-var');
				localStorage.main_col = document.documentElement.style.getPropertyValue('--main-col');
				localStorage.default_col = document.documentElement.style.getPropertyValue('--default-col');
				localStorage.site_border = document.documentElement.style.getPropertyValue('--site-border');
				localStorage.teal_col = document.documentElement.style.getPropertyValue('--teal-col');
			});
		}
		if(document.getElementById("r-rating") !== null)
		{
			var rating_btn = $(".rating-btn");
			var r_rating = $("#r-rating");
			rating_btn.click(function(){
				if($(this).attr("data-state") == "0")
				{
					$(this).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
					if($(this).attr("id") == "rating-btn2")
					{
						rating_btn.eq(0).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
					}
					else if($(this).attr("id") == "rating-btn3")
					{
						rating_btn.eq(1).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
						rating_btn.eq(0).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
					}
					else if($(this).attr("id") == "rating-btn4")
					{
						rating_btn.eq(2).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
						rating_btn.eq(1).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
						rating_btn.eq(0).attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
					}
					else if($(this).attr("id") == "rating-btn5")
					{
						rating_btn.attr("data-state","1").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899z'></path>");
					}
					rating_sum();
				}
				else
				{
					$(this).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
					if($(this).attr("id") === "rating-btn1")
					{
						rating_btn.attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
					}
					else if($(this).attr("id") == "rating-btn2")
					{
						rating_btn.eq(2).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
						rating_btn.eq(3).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
						rating_btn.eq(4).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");

					}
					else if($(this).attr("id") == "rating-btn3")
					{
						rating_btn.eq(3).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
						rating_btn.eq(4).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
					}
					else if($(this).attr("id") == "rating-btn4")
					{
						rating_btn.eq(4).attr("data-state","0").html("<path d='M16 6.204l-5.528-0.803-2.472-5.009-2.472 5.009-5.528 0.803 4 3.899-0.944 5.505 4.944-2.599 4.944 2.599-0.944-5.505 4-3.899zM8 11.773l-3.492 1.836 0.667-3.888-2.825-2.753 3.904-0.567 1.746-3.537 1.746 3.537 3.904 0.567-2.825 2.753 0.667 3.888-3.492-1.836z'></path>");
					}
					rating_sum();
				}
			});
			function rating_sum(){
				sum = 0;
				rating_btn.each(function(){
					sum = sum + parseInt($(this).attr("data-state"));
					r_rating.val(sum);
				});
			}
		}
	});
</script>
</body>
</html>