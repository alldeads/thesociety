<tr>
	<td>{{ $item->id }}</td>
	<td>{{ ucwords($item->role->name) }}</td>
	<td>{{ $item->created_at->format('F j, Y') }}</td>
	<td>
		<button type="button" class="btn btn-sm btn-primary" wire:ignore>
      		<span>Edit</span>
    	</button>
    	<button wire:click="delete" type="button" class="btn btn-sm btn-danger" wire:ignore>
      		<span>Delete</span>
    	</button>
	</td>
</tr>