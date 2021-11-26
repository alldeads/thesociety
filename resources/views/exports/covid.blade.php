<table>
    <thead>
    <tr>
    	<th>ID</th>
    	<th>Full Name</th>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Date Visited</th>
    </tr>
    </thead>
    <tbody>
    @foreach($covid as $item)
        <tr>
        	<td>{{ $item->id }}</td>
            <td>{{ ucwords($item->name) }}</td>
            <td>{{ ucwords($item->first_name) }}</td>
            <td>{{ ucwords($item->last_name) }}</td>
            <td>{{ $item->phone }}</td>
            <td>{{ $item->address }}</td>
            <td>{{ $item->created_at->format('F j, Y h:i:s a') }}</td>
        </tr>
    @endforeach
    </tbody>
</table>