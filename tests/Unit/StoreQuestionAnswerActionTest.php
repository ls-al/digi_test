<?php

test('Stores an Answer', function () {
	// TODO: Let's speed up the process and skip Factories & Unit Testing Worlds (A world consists of multiple factories put together so they create a specific testing environment)
	// TODO: Let's test together multiple Actions

	// Arrange
	$user = (new \App\Actions\CreateKindOfUserAction())->execute('AIM AIM', 'aimilios@aimilios.org');
	$questionnaire = (new \App\Actions\CreateQuestionnaireAction())->execute($user, 10, 'hard', 'multiple');
	(new \App\Actions\GenerateQuestionsAction())->execute($questionnaire);
	$question = $questionnaire->fresh()->questions()->first();

	// Assert
	expect($question->userAnswer)->toBeNull();

	// Act
	(new \App\Actions\StoreQuestionAnswerAction())->execute($question, 'Test Answer');

	// Assert
	expect($question->fresh()->userAnswer)->toBe('Test Answer');
});
