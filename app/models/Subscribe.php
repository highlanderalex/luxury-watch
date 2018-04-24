<?php
namespace app\models;

class Subscribe extends AppModel 
{

    public $attributes = [
        'email_subscribe' => '',
    ];
	
	public $rules = [
        'required' => [
            ['email_subscribe']
        ],
        'email' => [
            ['email_subscribe']
        ]
    ];
	
	
	public function checkUnique()
	{
        $subscribe = \R::findOne('subscribe', 'email_subscribe = ?', [$this->attributes['email_subscribe']]);
        if($subscribe)
		{
            return false;
        }
        return true;
    }
}