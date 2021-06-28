<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Company</th>
        <th>Phone</th>
        <th>Status</th>
        <th>Representative Name</th>
        <th>Representative Phone</th>
        <th>Representative Email</th>
        <th>Date Added</th>
        <th>Added By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->user->profile->company }}</td>
            <td>{{ $supplier->user->profile->phone_number ?? "N/A" }}</td>
            <td>{{ $supplier->status->name ?? "N/A" }}</td>
            <td>{{ $supplier->user->profile->name ?? "N/A" }}</td>
            <td>{{ $supplier->phone ?? "N/A" }}</td>
            <td>{{ $supplier->email ?? "N/A" }}</td>
            <td>{{ $supplier->created_at->format('Y-m-d') }}</td>
            <td>{{ $supplier->user_created->profile->name ?? "N/A" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>