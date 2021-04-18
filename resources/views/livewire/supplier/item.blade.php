<tr>
	<td>{{ $item->id }}</td>
	<td>{{ $item->user->profile->company }}</td>
	<td>{{ $item->user->profile->phone_number }}</td>

	<td>
		<span class="badge badge-pill  badge-light-{{ $item->status->color }}">
			{{ ucwords($item->status->name) }}
		</span>
	</td>

	<td>{{ $item->created_at->format('F j, Y') }}</td>

	@if( auth()->user()->can('supplier.update') || auth()->user()->can('supplier.delete') )
		<td>
		    @can('supplier.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

		    @can('supplier.read')
				<span type="button" wire:click="read">
					<i class="fas fa-eye ml-1"></i>
				</span>
		    @endcan

	    	@can('supplier.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>