<?php

namespace App\Actions;

use App\Models\Questionnaire;
use App\Models\User;

class CreateQuestionnaireAction
{

	public function execute(User $user, Int $numberOfQuestions, String $difficulty, String $type): Questionnaire
	{
		return $user
			->questionnaires()
			->create([
				'numberOfQuestions' => $numberOfQuestions,
				'difficulty' => $difficulty,
				'type' => $type,
			]);
	}

}