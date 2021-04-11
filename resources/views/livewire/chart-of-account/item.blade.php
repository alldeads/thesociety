<tr>
	<td>{{ $account->code }}</td>
	<td>{{ ucwords($account->chart_name) }}</td>
	<td>
		<span class="badge badge-pill  badge-light-{{ $account->type->color }}">
			{{ ucwords($account->type->name) }}
		</span>
	</td>

	@if( auth()->user()->can('employee.update') || auth()->user()->can('employee.delete') )
		<td>
		    @can('employee.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('employee.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>