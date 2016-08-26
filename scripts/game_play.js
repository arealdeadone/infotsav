	Array.prototype.map = Array.prototype.map || function(_x) {
			for(var o=[], i=0; i<this.length; i++) {
				o[i] = _x(this[i]);
			}
			return o;
		};
	console.log = function () { return "jaa maa chuda"; };
	var showedAlert = false;
	var Game = function() {
		this.player = $("#player");
		this.topPos = 0;
		this.leftPos = $(window).width() / 2 - this.player.width() / 2;
		this.init();
	};

	var outcoordmain, outcoordside;

	var coords = function(val,key){
		var actkey = md5(1),i;
		for(i=2; actkey != key; i++)
			actkey = md5(i);
		if(actkey == key)
		{
			--i;
			actkey = i;
			var num = 0;
			var arrayval = (""+val).split("").map(Number);
			for(i=0; i<arrayval.length; i++){
				temp = arrayval[i] - actkey;
				if(temp<0)
					temp = 10+temp;
				num = num*10 + temp;
			}
			return num;
		}

		return -1;
	};

	var checkPokemonList = function(){
		var d = document.getElementById('player');
		var dLp = parseInt(d.style.left), dTp = parseInt(d.style.top);

		if(!outcoordmain && !outcoordside)
		{
			if(!showedAlert)
			{
				swal("Oops! No Pokemon Available","The next lot will spawn in 10 minutes","error");
				showedAlert = true;
			}
			return;
		}

		for(i=0; i<outcoordmain.length-1; i++)
		{
			//alert("in here");
			if(outcoordmain[i].x && outcoordmain[i].y)
			{
				cx = coords(outcoordmain[i].x,outcoordmain[outcoordmain.length-1]);
				cy = coords(outcoordmain[i].y,outcoordmain[outcoordmain.length-1]);
				//alert(cx+","+cy);
				//console.log(outcoordmain[i].x,outcoordmain[i].y);
				if(dLp >= (screen.width/2 - 100 + cx) && dLp <= (screen.width/2 - 68 + cx) && dTp >= cy && dTp <= cy+32)
				{
					var imgPath = "images/pokemons/" + Math.floor(Math.random()*4 + 1) + ".gif";
					swal({   title: "Found a Pokemon",   text: "YaY! You found a pokemon",   timer: 6000,   showConfirmButton: true, confirmButtonColor: "#DD6B55",   confirmButtonText: "Close", imageUrl: imgPath });
					$.ajax({
						url: "index.php?updatescore&px="+cx+"&py="+cy+"&main",
						type: "get",
						success: function(data){
							try{
								data = JSON.parse(data);
								if(data.status == 'error')
								swal("Oops!",data.message ,data.status);
								if(data.status == 'success'){
									$.ajax({
											url: "leaderboard.php?api",
											type: "get",
											datatype: "json",
											success: function(data){
												try {
													var data=JSON.parse(data);
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
												catch(e)
												{
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
											}
										});
								}
							}catch(e){
								if(data.status == 'error')
								swal("Oops!",data.message ,data.status);
								if(data.status == 'success'){
									$.ajax({
											url: "leaderboard.php?api",
											type: "get",
											datatype: "json",
											success: function(data){
												try {
													var data=JSON.parse(data);
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
												catch(e)
												{
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
											}
										});
								}
							}
						},
						error: function () {
							swal("Sorry some error occured", "Couldn't update your score","error");
						}
					});
					outcoordmain[i].x = null;
					outcoordmain[i].y = null;
					//console.log(dLp, dTp, (screen.width/2 - 100 +parseInt(outcoordmain[i].x)), outcoordmain[i].y);
					return;
				}
			}
		}

		for(i=0; i<outcoordside.length-1; i++)
		{
			for(j=0; j<outcoordside[i].length; j++)
			{
				if(outcoordside[i][j].x && outcoordside[i][j].y)
				{
					var cx = coords(outcoordside[i][j].x,outcoordside[6]);
					var cy = coords(outcoordside[i][j].y,outcoordside[6]);
					if(dLp >= cx && dLp <= cx + 32 && dTp >= cy && dTp <= cy + 32)
					{
						var imgPath = "images/pokemons/" + Math.floor(Math.random()*4 + 1) + ".gif";
						swal({   title: "Found a Pokemon",   text: "YaY! You found a pokemon", imageUrl: imgPath,   timer: 6000,   showConfirmButton: true, confirmButtonColor: "#DD6B55",   confirmButtonText: "Close" });
						var s = "index.php?updatescore&px="+cx+"&py="+cy+"&side";
						console.log(s);
						$.ajax({
							url: s,
							type: "get",
							success: function(data)
							{
								try{
									
									data = JSON.parse(data);
									if(data.status == "error")
										swal("Oops!",data.message ,data.status);
									if(data.status == "success"){
										$.ajax({
											url: "leaderboard.php?api",
											type: "get",
											datatype: "json",
											success: function(data){
												try{
													var data=JSON.parse(data);
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
												catch(e)
												{
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}

											}
										});
									}
								}catch(e){
									if(data.status == "error")
										swal("Oops!",data.message ,data.status);
									if(data.status == "success"){
										$.ajax({
											url: "leaderboard.php?api",
											type: "get",
											datatype: "json",
											success: function(data){
												try{
													var data=JSON.parse(data);
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}
												catch(e)
												{
													$("#pos").html('Position: '+data.pos);
													console.log(data.pos);
													//alert(data.pos);
													//console.log
													$("#score").text("Score: "+data.score);
												}

											}
										});
									}
								}
							}
							,
							error: function () {
								swal("Sorry some error occured", "Couldn't update your score","error");
							}
						});

						outcoordside[i][j].x = null;
						outcoordside[i][j].y = null;

					    return;
					}
				}
			}
		}
	};

	var getdata = function () {

		call_main(function(output){
			try {
				alert("S");	
				outcoordmain=JSON.parse(output);
			}
			catch(e){
				outcoordmain=output;
			}
			//alert("x"+data[0].x+","+"y"+data[0].y);
			//alert(outcoordmain.length);
			//alert("Asdf");
		});

		call_side(function(output){
			outcoordside = output;
			try {
				outcoordside=JSON.parse(output);
			}
			catch(e){
				outcoordside=output;
			}
		});
	};

	setInterval(getdata,360000)

	Game.prototype = {

		init: function() {
			// Center the player relative to the window width
			this.player.css('left', this.leftPos + 'px');

			// Add an event handler
			this.eventsHandler();

			// How To play lighbox
			this.howToPlay();

			$('nav a:first').addClass('current');

			// Puts flowers
			//this.putFlowers();
		},

		howToPlay: function() {
			this.lightboxInit('#howToPlay', false);
		},

		eventsHandler: function() {
			var me = this;
			var player = this.player;

			$(window).resize(function(){
				player.css('left', $(window).width() / 2 - player.width() / 2 + 'px');
			});

			$('.road, .bridge').unbind('click').bind('click', function(e){
				var x = e.pageX - player.width() / 2;
				var y = e.pageY;
				var canMove = me.canImove(x, y, true);
				if(canMove === true) {
					me.teleport(x, y);
					me.openDoors(x, y);
					me.revealMenu(y);
				}
				else {
					me.showNotificationsBar(notifications[0]);
				}
			});

			$('.sea').unbind('click').bind('click', function(e){
				me.showNotificationsBar(notifications[3]);
			});

			$('.house').unbind('click').bind('click', function(){
				var target = '#' + $(this).attr('id');
				me.moveDirectToHouse(target);
			});

			$('nav a').click(function(e){
				e.preventDefault();
				var target = $(this).attr('href');
				if(target == '#boat') {
					$('nav a').removeClass('current');
					$(this).addClass('current');
					me.shipSail();
					return;
				}
				else if(target == '#startCave') {
					$('nav a').removeClass('current');
					$(this).addClass('current');
					$('html, body').animate({scrollTop: 0}, 'slow');
					me.teleport($(window).width() / 2 - me.player.width() / 2, 100);
					return;
				}
				else if(target == '#howToPlay') {
					me.lightboxInit(target, false);
					return;
				}
				else if(target == '#login') {
					window.location = 'login.php';
				}
				else if(target == '#logout') {
					window.location = 'logout.php';
				}
				me.moveDirectToHouse(target);
			});

			$(window).unbind('keydown').bind('keydown', function(event) {
				if(me.topPos > parseFloat($('#startText').css('top'))) {
					$('#startText').fadeOut('fast', function(){
						$(this).remove();
					});
				}

				if(event.shiftKey)
				{
					switch(event.keyCode){

						case 37: // Fast Left
							me.moveX(me.leftPos - 19, 'left');
							event.preventDefault();
							checkPokemonList();
							break;

						case 39: //Fast Right
							me.moveX(me.leftPos + 19, 'right');
							event.preventDefault();
							checkPokemonList();
							break;

						case 38: //Fast Up
							me.moveY(me.topPos - 19, 'up', 19);
							event.preventDefault();
							checkPokemonList();
							break;

						case 40: //Fast Down
							me.moveY(me.topPos + 19, 'down', 19);
							event.preventDefault();
							checkPokemonList();
							break;

						case 65: // Left
							me.moveX(me.leftPos - 19, 'left');
							event.preventDefault();
							checkPokemonList();
							break;

						case 68: // Right
							me.moveX(me.leftPos + 19, 'right');
							event.preventDefault();
							checkPokemonList();
							break;

						case 87: // Up
							me.moveY(me.topPos - 19, 'up', 19);
							event.preventDefault();
							checkPokemonList();
							break;

						case 83: // Down
							me.moveY(me.topPos + 19, 'down', 19);
							event.preventDefault();
							checkPokemonList();
							break;
					}
				}
				else
				{
					//console.log(event.keyCode);
					switch (event.keyCode) {
						case 37: // Left
							me.moveX(me.leftPos - 12, 'left');
							event.preventDefault();
							checkPokemonList();
							break;

						case 39: // Right
							me.moveX(me.leftPos + 12, 'right');
							event.preventDefault();
							checkPokemonList();
							break;

						case 38: // Up
							me.moveY(me.topPos - 12, 'up', 12);
							event.preventDefault();
							checkPokemonList();
							break;

						case 40: // Down
							me.moveY(me.topPos + 12, 'down', 12);
							event.preventDefault();
							checkPokemonList();
							break;

						case 65: // Left
							me.moveX(me.leftPos - 12, 'left');
							event.preventDefault();
							checkPokemonList();
							break;

						case 68: // Right
							me.moveX(me.leftPos + 12, 'right');
							event.preventDefault();
							checkPokemonList();
							break;

						case 87: // Up
							me.moveY(me.topPos - 12, 'up', 10);
							event.preventDefault();
							checkPokemonList();
							break;

						case 83: // Down
							me.moveY(me.topPos + 12, 'down', 10);
							event.preventDefault();
							checkPokemonList();
							break;

						case 32:
							if(document.getElementById('music').paused)
								document.getElementById('music').play();
							else
								document.getElementById('music').pause();
							event.preventDefault();
							break;

						case 13:
							if(me.topPos > $('#wrapper').height() - $('#endSea').height() - player.height()) {
								$('nav a').removeClass('current');
								$('nav a[href="#boat"]').addClass('current');
								me.shipSail();
							}
							break;

						case 27:
							me.hideNotificationBar();
							break;
					}
				}
				//checkPokemon();
				me.openDoors(me.leftPos, me.topPos);
				me.revealMenu(me.topPos);
			}).keyup(function(){
				if(player.attr('class') != '')
					player.removeAttr('class').destroy();
			});

			$("#boat").unbind('click').bind('click', function(){
				$('nav a').removeClass('current');
				$('nav a[href="#boat"]').addClass('current');
				me.shipSail();
			});

			$("#notifications").find('.close').live('click', function(){
				me.hideNotificationBar();
			});

			$("#dark, #closeLB").die('click').live('click', function(){
				me.closeLightbox();
			});
		},

		showNotificationsBar: function(notification) {
			var me = this;
			$("#notifications").css('bottom', 0);
			if(!$("#notifications").find('.inner').attr('id') || $("#notifications").find('.inner').text() != notification.text){
				$("#notifications").find('.inner').attr('id', notification.type).fadeOut('fast', function(){
					$(this).html('<img src="' + notification.img + '" />' + notification.text).fadeIn('fast');
				});
			}
		},

		hideNotificationBar: function() {
			$("#notifications").css('bottom', '-60px');
		},

		revealMenu: function(y) {
			if(y >= 200) {
				$('nav').addClass('show');
				if(y >= 350 && y < 355) {
					this.showNotificationsBar(notifications[1]);
				}
				else if(y > 580 && $("#notifications").find('.inner').text() == notifications[1].text) {
					this.hideNotificationBar();
				}
			}
			else {
				$('nav').removeClass('show');
			}
		},

		teleport: function(x, y) {
			this.topPos = y;
			this.leftPos = x;
			var player = this.player;
			player.css({
				opacity: 0,
				top: y,
				left: x
			}).show().stop(true, true).animate({opacity: 1});
			if(this.topPos >= 200) {
				$('html, body').animate({scrollTop: y - 200}, 'slow');
			}
			this.shipBack();
		},

		moveDirectToHouse: function(target) {
			var house;
			for(i = 0; i < houses.length; i++) {
				if(houses[i].id == target) {
					house = houses[i];
					break;
				}
			}
			var y = house.top + house.height - 70;
			var x;
			if(house.left && house.left != null) {
				x = house.left + house.door.left;
			}
			else {
				x = $(window).width() - house.width - house.right + house.door.left;
			}
			var canMove = this.canImove(x, y, true);
			if(canMove) {
				this.topPos = y;
				this.leftPos = x;
				this.teleport(x, y);
				this.openDoors(x, y);
			}
		},

		moveX: function(x, dir) {
			var player = this.player;
			var canMove = this.canImove(x, null);
			if(canMove){
				this.leftPos = x;
				player.animate({'left': x + 'px'}, 10);
			}
			if(dir == 'left') {
				this.startMoving('left', 2);
			}
			else {
				this.startMoving('right', 3);
			}
		},

		moveY: function(y, dir, speed) {
			var player = this.player;
			var canMove = this.canImove(null, y);
			if(canMove) {
				if(this.topPos >= 200) {
					if(dir == 'up') {
						$('html, body').animate({scrollTop: $(document).scrollTop() - speed}, 10);
					}
					else {
						$('html, body').animate({scrollTop: $(document).scrollTop() + speed}, 10);
					}
				}
				this.topPos = y;
				player.animate({'top': y + 'px'}, 10);
			}
			if(dir == 'up') {
				this.startMoving('up', 4);
			}
			else {
				this.startMoving('down', 1);
			}
		},

		startMoving: function(dir, state) {
			var player = this.player;
			if(!player.hasClass(dir)) {
				player.addClass(dir);
				player.sprite({fps: 12, no_of_frames: 3}).spState(state);
			}
		},

		openDoors: function(x, y) {
			var player = this.player;
			var elmLeft = x || this.leftPos;
			var elmTop = y || this.topPos;
			for(i = 0; i < houses.length; i++) {
				if(houses[i].left && houses[i].left != null) {
					if(elmTop >= houses[i].top + houses[i].height - 80 && elmTop < houses[i].top + houses[i].height + player.height() && elmLeft < houses[i].left + houses[i].width) {
						$(houses[i].id).find(".door").addClass('open');
					}
					else {
						$(houses[i].id).find(".door").removeClass('open');
					}

				}
				else if(houses[i].right && houses[i].right != null) {
					if(elmTop >= houses[i].top + houses[i].height - 80 && elmTop < houses[i].top + houses[i].height + player.height() && elmLeft > $(window).width() - houses[i].right - houses[i].width) {
						$(houses[i].id).find(".door").addClass('open');
					}
					else {
						$(houses[i].id).find(".door").removeClass('open');
					}
				}
				else {
					$(".door").removeClass('open');
				}
			}
		},

		inHouse: function(elmLeft, elmTop) {
			var player = this.player;
			var isInHouse = [];
			for(i = 0; i < houses.length; i++) {
				if(elmTop > houses[i].top && elmTop < houses[i].top + houses[i].height) {
					if(houses[i].left && houses[i].left != null) {
						if(elmLeft < houses[i].left + houses[i].width && elmLeft > houses[i].left - player.width() && elmTop < houses[i].top + houses[i].height) {
							if(elmLeft > houses[i].left + houses[i].door.left - player.width() / 2 && elmLeft < houses[i].left + houses[i].door.width + houses[i].door.left - player.width() / 2) {
								isInHouse.push(true);
								if(elmTop <= houses[i].top + houses[i].height - 70) {
									this.lightboxInit(houses[i].id, true);
								}
							}
							else {
								isInHouse.push(false);
							}
						}
						else {
							isInHouse.push(true);
						}
					}
					else if(houses[i].right && houses[i].right != null) {
						if(elmLeft > $(window).width() - houses[i].width - houses[i].right - player.width() && elmLeft < $(window).width() - houses[i].right && elmTop < houses[i].top + houses[i].height) {
							if(elmLeft > $(window).width() - houses[i].width - houses[i].right + houses[i].door.left - 10  && elmLeft < $(window).width() - houses[i].right - houses[i].width + houses[i].door.left + houses[i].door.width - 10) {
								isInHouse.push(true);
								if(elmTop <= houses[i].top + houses[i].height - 70) {
									this.lightboxInit(houses[i].id, true);
								}
							}
							else {
								isInHouse.push(false);
							}
						}
						else {
							isInHouse.push(true);
						}
					}
					else {
						isInHouse.push(true);
					}
					break;
				}
			}
			return isInHouse;
		},

		isRoad: function(elmLeft, elmTop) {
			var player = this.player;
			var mainRoad = $("#mainRoad");
			var isOnRoad = true;

			// Check if the player is out of boundries
			if(elmLeft < 0 || elmLeft >= parseFloat(player.parent().width()) - parseFloat(player.width()) || elmTop < 0 || elmTop > parseFloat(player.parent().height()) - parseFloat(player.height())) {
				isOnRoad = false;
			}
			else if(elmLeft < ($(window).width() / 2 - mainRoad.width() / 2) || elmLeft > ($(window).width() / 2 + mainRoad.width() / 2) - player.width()) {
				for(i = 0; i < roads.length; i++) {
					if(elmTop > roads[i].top && elmTop < roads[i].top + roads[i].height - player.height()) {
						if(roads[i].direction == 'left') {
							if(elmLeft < ($(window).width() / 2 + mainRoad.width() / 2) - player.width()) {
								isOnRoad = true;
							}
							else {
								isOnRoad = false;
							}
						}
						else if(roads[i].direction == 'right') {
							if(elmLeft >= ($(window).width() / 2 + mainRoad.width() / 2) - player.width()) {
								isOnRoad = true;
							}
							else {
								isOnRoad = false;
							}
						}
						else {
							isOnRoad = false;
						}
						break;
					}
					else {
						isOnRoad = false;
					}
				}
			}

			return isOnRoad;
		},

		canImove: function(moveLeft, moveTop, teleported) {
			var player = this.player;
			var elmLeft = moveLeft || this.leftPos;
			var elmTop = moveTop || this.topPos;

			if(player.css('display') == 'none' && !teleported) {
				return false;
			}

			// Check if the player is around a house
			var isHouse = this.inHouse(elmLeft, elmTop);
			if(isHouse.indexOf(false) >= 0) {
				return false;
			}

			var isRoad = this.isRoad(elmLeft, elmTop);
			if(isRoad === false) {
				return false;
			}

			// Sea Handler
			if(elmTop > $('#wrapper').height() - $('#endSea').height() - player.height()) {
				this.showNotificationsBar(notifications[2]);
				if(elmLeft > $(window).width() / 2 - $('#endBridge').width() / 2 && elmLeft < $(window).width() / 2 + $('#endBridge').width() / 2 - player.width()) {
					if(elmTop > $('#wrapper').height() - $('#endSea').height() + $("#endBridge").height() - 70 - player.height()) {
						return false;
					}
					return true;
				}
				else {
					return false;
				}
			}

			return true;
		},

		shipSail: function() {
			$('html, body').animate({scrollTop: $("#wrapper").height() - $("#endSea").height() + 20});
			var ship = $('#boat');
			this.hideNotificationBar();
			this.player.stop(true, true).fadeOut('fast');
			ship.find('.meSail').delay(500).fadeIn('fast');
			ship.removeAttr('class').addClass('sail');
			$("#contact").addClass('show');
		},

		shipBack: function() {
			var ship = $('#boat');
			if(!ship.hasClass('isMoored')) {
				ship.removeClass('sail');
				ship.find('.meSail').hide();
				$("#contact").removeClass('show');
			}
			else {
				return;
			}
		},

		lightboxInit:  function(elm, effectMenu) {
			var me = this;
			if($("#dark").length < 1) {
				if(effectMenu) {
					// Update the current menu
					$('nav a').removeClass('current');
					$('nav a[href="' + elm + '"]').addClass('current');
				}

				// Get the relevant content
				var content = $(elm).find('.lightbox').html();

				// Creates the lightbox
				$('<div id="dark"></div>').appendTo('body').fadeIn();
				$('<div id="lightbox">' + content + '<span id="closeLB">x</span></div>').insertAfter("#dark").delay(1000).fadeIn();

				$(window).unbind('keydown');
				$('#wrapper').unbind('click');

				$(window).bind('keydown', function(e){
					if(e.keyCode == 27) {
						me.closeLightbox();
					}
				});
			}
		},

		closeLightbox: function() {
			var me = this;
			$('#dark, #lightbox').fadeOut('fast', function(){
				var canMove = me.canImove(me.leftPos, me.topPos + 80);
				if(canMove) {
					me.startMoving('down', 1);
					me.player.animate({'top': me.topPos + 80}, function(){
						me.player.removeAttr('class').destroy();
					});
					me.topPos = me.topPos + 80;
				}
				$('#dark, #lightbox').remove();
				me.eventsHandler();
				$('html, body').animate({
					scrollTop: me.topPos - 270
				});
			});
		},

		putFlowers: function() {
			var me = this;
			var height = $("#wrapper").height();
			var width = $(window).width();
			for(var i = 0; i < 20; i++) {
				var x = Math.floor((Math.random() * width) + 1);
				var y = Math.floor((Math.random() * height) + 1);
				var canIput = [];
				canIput.push(me.isRoad(x, y));
				canIput.push(me.inHouse(x, y) != '' ?  me.inHouse(x, y) : true);
				if(canIput.indexOf(false) >= 0) {
					$('<div class="flowers"></div>').appendTo('#wrapper').css({
						top: y,
						left: x
					});
				}
				else {
					i--;
				}
			}
		}

	}

Game.constructor = Game;