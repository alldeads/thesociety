<tr>
	<td>{{ $account->code }}</td>
	<td>{{ ucwords($account->chart_name) }}</td>
	<td>
		<span class="badge badge-pill  badge-light-{{ $account->type->color }}">
			{{ ucwords($account->type->name) }}
		</span>
	</td>

	@if( auth()->user()->can('chart.update') || auth()->user()->can('chart.delete') )
		<td>
		    @can('chart.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('chart.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>