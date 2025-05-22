@extends('layouts.app')
@section('content')
<table>
<thead><tr><th>ID</th><th>User</th><th>Admin</th><th>IP</th><th>Success</th><th>Time</th></tr></thead>
<tbody>
@foreach($logs as $log)
<tr>
<td>{{ $log->id }}</td>
<td>{{ $log->user->phone ?? '' }}</td>
<td>{{ $log->admin->email ?? '' }}</td>
<td>{{ $log->ip_address }}</td>
<td>{{ $log->successful ? 'Yes' : 'No' }}</td>
<td>{{ $log->created_at }}</td>
</tr>
@endforeach
</tbody>
</table>
{{ $logs->links() }}
@endsection
