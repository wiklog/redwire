@extends('layouts.app')

@section('content')
<form action="{{ route('motif.store') }}" method="post">
    @csrf

    <div class="mb-3">
        <label for="titre" class="">{{ __('Reason title') }}</label>

        <input type="text" autofocus class="border" name="titre" value="{{ old('titre') }}" maxlength="30">
        @error("titre")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="is_accessible" class="">{{ __('Is it accessible to employees?') }}</label><br>

        <label for="radio_oui">{{ __('Yes') }}</label>
        <input type="radio" value="1" name="is_accessible"><br>
        <label for="radio_non">{{ __('No') }}</label>
        <input type="radio" value="0" name="is_accessible">

        @error("is_accessible")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">{{ __('Create') }}</button>

</form>
@endsection
