<tr>
	<td>{{ $item->id }}</td>
	<td>{{ $item->name }}</td>
	<td>{{ $item->percentage }}</td>
	<td>{{ $item->fixed_rate }}</td>

	@if( auth()->user()->can('tax.update') || auth()->user()->can('tax.delete') )
		<td>
		    @can('tax.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('tax.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>