<tr>
	<td>{{ ucwords($item->id) }}</td>
	<td>{{ ucwords($item->user->profile->name) }}</td>
	<td>{{ ucwords($item->user->profile->phone_number) }}</td>

	<td>
		<span class="badge badge-pill  badge-light-{{ $item->status->color }}">
			{{ ucwords($item->status->name) }}
		</span>
	</td>

	@if( auth()->user()->can('customer.update') || auth()->user()->can('customer.delete') )
		<td>
		    @can('customer.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('customer.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>