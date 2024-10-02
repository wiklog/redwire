@extends('layouts.app')

@section('content')
<form action="{{ route('motif.update', $motif) }}" method="post">
    @csrf
    @method("PUT")

    <div class="mb-3">
        <label for="titre" class="">{{ __('Reason title') }}</label>

        <input type="text" autofocus class="border" name="titre" value="{{ $motif->titre }}" maxlength="30">
        @error("titre")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <div class="mb-3">
        <label for="is_accessible" class="">{{ __('Is it accessible to employees?') }}</label><br>

        <label for="radio_oui">{{ __('Yes') }}</label>
        <input type="radio" @if($motif->is_accessible_salarie ==1 )checked @endif value="1" name="is_accessible"><br>
        <label for="radio_non">{{ __('No') }}</label>
        <input type="radio" @if($motif->is_accessible_salarie ==0 )checked @endif value="0" name="is_accessible">

        @error("is_accessible")
            <p class="text-danger">{{ $message }}</p>
        @enderror
    </div>

    <button type="submit" class="">{{ __('Save') }}</button>

</form>
@endsection
