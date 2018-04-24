<!DOCTYPE html>
<html>
<head>
	<?=$this->getMeta();?>
	<?php if(!empty($canonical)): ?>
		<link rel="canonical" href="<?=$canonical;?>">
	<?php endif;?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<base href="/">
	<link rel="icon" type="image/png" href="favicon.png">
	<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
	<link rel="stylesheet" href="css/flexslider.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/unslider.css" type="text/css" media="all">
	<link rel="stylesheet" href="css/unslider-dots.css" type="text/css" media="all">
	<link href="megamenu/css/ionicons.min.css" rel="stylesheet" type="text/css" media="all" />
	<link href="megamenu/css/style.css" rel="stylesheet" type="text/css" media="all" />
	<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />	
	<!--//theme-style-->
	<link href="css/memenu.css" rel="stylesheet" type="text/css" media="all" />		
</head>
<body> 
	<!--top-header-->
	<div class="top-header">
		<div class="container">
			<div class="top-header-main">
				<div class="col-md-6 top-header-left">
					<div class="drop">
						<div class="box">
							<select id="currency" tabindex="4" class="dropdown drop">
								<?php new \app\widgets\currency\Currency(); ?>
							</select>
						</div>
						<div class="btn-group">
                        <a class="dropdown-toggle" data-toggle="dropdown">Account <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <?php if(!empty($_SESSION['user'])): ?>
                                <li><a href="/user/cabinet">Добро пожаловать, <?=h($_SESSION['user']['name']);?></a></li>
                                <li><a href="user/logout">Выход</a></li>
                            <?php else: ?>
                                <li><a href="user/login">Вход</a></li>
                                <li><a href="user/signup">Регистрация</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
						<div class="clearfix"></div>
					</div>
				</div>
				<div class="col-md-6 top-header-left">
					<div class="cart box_1">
						<a href="cart/show" onclick="getCart(); return false;">
							<div class="total">
								<img src="images/cart-1.png" alt="" />
								<?php if(!empty($_SESSION['cart'])): ?>
									<span class="simpleCart_total"><?=$_SESSION['cart.currency']['symbol_left'] . $_SESSION['cart.sum'] . $_SESSION['cart.currency']['symbol_right'];?></span>
								<?php else: ?>
									<span class="simpleCart_total">Empty Cart</span>
								<?php endif; ?>
							</div>
						</a>
						<div class="clearfix"> </div>
					</div>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--top-header-->
	<!--start-logo-->
	<div class="logo">
		<a href="<?=PATH;?>"><h1>Luxury Watches</h1></a>
	</div>
	<!--start-logo-->
	<!--bottom-header-->
	<div class="header-bottom">
		<div class="container">
			<div class="header">
				<div class="col-md-9 header-left">
					<div class="menu-container">
						<div class="menu">
							<?php new \app\widgets\menu\Menu([
								'tpl' => WWW . '/menu/menu.php',
							]);?>
						</div>
					</div>
				<div class="clearfix"> </div>
			</div>
			<div class="col-md-3 header-right"> 
				<div class="search-bar">
					<form action="search" method="get" autocomplete="off">
                        <input type="text" class="typeahead" id="typeahead" name="s" placeholder="Search . . ." required>
                        <input type="submit" value="">
                    </form>
				</div>
			</div>
			<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<!--bottom-header-->
	
	<div class="content">
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<?php if(isset($_SESSION['error'])): ?>
						<div class="alert alert-danger">
							<?php echo $_SESSION['error']; unset($_SESSION['error']); ?>
						</div>
					<?php endif; ?>
					<?php if(isset($_SESSION['success'])): ?>
						<div class="alert alert-success">
							<?php echo $_SESSION['success']; unset($_SESSION['success']); ?>
						</div>
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?=$content;?>
	</div>
	
	
	<!--information-starts-->
	<div class="information">
		<div class="container">
			<div class="infor-top">
				<div class="col-md-3 infor-left">
					<h3>Follow Us</h3>
					<ul>
						<li><a href="https://www.facebook.com/" target="_blank"><span class="fb"></span><h6>Facebook</h6></a></li>
						<li><a href="https://twitter.com/" target="_blank"><span class="twit"></span><h6>Twitter</h6></a></li>
						<li><a href="https://www.google.com/" target="_blank"><span class="google"></span><h6>Google+</h6></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Information</h3>
					<ul>
					<?php 
						$info = \luxury\App::$app->getProperty('info_pages');
					?>
					<?php foreach($info as $k=>$v): ?>
						<li><a href="page/<?=$k?>"><p><?=$v?></p></a></li>
					<?php endforeach;?>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>My Account</h3>
					<ul>
						<li><a href="/user/cabinet"><p>My Account</p></a></li>
						<li><a href="/user/orders"><p>My Personal orders</p></a></li>
						<li><a href="/user/edit"><p>My Personal info</p></a></li>
						<li><a href="/user/edit"><p>My Addresses</p></a></li>
					</ul>
				</div>
				<div class="col-md-3 infor-left">
					<h3>Store Information</h3>
					<h4>The company name,
						<span>Lorem ipsum dolor,</span>
						Glasglow Dr 40 Fe 72.</h4>
					<h5>+955 123 4567</h5>	
					<p><a href="mailto:example@email.com">contact@example.com</a></p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--information-end-->
	<!--footer-starts-->
	<div class="footer">
		<div class="container">
			<div class="footer-top">
				<div class="col-md-6 footer-left">
					<form class="subscribe-form">
						<input type="text" placeholder="Enter Your Email" class="subscribe">
						<input type="submit" value="Subscribe" class="subscribe-btn">
					</form>
				</div>
				<div class="col-md-6 footer-right">					
					<p>© 2018 Luxury Watches. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank">W3layouts</a> </p>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<!--footer-end-->
	
	<!-- Modal -->
	<div class="modal fade" id="cart" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<h4 class="modal-title" id="myModalLabel">Корзина</h4>
				</div>
				<div class="modal-body">

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
					<a href="cart/view" type="button" class="btn btn-primary">Оформить заказ</a>
					<button type="button" class="btn btn-danger" onclick="clearCart()">Очистить корзину</button>
				</div>
			</div>
		</div>
	</div>
	
	<!--spinner-->
	<div id="spinner">
		<div class="loader"></div>
	</div>
	
	<!-- alert modal -->
	<div id="myModal" class="modal-alert">
	<!-- Modal content -->
	<div class="alert-content">
		<div class="alert-header">
			<span class="alert-close" onclick="closeAlert()">&times;</span>
			<h3>Внимание ошибка!</h3>
		</div>
		<div class="alert-body">
			<p>Непредвиденная ошибка</p>
		</div>
	</div>
	</div>
	
	<!--div class="preloader"><img src="images/ring.svg" alt=""></div-->
	
	<?php $curr = \luxury\App::$app->getProperty('currency'); ?>
	<script>
		var path = '<?=PATH;?>',
			course = <?=$curr['value'];?>,
			symboleLeft = '<?=$curr['symbol_left'];?>',
			symboleRight = '<?=$curr['symbol_right'];?>';
	</script>
	<!--jQuery(necessary for Bootstrap's JavaScript plugins)-->
	<script src="js/jquery-1.11.0.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/validator.js"></script>
	<script src="js/typeahead.bundle.js"></script>
	<script src="js/jquery.easydropdown.js"></script>
	<script src="js/main.js"></script>
	<script src="megamenu/js/megamenu.js"></script>
	<!-- FlexSlider -->
	<script src="js/imagezoom.js"></script>
	<script src="js/jquery.flexslider.js"></script>
	<script src="js/unslider-min.js"></script>
	<!--dropdown-->
	<script src="js/jquery.easydropdown.js"></script>	
	<script type="text/javascript">
			$(function() {
			
				var menu_ul = $('.menu_drop > li > ul'),
					   menu_a  = $('.menu_drop > li > a');
				
				menu_ul.hide();
			
				menu_a.click(function(e) {
					e.preventDefault();
					if(!$(this).hasClass('active')) {
						menu_a.removeClass('active');
						menu_ul.filter(':visible').slideUp('normal');
						$(this).addClass('active').next().stop(true,true).slideDown('normal');
					} else {
						$(this).removeClass('active');
						$(this).next().stop(true,true).slideUp('normal');
					}
				});
			
			});
	</script>		
	<!--Console script-->
	<?php if (DEBUG) :?>
		<div id="console">
			<header><strong>Console>></strong></header>
			<div id="console-content" style="display: none;">
			<?php $logs = \R::getDatabaseAdapter()
					->getDatabase()
					->getLogger();

			debug( $logs->grep( 'SELECT' ) );
			?>
			</div>
		</div>
		<script>
			$('#console').on('click', function(e) {
				$('#console-content').slideToggle(function() {
					$(e.target).text($(this).is(':visible') ? 'Console<<' : 'Console>>');
				});
			});
		</script>
	<?php endif;?>
</body>
</html>