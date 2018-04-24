<!--banner-starts-->
	<div class="bnr" id="home">
		<!--div  id="top" class="callbacks_container"-->
		<div class="my-slider">
			<ul>
				<?php foreach($sliders as $slide): ?>
			    <li>
					<h2><?=$slide['title']?></h2>
					<p><?=$slide['description']?></p>
					<p class="read-more"><a href="<?=$slide['link']?>">Read more</a></p>
					<img src="images/sliders/<?=$slide['img']?>" alt=""/>
				</li>
				<?php endforeach; ?>
			</ul>
		</div>
		</div>
		<div class="clearfix"> </div>
	<!--/div-->
	<!--banner-ends--> 
	
	<!--about-starts-->
	<?php if ($brands): ?>
	<div class="about">
	<h2 class="brands">OUR BRANDS</h2>	
		<div class="container">
			<div class="about-top grid-1">
				<?php foreach($brands as $brand) :?>
				<div class="col-md-4 about-left">
					<figure class="effect-bubba">
						<img class="img-responsive" src="images/<?=$brand->img;?>" alt=""/>
						<figcaption>
							<h2><?=$brand->title;?></h2>
							<p><?=$brand->description;?></p>	
						</figcaption>			
					</figure>
				</div>
				<?php endforeach;?>
				
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
	<?php endif;?>
	<!--about-end-->
	<!--product-starts-->
	<?php if ($hits): ?>
	<?php $curr = \luxury\App::$app->getProperty('currency');?>
	<div class="product"> 
		<div class="container">
			<div class="product-top">
				<div class="product-one">
					<?php foreach($hits as $hit): ?>
					<div class="col-md-3 product-left">
						<div class="product-main simpleCart_shelfItem">
							<a href="product/<?=$hit->alias;?>" class="mask"><img class="img-responsive zoom-img" src="images/products/<?=$hit->img?>" alt="" /></a>
							<div class="product-bottom">
								<h3><a href="product/<?=$hit->alias;?>"><?=$hit->title;?></a></h3>
								<p>Explore Now</p>
								<h4><a data-id="<?=$hit->id;?>" class="add-to-cart-link" href="cart/add?id=<?=$hit->id;?>"><i></i></a> <span class=" item_price"><?=$curr['symbol_left']?><?=$hit->price*$curr['value'];?><?=$curr['symbol_right']?></span>
								<?php if ($hit->old_price): ?>
									<small><del><?=$hit->old_price*$curr['value'];?></del></small>
								<?php endif;?>
								</h4>
							</div>
							<?php if ($hit->old_price): ?>
							<div class="srch">
								<span><?=($hit->old_price-$hit->price)?>%</span>
							</div>
							<?php endif;?>
						</div>
					</div>
					<?php endforeach; ?>
					<div class="clearfix"></div>
				
				</div>					
			</div>
		</div>
	</div>
	<?php endif; ?>
	<!--product-end-->