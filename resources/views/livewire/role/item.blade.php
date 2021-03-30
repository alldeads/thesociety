<tr>
	<td>{{ $item->id }}</td>
	<td>{{ ucwords($item->role_name) }}</td>
	<td>{{ $item->created_at->format('F j, Y') }}</td>
	<td>
		<button wire:click="edit" type="button" class="btn btn-sm btn-primary" wire:ignore>
      		<span>Edit</span>
    	</button>
    	<button wire:click="delete" type="button" class="btn btn-sm btn-danger" wire:ignore>
      		<span>Delete</span>
    	</button>
	</td>
</tr>