<?php 
	namespace app\controllers;

	use app\models\Subscribe;

	class SubscribeController extends AppController 
	{
		public function indexAction()
		{
			$email = !empty($_GET['subscribe']) ? $_GET['subscribe'] : null;
			
			$data['email_subscribe'] = $email;
			$subscribe = new Subscribe();
			$subscribe->load($data);
			if(!$subscribe->checkUnique() || !$subscribe->validate($data))
			{
				$res['error'] = 'Email уже существует или неверный формат!';
			}
			else
			{
				if($subscribe->save('subscribe'))
				{
					$res['success'] = 'Вы успешно подписаны';
				}
				else
				{
					$res['error'] = 'Ошибка!';
				}
			}
			
			if($this->isAjax())
			{
				header("Content-Type: application/json; charset=utf8");
				echo json_encode($res);
			}
			
			exit();
		}
	}