<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Payee/Payor</th>
        <th>Title</th>
        <th>Account No.</th>
        <th>Check No.</th>
        <th>Description</th>
        <th>Notes</th>
        <th>Amount</th>
    </tr>
    </thead>
    <tbody>
        @foreach($receivables as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->posting_date }}</td>
                <td>{{ $item->user->profile->name ?? 'N/A' }}</td>
                <td>{{ ucwords($item->chart_account->chart_name) }}</td>
                <td>{{ $item->account_no }}</td>
                <td>{{ $item->check_no }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->notes }}</td>

                <td style="color: red;">
                    {{ number_format($item->amount, 2,'.', ',') }}
                </td>
            </tr>
        @endforeach
    </tbody>
</table>