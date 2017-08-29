<?php
//$link = new mysqli("localhost","root","","storyqueue");
$link = new mysqli("localhost","root","travis","webdev");
// if ($link->connect_errno) {
//     printf("Connect failed: %s\n", $link->connect_error);
//     echo("Not connected");
//     exit();
// }
// else {
//     echo ("connected");
// }
?>
<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>Copter Store</title>
	<link rel="stylesheet" href="css/shop.css" type="text/css" media="screen">
	<link rel="stylesheet" href="css/jquery-ui-1.8.11.custom.css" type="text/css" media="screen">
	<script>
		function reviewFunc() {
			var txt;
			var Title = prompt("Write your Review:","Best Quad Ever");
			if (Title !== null || Title == "") {
				0;
			}
		}
	</script>
	<script>	
		$(document).ready(function() {
		//follow plugin
		$('#cart').jfollow('#followbox', 20);
		//shopping cart functionality
		//hide the empty cart button
		emptyBtn.hide();
		//make the product class div part of the draggable ui
		$('.product').draggable({
		appendTo: 'body',
		helper: 'clone'
		});
		//make the dropzone class div a part of the droppable ui
		$('.dropzone').droppable({
		tolerance: 'touch',
		activeClass: 'ui-state-default',
		hoverClass: 'ui-state-hover',
		accept: '.product',
		drop: function(event, ui){
		var item = $(ui.draggable).find('.product-title').text();
		var itemid = $(ui.draggable).find('.id').text();
		var price = $(ui.draggable).find('.price').text();
		var html = '<div class="cart-item" data-productid="'+itemid+'" >';
		html = html + '<div class="div-remove">';
		html = html + '<a onclick = "remove(this)" class="remove '+itemid+'">&times;</a>'+'</
		div>';
		html = html + '<p class="item-name">'+item+'</p>';
		html = html + '<p class="item-price">'+price+'</p>';
		html = html + '<p class="input">'+'<input type="text" maxlength="2" name="quantity" 
		value="'+quantity+'" />';
		html = html + '</p>'+'</div>'
		var cartitem = $('".cart-item[data-productid="'+itemid+'"]"');
		if(cartitem.length > 0){
		var int = parseInt(cartitem.find('input').val());
		int ++;
		cartitem.find('input').val(int);
		}else{
		var content = $('.cart-content');
		content.append(html);
		emptyText.hide();
		}
		//update the total items
		total_items++;
		if(total_items > 0){
		emptyBtn.fadeIn('1000');
		}
		emptyBtn.click(function(){
		$('#dialog-confirm').dialog({
		resizable: false,
		modal: true,
		buttons: [
		{
		text: "Cancel",
		click: function(){
		$(this).dialog('close');}
		},
		{
		text: "Clear Cart",
		click: function(){
		var content = $('.cart-item');
		content.remove();
		$('cart-content').find('.placeholder').show();
		$(this).dialog('close');
		emptyBtn.fadeOut('500');
		emptyText.fadeIn('500');}
		}
		]
		})
		return false;
		});
		} //end drop function
		});
		}); //end document ready
			function remove(el) {
				$(el).hide();
				$(el).parent().parent().fadeOut('1000');
				setTimeout(function() {
					$(el).parent().parent().remove();
				}, 1100);
				// update total item
				total_items--;
				if( total_items === 0){
		emptyText.delay('1000').fadeIn('500');
		emptyBtn.fadeOut('500');
		}
		}
		var total_items = 0;
		var emptyText = $('.cart-content').find('.placeholder');
		var emptyBtn = $('.empty').button();
		var quantity = 1;
	</script>
