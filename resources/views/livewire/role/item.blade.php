<tr>
	<td>{{ $item->id }}</td>
	<td>{{ ucwords($item->role_name) }}</td>
	<td>{{ $item->created_at->format('F j, Y') }}</td>
	<td>{{ $item->user_created->profile->name ?? '' }}</td>

	@if( auth()->user()->can('role.update') || auth()->user()->can('role.delete') )
		<td>
			@can('role.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('role.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>