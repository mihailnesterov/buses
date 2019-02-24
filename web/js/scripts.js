/*
 * Java-скрипты
 */

	/* toTop Button */
	
		$(function() { 
			$(window).scroll(function() { 
			if($(this).scrollTop() != 0) { 
				$('#toTop').fadeIn(); 
					} else {	 
						$('#toTop').fadeOut(); 
					}	 
				}); 
				$('#toTop').click(function() { 
				$('body,html').animate({scrollTop:0},800); 
			}); 
		});
	
	
	/*Fix menu */
	
	$(document).ready(function(){
	        var $menu = $("#main-menu-container");
	        $(window).scroll(function(){
	            if ( $(this).scrollTop() > 100 && $menu.hasClass("default") ){
	                $menu.removeClass("default").addClass("fixed");
	            } else if($(this).scrollTop() <= 100 && $menu.hasClass("fixed")) {
	                $menu.removeClass("fixed").addClass("default");
			}
		});//scroll
	});
	
	/*scroll to anchor */
	$(document).ready(function() {
		$("a.scrolling-links").click(function () {
		  var elementClick = $(this).attr("href");
		  var destination = $(elementClick).offset().top-50;
		  $('html,body').animate( { scrollTop: destination }, 1100 );
		  return false;
		});
	});
	
	/* active-menu-main */
		function ActiveLinksMain(id){
			try{
				var el=document.getElementById(id).getElementsByTagName('a');
					var url=document.location.href;
					for(var i=0;i<el.length; i++){
					if (url==el[i].href){
					el[i].className = 'active_menu';
					};
				};
			}
			catch(e){}
			};

