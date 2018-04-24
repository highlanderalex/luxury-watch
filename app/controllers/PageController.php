<?php
	
	namespace app\controllers;
	
	use app\models\Feedback;
	
	class PageController extends AppController
	{
		
		public function viewAction()
		{
			$alias = $this->route['alias'];
			$page_info = \R::findOne('info_pages', "alias = ?", [$alias]);
			if(!$page_info)
			{
				throw new \Exception("Данная страница $alias не найдена", 404);
			}
			
			$this->setMeta($page_info->title, $page_info->description, $page_info->keywords);
			$this->set(compact('page_info'));
			
		}
		
		public function contactAction()
		{
			if(!empty($_POST))
			{
				$feedback = new Feedback();
				$data = $_POST;
				$feedback->load($data);
				if(!$feedback->validate($data))
				{
					$feedback->getErrors();
					//$_SESSION['form_data'] = $data;
				}
				else
				{
					if($feedback->save('feedback'))
					{
						$_SESSION['success'] = 'Сообщение успешно отправлено';
					}
					else
					{
						$_SESSION['error'] = 'Ошибка!';
					}
				}
				redirect();
			}
			
			$alias = 'contact-us';
			$page_info = \R::findOne('info_pages', "alias = ?", [$alias]);
			if(!$page_info)
			{
				throw new \Exception("Данная страница $alias не найдена", 404);
			}
			
			$this->setMeta($page_info->title, $page_info->description, $page_info->keywords);
			$this->set(compact('page_info'));
			
		}
		
		
	}