</head>
<body>
	<div id="wrapper">
		<div id="content">
			<section id="products">
				<h2>FPV Copters</h2>
				<p>Drag products that you wish to purchase into the shopping cart area on the right.</p>
				
				<div class="product ui-draggable" id="0001">
					<img src="img/Phantom_4_Pro.jpg" width="165" height="198">
					<div class="product-info">
						<h2 class="product-title">Phantom 4 Pro</h2>
						<p class="id">D005</p>
						<p class="product-type">DJI</p>
						<p class="product-description"><strong>Operator: </strong>single <strong>Size: </strong>350 <strong>Weight: </strong>1288 <strong>Flight Time: </strong>30 <strong>Range: </strong>7 <strong>Speed: </strong>72 <strong>Gimbal: </strong>3-axis <strong>Video: </strong>4k 60fps <strong>Camera: </strong>20 mp <strong>Feature: </strong>obstacle sensing <br><br><strong>Reviews: </strong>I  like it. It's pretty neat! 5/4 Stars.<br><br>
						<button onClick="reviewFunc()">Write a Review</button></p>
						
					</div>
					<p class="price">$1499</p>	
				</div>
				<div class="product ui-draggable" id="0002">
					<img src="img/Inspire_1.jpg" width="165" height="198">
					<div class="product-info">
						<h2 class="product-title">Inspire 1</h2>
						<p class="id">D006</p>
						<p class="product-type">DJI</p>
						<p class="product-description"><strong>Operator: </strong>dual <strong>Size: </strong>581 <strong>Weight: </strong>2845 <strong>Flight Time: </strong>18 <strong>Range: </strong>7 <strong>Speed: </strong>79 <strong>Gimbal: </strong>3-axis <strong>Video: </strong>4k 60fps <strong>Camera: </strong>12.4 mp <strong>Feature: </strong>sensing, RTH <br><br><strong>Reviews: </strong>Best Quad Copter ever! YAY!<button onClick="reviewFunc()">Write a Review</button></p>
					</div>
					<p class="price">$1999</p>	
				</div>
				<div class="product ui-draggable" id="0003">
					<img src="img/Inspire_1_Pro.jpg" width="165" height="198">
					<div class="product-info">
						<h2 class="product-title">Inspire 1 Pro</h2>
						<p class="id">D007</pz>
						<p class="product-type">DJI</p>
						<p class="product-description"><strong>Operator: </strong>dual <strong>Size: </strong>581 <strong>Weight: </strong>2968 <strong>Flight Time: </strong>18 <strong>Range: </strong>7 <strong>Speed: </strong>79 <strong>Gimbal: </strong>3-axis <strong>Video: </strong>4k 60fps <strong>Camera: </strong>16 mp <strong>Feature: </strong> <br><br><strong>Reviews: </strong><button onClick="reviewFunc()">Write a Review</button></p>
					</div>
					<p class="price">$3399</p>	
				</div>
				<div class="product ui-draggable" id="0004" title="Ipsum Lorem 4Ever">
					<img src="img/Inspire_2.jpg" width="165" height="198">
					<div class="product-info">
						<h2 class="product-title">Inspire 2</h2>
						<p class="id">D008</p>
						<p class="product-type">DJI</p>
						<p class="product-description"><strong>Operator: </strong>dual <strong>Size: </strong>605 <strong>Weight: </strong>3290 <strong>Flight Time: </strong>27 <strong>Range: </strong>7 <strong>Speed: </strong>94 <strong>Gimbal: </strong>3-axis <strong>Video: </strong>4k 60fps <strong>Camera: </strong>16 mp <strong>Feature: </strong> <br><br><strong>Reviews: </strong><button onClick="reviewFunc()">Write a Review</button></p>
					</div>
					<p class="price">$2999</p>	
				</div>
				<div class="product ui-draggable" id="0005">
					<img src="img/Mavic.jpg" width="165" height="198">
					<div class="product-info">
						<h2 class="product-title">Mavic</h2>
						<p class="id">D009</p>
						<p class="product-type">DJI</p>
						<p class="product-description"><strong>Operator: </strong>single <strong>Size: </strong>335 <strong>Weight: </strong>734 <strong>Flight Time: </strong>27 <strong>Range: </strong>7 <strong>Speed: </strong>65 <strong>Gimbal: </strong>3-axis <strong>Video: </strong>4k <strong>Camera: </strong>12 mp <strong>Feature: </strong> <br><br><strong>Reviews: </strong><button onClick="reviewFunc()">Write a Review</button></p>
					</div>
					<p class="price">$999</p>	
				</div>
			</section>
			
			<aside>
				<div id="followbox"></div>
				<div id="cart" style="position: static; top: auto; left: auto;">
					<h2>Your Shopping Cart</h2>
					<p>As you browse through the product listing, you can add your items to the shopping cart by dragging them into the box below.</p>
					<div class="dropzone ui-droppable"><p>Drag items here to add them to your cart.</p></div>
					<div class="cart-content">
						<ol>
							<li class="placeholder">You have no items in your cart.</li>
						</ol>
					</div>
					<div class="empty ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" style="display: none;"><span class="ui-button-text">Remove all items from cart.</span></div>
				</div>
			</aside>
			<!--<aside>
				<div id="followbox"></div>
				<div id="cart" style="position: static; top: auto; left: auto;">
					<h2>Your Wish List</h2>
					<p>As you browse through the product listing, you can add your items to the shopping cart by dragging them into the box below.</p>
					<div class="dropzone ui-droppable"><p>Drag items here to add them to your cart.</p></div>
					<div class="cart-content">
						<ol>
							<li class="placeholder">You have no items in your cart.</li>
						</ol>
					</div
				</div>
			</aside>
			<div id="dialog-confirm" title="Empty Cart">Are you sure you want to empty the contents of your shopping cart.</div>	-->
			
		</div>
	</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-ui-1.8.11.custom.min.js"></script>
<script type="text/javascript" src="js/jquery.jfollow.js"></script>
<script type="text/javascript" src="js/script.js"></script>
<script type="text/javascript" src="js/cart.js"></script>

<div style="display: none; z-index: 1002; outline: 0px none; height: auto; width: 300px; top: 302px; left: 306px;" class="ui-dialog ui-widget ui-widget-content ui-corner-all  ui-draggable" tabindex="-1" role="dialog" aria-labelledby="ui-dialog-title-dialog-confirm"><div class="ui-dialog-titlebar ui-widget-header ui-corner-all ui-helper-clearfix"><span class="ui-dialog-title" id="ui-dialog-title-dialog-confirm">Empty Cart</span><a href="#" class="ui-dialog-titlebar-close ui-corner-all" role="button"><span class="ui-icon ui-icon-closethick">close</span></a></div><div id="dialog-confirm" style="display: block; width: auto; min-height: 29.1667px; height: auto;" class="ui-dialog-content ui-widget-content">Are you sure you want to empty the contents of your shopping cart.</div><div class="ui-dialog-buttonpane ui-widget-content ui-helper-clearfix"><div class="ui-dialog-buttonset"><button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Cancel</span></button><button type="button" class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-only" role="button" aria-disabled="false"><span class="ui-button-text">Clear Cart</span></button></div></div></div></body>
</html>