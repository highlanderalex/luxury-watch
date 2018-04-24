<?php
	
	namespace app\controllers;
	
	use luxury\Cache;
	
	class MainController extends AppController
	{
		
		public function indexAction()
		{
			$brands = \R::find('brand', 'LIMIT 3');
			$hits = \R::find('product', "hit = '1' AND status = '1' LIMIT 8");
			$sliders = \R::getAssoc('SELECT id, title, description, img, link FROM slider ORDER BY id DESC LIMIT 3');
			$canonical = PATH;
			$this->setMeta('Главная страница', 'Описание главной', 'ключевики главной');
			$this->set(compact('brands', 'hits', 'info', 'sliders', 'canonical'));
			
		}
		
		
	}