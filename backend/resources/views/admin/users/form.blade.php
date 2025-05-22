@extends('layouts.app')
@section('content')
<form method="POST" action="{{ isset($user) ? route('users.update', $user) : route('users.store') }}">
@csrf
@if(isset($user))
@method('PUT')
@endif
<input type="text" name="surname" value="{{ $user->surname ?? '' }}" placeholder="Surname" required>
<input type="text" name="name" value="{{ $user->name ?? '' }}" placeholder="Name" required>
<input type="text" name="patronymic" value="{{ $user->patronymic ?? '' }}" placeholder="Patronymic">
<input type="text" name="phone" value="{{ $user->phone ?? '' }}" placeholder="Phone" required>
<input type="text" name="class" value="{{ $user->class ?? '' }}" placeholder="Class">
<label>Active <input type="checkbox" name="active" value="1" {{ isset($user) && $user->active ? 'checked' : '' }}></label>
<button type="submit">Save</button>
</form>
@endsection
