@extends('layouts.app')
@section('content')
<a href="{{ route('users.create') }}">Create user</a>
<table>
<thead><tr><th>Id</th><th>Name</th><th>Phone</th><th>Active</th><th>Actions</th></tr></thead>
<tbody>
@foreach($users as $user)
<tr>
<td>{{ $user->id }}</td>
<td>{{ $user->surname }} {{ $user->name }}</td>
<td>{{ $user->phone }}</td>
<td>{{ $user->active ? 'Yes' : 'No' }}</td>
<td>
<a href="{{ route('users.edit', $user) }}">Edit</a>
<form method="POST" action="{{ route('users.destroy', $user) }}" style="display:inline">
@csrf
@method('DELETE')
<button type="submit">Delete</button>
</form>
</td>
</tr>
@endforeach
</tbody>
</table>
{{ $users->links() }}
@endsection
