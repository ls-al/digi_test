@extends('guest.layouts.master')

@section('main')

    Question Page

    @if($questions->whereNull('userAnswer')->count() == 0)

        <ul>
            @foreach($questions as $question)
                <li>Question: {{ $question->question }} - Answer: {{ $question->userAnswer }}</li>
            @endforeach
        </ul>

    @else

        @php
            $unansweredQuestion = $questions->whereNull('userAnswer')->first();
            $unansweredQuestion->possibleAnswers = array_merge((array) $unansweredQuestion->incorrectAnswers, [$unansweredQuestion->correctAnswer]);
        @endphp

        <form method="POST" action="{{ route('guest.question.store', ['questionnaireID' => $unansweredQuestion->questionnaireID]) }}">
            @csrf

            <input type="hidden" name="questionID" value="{{ $unansweredQuestion->id }}">

            <div>Question: {{ $unansweredQuestion->question }}</div>
            <div>
                <span>Answer:</span>
                <select name="userAnswer">
                    @foreach ($unansweredQuestion->possibleAnswers as $possibleAnswer)
                        <option value="{{ $possibleAnswer }}">{{ $possibleAnswer }}</option>
                    @endforeach
                </select>
            </div>

            <input type="submit" value="Submit Answer">
        </form>

    @endif

@endsection