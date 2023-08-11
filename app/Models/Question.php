<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{

	protected $guarded = [];

	protected $casts = [
		'incorrectAnswers' => 'array',
	];

	public function questionnaire()
	{
		return $this->belongsTo(Questionnaire::class, 'questionnaireID', 'id');
	}

}
