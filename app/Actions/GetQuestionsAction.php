<?php

namespace App\Actions;

use App\Models\Question;
use App\Models\User;

class GetQuestionsAction
{

	public function execute(User $user, Int $questionnaireID)
	{
		return Question::where('questionnaireID', $questionnaireID)->get();
	}

}