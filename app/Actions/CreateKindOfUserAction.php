<?php

namespace App\Actions;

use App\Models\User;

class CreateKindOfUserAction
{

	public function execute(String $fullName, String $email) : User
	{
		return User::create([
			'fullName' => $fullName,
			'email' => $email,
		]);
	}

}