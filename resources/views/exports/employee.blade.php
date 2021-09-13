<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Date Hired</th>
    </tr>
    </thead>
    <tbody>
    @foreach($employees as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->profile->name }}</td>
            <td>{{ $item->user->profile->phone_number }}</td>
            <td>{{ $item->user->email }}</td>
            <td>{{ ucwords($item->role->role_name) }}</td>
            <td>{{ ucwords($item->user->status) }}</td>
            <td>{{ $item->date_hired }}</td>
        </tr>
    @endforeach
    </tbody>
</table>