<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Questionnaire extends Model
{

	protected $guarded = [];

	public function questions()
	{
		return $this->hasMany(Question::class, 'questionnaireID', 'id');
	}

}
