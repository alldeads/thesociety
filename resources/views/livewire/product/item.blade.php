<tr>
	<td>{{ $item->sku }}</td>
	@if ( strlen($item->name) > 20 ) 
		<td>{{ substr($item->name, 0, 20) }}...</td>
	@else
		<td>{{ $item->name }}</td>
	@endif
	
	<td>{{ number_format($item->cost, 2, '.', ',') }}</td>
	<td>{{ number_format($item->srp_price, 2, '.', ',') }}</td>
	<td>{{ number_format($item->markup, 2, '.', ',') }}%</td>
	<td>{{ $item->quantity }}</td>
	<td>{{ ucwords($item->status) }}</td>

	<td>{{ $item->created_at->format('F j, Y') }}</td>

	@if( auth()->user()->can('product.update') || auth()->user()->can('product.delete') )
		<td>
		    @can('product.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

		    @can('product.read')
				<span type="button" wire:click="read">
					<i class="fas fa-eye ml-1"></i>
				</span>
		    @endcan

	    	@can('product.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>