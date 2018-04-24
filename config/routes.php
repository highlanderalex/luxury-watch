<?php
	use luxury\Router;
	
	
	Router::add('^product/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Product', 'action' => 'view']);
	Router::add('^category/(?P<alias>[a-z0-9-]+)/?$', ['controller' => 'Category', 'action' => 'view']);
	
	Router::add('^page/contact-us/?$', ['controller' => 'Page', 'action' => 'contact']);
	Router::add('^page/(?P<alias>[a-z-]+)/?$', ['controller' => 'Page', 'action' => 'view']);
	
	//default routes
	Router::add('^admin$', ['controller' => 'Main', 'action' => 'index', 'prefix' => 'admin']);
	Router::add('^admin/?(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$', ['prefix' => 'admin']);
	
	Router::add('^$', ['controller' => 'Main', 'action' => 'index']);
	Router::add('^(?P<controller>[a-z-]+)/?(?P<action>[a-z-]+)?$');