<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {

	public function up(): void
	{
		Schema::create('questionnaires', function (Blueprint $table) {
			$table->id();
			$table->integer('userID');
			$table->integer('numberOfQuestions');
			$table->string('difficulty');
			$table->string('type');
			$table->timestamps();
		});
	}

	public function down(): void
	{
		Schema::dropIfExists('questionnaires');
	}

};
