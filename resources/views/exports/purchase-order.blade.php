<table>
    <thead>
    <tr>
        <th>P.O. #</th>
        <th>Supplier</th>
        <th>Quantity</th>
        <th>Total</th>
        <th>Status</th>
        <th>Approved By</th>
        <th>Created By</th>
        <th>Date Created</th>
    </tr>
    </thead>
    <tbody>
    @foreach($purchase_orders as $purchase)
        <tr>
            <td>{{ $purchase->reference }}</td>
            <td>{{ $purchase->supplier->user->profile->company ?? "N/A" }}</td>
            <td>{{ number_format($purchase->quantity, 2, '.', ',') }}</td>
			<td>{{ number_format($purchase->total, 2, '.', ',') }}</td>
			<td>{{ ucwords($purchase->status->name) }}</td>
			<td>{{ $purchase->user_approved->profile->name ?? "N/A" }}</td>
			<td>{{ $purchase->user_created->profile->name ?? "N/A" }}</td>
            <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>