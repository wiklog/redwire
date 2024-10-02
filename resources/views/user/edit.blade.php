@extends('layouts.app')

@section('content')
<form action="{{ route('user.update', $user) }}" method="post">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="name" class="">{{ __('Change your name') }}</label><br>

        <input type="text" class="" @if(old('name') == $user->name) value="{{ old('name') }}" @endif value="{{ $user->name }}" name="name">

        @error("name")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="">{{ __('Change your email') }}</label><br>

        <input type="email" class="" value="{{ $user->email }}" name="email">
        @error("email")
            <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">{{ __('Save') }}</button>

</form>
@endsection
