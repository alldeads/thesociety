<table>
    <thead>
    <tr>
        <th>#</th>
        <th>Date</th>
        <th>Payee/Payor</th>
        <th>Account Title</th>
        <th>Account Type</th>
        <th>Account No.</th>
        <th>Check No.</th>
        <th>Description</th>
        <th>Notes</th>
        <th>Debit</th>
        <th>Credit</th>
    </tr>
    </thead>
    <tbody>
    @foreach($journalEntries as $item)
        <tr>
            <td>{{ $item->id }}</td>
            <td>{{ $item->posting_date }}</td>
            <td>{{ $item->user->profile->name ?? 'N/A' }}</td>
            <td>{{ ucwords($item->chart_account->chart_name) }}</td>
            <td>{{ ucwords($item->chart_account->type->name) }}</td>
            <td>{{ $item->account_no }}</td>
            <td>{{ $item->check_no }}</td>
            <td>{{ $item->description }}</td>
            <td>{{ $item->notes }}</td>
            @if ( $item->debit != 0 )
                <td style="color: blue;">
                    {{ number_format($item->debit, 2,'.', ',') }}
                </td>
            @else
                <td>
                    -
                </td>
            @endif

            @if ( $item->credit != 0 )
                <td style="color: red;">
                    {{ number_format($item->credit, 2,'.', ',') }}
                </td>
            @else
                <td>
                    -
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>