<tr>
	<td>{{ $user->id }}</td>
	<td>{{ ucwords($user->user->name) }}</td>
	<td>{{ ucwords($user->role->role_name) }}</td>
	<td>{{ $user->created_at->format('F j, Y') }}</td>
	<td>{{ ucwords($user->user->status) }}</td>

	@if( auth()->user()->can('employee.update') || auth()->user()->can('employee.delete') )
		<td>
			@can('employee.update')
				<button wire:click="edit" type="button" class="btn btn-sm btn-primary" wire:ignore>
		      		<span>Edit</span>
		    	</button>
		    @endcan

	    	@can('employee.delete')
		    	<button wire:click="delete" type="button" class="btn btn-sm btn-danger" wire:ignore>
		      		<span>Delete</span>
		    	</button>
		    @endcan
		</td>
	@endif
</tr>