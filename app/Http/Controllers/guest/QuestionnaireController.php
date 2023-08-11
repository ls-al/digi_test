<?php

namespace App\Http\Controllers\guest;

use App\Actions\CreateKindOfUserAction;
use App\Actions\CreateQuestionnaireAction;
use App\Actions\GenerateQuestionsAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionnaireStoreRequest;
use Auth;

class QuestionnaireController extends Controller
{

	public function store(QuestionnaireStoreRequest $request)
	{
		// TODO: User Creation concern does NOT belong here but to speed up the DEMO DEV process let's leave it here.
		$user = (new CreateKindOfUserAction())->execute(
			$request->fullName,
			$request->email,
		);

		// TODO: As a work-around to make this work without full fledged User Account System we login the newly created User
		Auth::login($user);

		$questionnaire = (new CreateQuestionnaireAction())->execute(
			$user,
			$request->numberOfQuestions,
			$request->difficulty,
			$request->type,
		);

		(new GenerateQuestionsAction())->execute($questionnaire);

		return redirect()->action([QuestionController::class, 'show'], ['questionnaireID' => $questionnaire->id]);// TODO: should have a pivot page so the user can select the questionnaire in a normal application
	}

}
