﻿/*
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

			var app = new Vue({
				el: '#wrapper',
				data: {
					headTitle: 'Расписание автобусов в Зеленогорске',
					message: '',
					nowDate: '',
					nowTime: '',
					pageSelect: 1,
					busSelectedNum: '',
					stationSelectedId: 0,
					stationSelectedName: '',
					taxiSelectedId: 0,
					busOwner: '',
					busComment: '',
					searchBus: '',
					routeSelectedId: 0,
				},
				methods: {
					setTime: function () {
						var time = new Date();
						var hours = time.getHours();
							if(hours <= 9) hours = '0' + hours;
						var minutes = time.getMinutes();
							if(minutes <= 9) minutes = '0' + minutes;
						var secundes = time.getSeconds();
							if(secundes <= 9) secundes = '0' + secundes;
						time = hours + ':' + minutes + ':' + secundes;
						var self = this;
						setInterval(function () {
							self.nowTime = self.setTime();
						}, 1000);
						return time;
					},
					setDate: function () {
						var date = new Date();
						var day = date.getDate();
							if(day <= 9) day = '0' + day;
						var month = date.getMonth()+1;
							if(month <= 9) month = '0' + month;
						date = day + '.' + month + '.' + date.getFullYear();
						this.nowDate = date;
						return date;
					},
					selectBus: function(num) {
						this.busSelectedNum = num;
						this.stationSelectedId = 0;
						return num;
					},
					selectOwner: function(owner) {
						this.busOwner = owner;
						return owner;
					},
					selectComment: function(comment) {
						this.busComment = comment;
						return comment;
					},
					selectStation: function(id, name) {
						this.stationSelectedId = id;
						this.stationSelectedName = name;
						return id;
					},
					selectBusesByStation: function(num) {
						this.busSelectedNum = num;
						//this.stationSelectedId = 0;
						return num;
					},
					selectTaxi: function(id) {
						this.taxiSelectedId = id;
						return id;
					},
					searchStation: function() {
						//var that = this;
						//console.log($(this).val());

						/*if( $(this).text().toLowerCase().indexOf($(this).val().toLowerCase()) === -1 ) {
							
							console.log($(this).text());
						}*/
						/*return this.products.filter(function(product) {
							return product.good.toLowerCase().indexOf(that.inputSearch.toLowerCase()) !== -1;
						});*/
					},
					searchBusByName: function(val) {
						this.searchBus = val;
						return val;
					},
				},
				computed: {
					thisYear: function() {
						var date = new Date();
						var year = date.getFullYear();
						return year;
					},
				},
				mounted() {
					/*this.setTime();
					this.setDate();*/
				}
			});
