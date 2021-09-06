<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Phone</th>
        <th>Email</th>
        <th>Status</th>
        <th>Created By</th>
        <th>Created On</th>
        <th>Updated By</th>
        <th>Updated On</th>
    </tr>
    </thead>
    <tbody>
    @foreach($customers as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->user->profile->name }}</td>
            <td>{{ $item->user->profile->phone_number }}</td>
            <td>{{ $item->user->email }}</td>
            <td>{{ ucwords($item->status->name) }}</td>
            <td>{{ $item->user_created->profile->name ?? "N/A" }}</td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>
            <td>{{ $item->user_updated->profile->name ?? "N/A" }}</td>
            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>