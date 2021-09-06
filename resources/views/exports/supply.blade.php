<table>
    <thead>
    <tr>
        <th>Sku</th>
        <th>Name</th>
        <th>Cost</th>
        <th>Threshold</th>
        <th>Description</th>
        <th>Status</th>
        <th>Created By</th>
        <th>Created On</th>
        <th>Updated By</th>
        <th>Updated On</th>
    </tr>
    </thead>
    <tbody>
    @foreach($supplies as $item)
        <tr>
            <td>{{ $item->sku }}</td>
            <td>{{ $item->name }}</td>
            <td>{{ number_format($item->cost, 2, '.', ',') }}</td>
            <td>{{ $item->threshold }}</td>
            <td>{{ $item->long_description }}</td>
            <td>{{ ucwords($item->status) }}</td>
            <td>{{ $item->user_created->profile->name ?? "N/A" }}</td>
            <td>{{ $item->created_at->format('Y-m-d') }}</td>
            <td>{{ $item->user_updated->profile->name ?? "N/A" }}</td>
            <td>{{ $item->updated_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>