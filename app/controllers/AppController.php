<?php

	namespace app\controllers;
	
	use app\models\AppModel;
	use luxury\base\Controller;
	use app\widgets\currency\Currency;
	use luxury\App;
	use luxury\Cache;
	
	class AppController extends Controller
	{
		public function __construct($route)
		{
			parent::__construct($route);
			new AppModel();
			
			//setcookie('currency', 'EUR', time() + 3600*24*7, '/');
			App::$app->setProperty('currencies', Currency::getCurrencies());
			App::$app->setProperty('currency', Currency::getCurrency(App::$app->getProperty('currencies')));
			App::$app->setProperty('cats', self::cacheCategory());
			App::$app->setProperty('info_pages', self::cacheInfoPages());
			//debug(App::$app->getProperties());
		}
		
		public static function cacheCategory()
		{
			$cache = Cache::instance();
			$cats = $cache->get('cats');
			if(!$cats)
			{
				$cats = \R::getAssoc('SELECT * FROM category');
				$cache->set('cats', $cats);
			}
			return $cats;
		}
		
		public static function cacheInfoPages()
		{	
			$cache = Cache::instance();
			$info_pages = $cache->get('info_pages');
			if(!$info_pages)
			{
				$info_pages = \R::getAssoc('SELECT alias, name FROM info_pages');
				$cache->set('info_pages', $info_pages);
			}
			return $info_pages;
			//return \R::findAll('info_pages');
		}
	}