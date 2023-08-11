<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QuestionnaireStoreRequest extends FormRequest
{

	public function rules(): array
	{
		return [
			'fullName' => ['required'],
			'email' => ['required', 'email'],
			'numberOfQuestions' => ['required', 'numeric', 'min:1', 'max:50'],
			'difficulty' => ['required', Rule::in(['any', 'easy', 'medium', 'hard'])],
			'type' => [Rule::in(['any', 'multiple', 'boolean'])],
		];
	}

	public function authorize(): bool
	{
		return true;
	}

}
