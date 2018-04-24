<?php
namespace app\models;

class Feedback extends AppModel 
{

    public $attributes = [
		'name' => '',
		'phone' => '',
		'email' => '',
        'message' => '',
    ];
	
	public $rules = [
        'required' => [
			['name'],
			['phone'],
            ['email'],
			['message'],
        ],
        'email' => [
            ['email']
        ]
    ];
	
}