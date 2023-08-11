<?php

namespace App\Http\Controllers\guest;

use App\Actions\GetQuestionsAction;
use App\Actions\StoreQuestionAnswerAction;
use App\Http\Controllers\Controller;
use App\Models\Question;
use Auth;
use Illuminate\Http\Request;

class QuestionController extends Controller
{

	public function show(Int $questionnaireID)
	{
		$questions = (new GetQuestionsAction())->execute(Auth::user(), $questionnaireID, 1);

		return view('guest.question.show', compact('questions'));
	}

	public function store(Request $request, Int $questionnaireID)
	{
		// TODO: in an normal application it needs validation that the questions belongs to the user or a where in the update action.
		(new StoreQuestionAnswerAction())->execute(Question::find($request->questionID), $request->userAnswer);

		return redirect()->action([QuestionController::class, 'show'], ['questionnaireID' => $questionnaireID]);
	}

}
