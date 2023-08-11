<?php

namespace App\Actions;

use App\Models\Question;
use App\Models\Questionnaire;
use Http;
use Illuminate\Support\Collection;

class GenerateQuestionsAction
{

	protected array $excluded_categories = ['Entertainment: Video Games'];

	public function execute(Questionnaire $questionnaire): bool
	{
		// TODO: Always try-catch on API requests, but LOG exceptions in Flare, ELK etc so we know there's an error in our system or API provider.
		try {

			// TODO: Should have have a loop here to fetch more after rejecting $excluded_categories so the numberOfQuestions matches the final questions.

			$questions = $this->fetchQuestions($questionnaire->numberOfQuestions, $questionnaire->difficulty, $questionnaire->type);

			$questions
				->reject(function ($question) {
					return in_array($question['category'], $this->excluded_categories);
				})
				->sortBy('category')
				->each(function ($question) use ($questionnaire) {
					$questionnaire
						->questions()
						->create([
							'category' => $question['category'],
							'question' => $question['question'],
							'correctAnswer' => $question['correct_answer'],
							'incorrectAnswers' => $question['incorrect_answers'],
						]);
				});

		} catch (\Exception $e) {
			// TODO: LOG exception somewhere like in Flare, ELK etc..
			return false;
		}

		return true;
	}

	// TODO: This probably belongs to a dedicated API ServiceClass, especially if there are more API calls/interactions but let's leave it here for now.
	private function fetchQuestions(Int $numberOfQuestions, String $difficulty, String $type) : Collection
	{
		$response = Http::get('https://opentdb.com/api.php', [
			'amount' => $numberOfQuestions,
			'difficulty' => $difficulty,
			'type' => $type,
		])->json();

		return collect($response['results']);
	}

}