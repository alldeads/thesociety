<tr>
	<td>{{ $item->id }}</td>
	<td>{{ ucwords($item->role_name) }}</td>
	<td>{{ $item->created_at->format('F j, Y') }}</td>
	<td>{{ $item->user_updated->name ?? '' }}</td>

	@if( auth()->user()->can('role.update') || auth()->user()->can('role.delete') )
		<td>
			@can('role.update')
				<button wire:click="edit" type="button" class="btn btn-sm btn-primary" wire:ignore>
		      		<span>Edit</span>
		    	</button>
		    @endcan

	    	@can('role.delete')
		    	<button wire:click="delete" type="button" class="btn btn-sm btn-danger" wire:ignore>
		      		<span>Delete</span>
		    	</button>
		    @endcan
		</td>
	@endif
</tr>