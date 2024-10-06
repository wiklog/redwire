@extends('layouts.app')

@section('content')
<form action="{{ route('motif.store') }}" method="post" class="max-w-lg mx-auto p-6 mt-20 bg-white rounded-lg shadow-md">
    @csrf

    <div class="mb-4">
        <label for="titre" class="block text-gray-700 font-semibold">{{ __('Reason title') }}</label>
        <input type="text" autofocus class="border border-gray-300 rounded p-2 w-full" name="titre" value="{{ old('titre') }}" maxlength="30">
        @error("titre")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="is_accessible" class="block text-gray-700 font-semibold">{{ __('Is it accessible to employees?') }}</label>
        <div class="flex items-center">
            <label for="radio_oui" class="mr-4">{{ __('Yes') }}</label>
            <input type="radio" value="1" name="is_accessible" class="mr-2">
            <label for="radio_non" class="mr-4">{{ __('No') }}</label>
            <input type="radio" value="0" name="is_accessible">
        </div>
        @error("is_accessible")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
        {{ __('Create') }}
    </button>
</form>
@endsection
