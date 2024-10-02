@extends('layouts.app')

@section('content')
<form action="{{ route('user.update', $user) }}" method="post" class="max-w-lg mx-auto p-6 mt-20 bg-white rounded-lg shadow-md">
    @csrf
    @method("PUT")

    <div class="mb-4">
        <label for="name" class="block text-gray-700 font-semibold">{{ __('Change your name') }}</label>
        <input type="text" class="border border-gray-300 rounded p-2 w-full" @if(old('name') == $user->name) value="{{ old('name') }}" @endif value="{{ $user->name }}" name="name">
        @error("name")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-4">
        <label for="email" class="block text-gray-700 font-semibold">{{ __('Change your email') }}</label>
        <input type="email" class="border border-gray-300 rounded p-2 w-full" value="{{ $user->email }}" name="email">
        @error("email")
            <p class="text-red-600 mt-1">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="mt-4 w-full bg-blue-500 text-white font-semibold py-2 rounded hover:bg-blue-600">
        {{ __('Save') }}
    </button>
</form>
@endsection
