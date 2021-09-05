<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Product</th>
        <th>Branch</th>
        <th>Reason</th>
        <th>In Stock</th>
        <th>On Hand</th>
        <th>Difference</th>
        <th>Notes</th>
        <th>Created At</th>
        <th>Created By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($histories as $item)
        <tr>
            <td>{{ $item->reference }}</td>
            <td>{{ $item->product->name ?? 'N/A' }}</td>
            <td>{{ $item->branch->name ?? 'N/A' }}</td>
            <td>{{ $item->reason->name ?? 'N/A' }}</td>

            <td>{{ number_format($item->in_stock, 2,'.', ',') }}</td>
            <td>{{ number_format($item->on_hand, 2,'.', ',') }}</td>
            
            @if ( $item->type == 1 )
                <td style="color: blue;">
                    {{ number_format($item->difference, 2,'.', ',') }}
                </td>
            @else
                <td style="color: red;">
                    {{ number_format($item->difference, 2,'.', ',') }}
                </td>
            @endif

            <td>{{ $item->notes }}</td>
            <td>{{ $item->user_created->profile->name ?? 'N/A' }}</td>
            <td>{{ $item->created_at }}</td>
        </tr>
    @endforeach
    </tbody>
</table>