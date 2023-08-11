<?php

namespace App\Actions;

use App\Models\Question;

class StoreQuestionAnswerAction
{

	public function execute(Question $question, String $userAnswer): bool
	{
		return $question->update([
			'userAnswer' => $userAnswer,
		]);
	}

}