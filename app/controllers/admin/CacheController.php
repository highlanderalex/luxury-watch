<?php

namespace app\controllers\admin;

use luxury\Cache;

class CacheController extends AppController 
{

    public function indexAction()
	{
        $this->setMeta('Очистка кэша');
    }

    public function deleteAction()
	{
        $key = isset($_GET['key']) ? $_GET['key'] : null;
        $cache = Cache::instance();
        switch($key)
		{
            case 'category':
                $cache->delete('cats');
                $cache->delete('luxury_menu');
            break;
            case 'filter':
                $cache->delete('filter_group');
                $cache->delete('filter_attrs');
            break;
			case 'info_pages':
				$cache->delete('info_pages');
			break;
        }
        $_SESSION['success'] = 'Выбранный кэш удален';
        redirect();
    }

}