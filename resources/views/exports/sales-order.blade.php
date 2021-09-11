<table>
    <thead>
    <tr>
        <th>Reference</th>
        <th>Customer</th>
        <th>Sub Total</th>
        <th>Discount</th>
        <th>Total</th>
        <th>Status</th>
        <th>Created By</th>
        <th>Created On</th>
    </tr>
    </thead>
    <tbody>
    @foreach($sales as $purchase)
        <tr>
            <td>{{ $purchase->reference }}</td>
            <td>{{ $purchase->customer->user->profile->name ?? "N/A" }}</td>
            <td>{{ number_format($purchase->sub_total, 2, '.', ',') }}</td>
            <td>{{ number_format($purchase->discount, 2, '.', ',') }}</td>
			<td>{{ number_format($purchase->total, 2, '.', ',') }}</td>
			<td>{{ ucwords($purchase->status) }}</td>
			<td>{{ $purchase->user_created->profile->name ?? "N/A" }}</td>
            <td>{{ $purchase->created_at->format('Y-m-d') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>