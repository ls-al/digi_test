<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get(route('guest.guest.index'));

        $response->assertStatus(200);
    }

	public function test_questionnaire_store_validation_error(): void
	{
		$response = $this->post(route('guest.questionnaire.store'), [
			'fullName' => 'AIM AIM',
			'numberOfQuestions' => 51,
		]);

		$response->assertStatus(302); // 302 because if redirects back with errors. In an API should be validation http status
	}

	public function test_questionnaire_store_success(): void
	{
		$response = $this->post(route('guest.questionnaire.store'), [
			'fullName' => 'AIM AIM From POST',
			'email' => 'aimilios@aimilios.org',
			'numberOfQuestions' => 49,
			'difficulty' => 'hard',
			'type' => 'any',
		]);

		$response->assertStatus(302); // Because it returns a redirection instead of printing a view as it should in a normal application

		$this->assertEquals(User::first()->fullName, 'AIM AIM From POST');
	}
}
