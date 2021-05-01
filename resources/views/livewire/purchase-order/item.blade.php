<tr>
	<td>{{ $item->reference }}</td>
	<td>{{ $item->supplier->user->profile->company }}</td>
	<td>{{ number_format($item->quantity, 2, '.', ',') }}</td>
	<td>{{ number_format($item->total, 2, '.', ',') }}</td>

	<td>
		<span class="badge badge-pill  badge-light-{{ $item->status->color }}">
			{{ ucwords($item->status->name) }}
		</span>
	</td>

	<td>{{ $item->user_approved->profile->name ?? "N/A" }}</td>

	<td>{{ $item->created_at->format('F j, Y') }}</td>

	@if( auth()->user()->can('purchase_order.update') || auth()->user()->can('purchase_order.delete') )
		<td>
		    @if ($item->status->name != "approved")
		    	@can('purchase_order.update')
					<span type="button" wire:click="approve">
						<i class="fas fa-check ml-1"></i>
					</span>
			    @endcan
		    @endif

		    @can('purchase_order.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

		    @can('purchase_order.read')
				<span type="button" wire:click="read">
					<i class="fas fa-eye ml-1"></i>
				</span>
		    @endcan

	    	@can('purchase_order.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>