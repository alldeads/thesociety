<table>
    <thead>
    <tr>
        <th>Account Code</th>
        <th>Account Title</th>
        <th>Account Type</th>
        <th>Date Created</th>
        <th>Created By</th>
    </tr>
    </thead>
    <tbody>
    @foreach($accounts as $account)
        <tr>
            <td>{{ $account->code }}</td>
            <td>{{ $account->chart_name }}</td>
            <td>{{ $account->type->name }}</td>
            <td>{{ $account->created_at->format('Y-m-d') }}</td>
            <td>{{ $account->user_created->profile->name ?? "N/A" }}</td>
        </tr>
    @endforeach
    </tbody>
</table>