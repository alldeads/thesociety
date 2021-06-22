<table>
    <thead>
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Percentage</th>
        <th>Date Created</th>
        <th>Created By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($taxes as $tax)
        <tr>
            <td>{{ $tax->id }}</td>
            <td>{{ $tax->name }}</td>
            <td>{{ $tax->percentage }}</td>
            <td>{{ $tax->created_at->format('Y-m-d') }}</td>
            <td>{{ $tax->user_created->profile->name ?? "N/A" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>