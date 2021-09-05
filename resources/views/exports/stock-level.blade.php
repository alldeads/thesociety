<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Branch</th>
        <th>Quantity</th>
        <th>Created At</th>
        <th>Created By</th>
        <th>Updated At</th>
        <th>Updated By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($stocks as $item)
        <tr>
            <td>{{ $item->reference }}</td>
            <td>{{ $item->product->name ?? 'N/A' }}</td>
            <td>{{ $item->branch->name ?? 'N/A' }}</td>

            <td>{{ number_format($item->after_stock, 2,'.', ',') }}</td>
           
            <td>{{ $item->user_created->profile->name ?? 'N/A' }}</td>
            <td>{{ $item->created_at }}</td>

            <td>{{ $item->user_updated->profile->name ?? 'N/A' }}</td>
            <td>{{ $item->updated_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>