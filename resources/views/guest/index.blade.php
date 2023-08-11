@extends('guest.layouts.master')

@section('main')

    <div class="container-sm">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form class="mt-5" method="POST" action="{{ route('guest.questionnaire.store') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Full name</label>
                <input type="text" name="fullName" class="form-control" value="{{ old('fullName') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Number of questions</label>
                <input type="number" name="numberOfQuestions" class="form-control" value="{{ old('numberOfQuestions') }}">
            </div>
            <div class="mb-3">
                <label class="form-label">Difficulty</label>
                <select name="difficulty" class="form-control">
                    <option value="any" {{ old('difficulty') == 'any' || is_null(old('difficulty')) ? 'selected' : '' }}>Any Difficulty</option>
                    <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                    <option value="medium" {{ old('difficulty') == 'medium' ? 'selected' : '' }}>Medium</option>
                    <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Type</label>
                <select name="type" class="form-control">
                    <option value="any" {{ old('type') == 'any' || is_null(old('type')) ? 'selected' : '' }}>Any Type</option>
                    <option value="multiple" {{ old('type') == 'multiple' ? 'selected' : '' }}>Multiple Choice</option>
                    <option value="boolean" {{ old('type') == 'boolean' ? 'selected' : '' }}>True / False</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>

@endsection