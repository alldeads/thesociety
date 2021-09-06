<table>
    <thead>
    <tr>
    	<th>ID</th>
        <th>Role Name</th>
        <th>Created At</th>
        <th>Created By</th>
        <th>Updated At</th>
        <th>Updated By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($roles as $role)
        <tr>
        	<td>{{ $role->id }}</td>
            <td>{{ ucwords($role->role_name) }}</td>
            <td>{{ $role->created_at->format('Y-m-d') }}</td>
            <td>{{ $role->user_created->profile->name ?? "N/A" }}</td>
            <td>{{ $role->updated_at->format('Y-m-d') }}</td>
            <td>{{ $role->user_updated->profile->name ?? "N/A" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>