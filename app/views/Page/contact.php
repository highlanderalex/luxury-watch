<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="/">Home</a></li>
					<li class="active"><?=$page_info->name?></li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>CONTACT</h2>
			</div>
				<div class="contact-text">
				<div class="col-md-3 contact-left">
						<div class="address">
							<h5>Address</h5>
							<p>The company name, 
							<span>Lorem ipsum dolor,</span>
							Glasglow Dr 40 Fe 72.</p>
						</div>
						<div class="address">
							<h5>Address1</h5>
							<p>Tel:1115550001, 
							<span>Fax:190-4509-494</span>
							Email: <a href="mailto:example@email.com">contact@example.com</a></p>
						</div>
					</div>
					<div class="col-md-9 contact-right">
						<form action="page/contact-us" method="post">
							<input type="text" placeholder="Name" name="name" required>
							<input type="text" placeholder="Phone" name="phone" required>
							<input type="email"  placeholder="Email" name="email" required>
							<textarea placeholder="Message" name="message" required></textarea>
							<div class="submit-btn">
								<input type="submit" value="Send Message" name="send_msg">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<!--contact-end-->
	<!--map-start-->
	<div class="map">
		<?=$page_info->content?>
	</div>
	<!--map-end-->