<tr>
	<td>{{ $account->code }}</td>
	<td>{{ $account->chart_name }}</td>
	<td>
		<span class="badge badge-pill  badge-light-{{ $account->type->color }}">
			{{ $account->type->name }}
		</span>
	</td>

	@if( auth()->user()->can('chart.update') || auth()->user()->can('chart.delete') )

		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1" wire.click.prevent></i>
                </button>

                <div class="dropdown-menu">
                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
                      	<i class="fas fa-pen ml-1"></i>
                      	<span>Edit</span>
                    </a>
                    <a class="dropdown-item" href="javascript:void(0);">
                      	<i class="fas fa-trash ml-1"></i>
                      	<span>Delete</span>
                    </a>
                </div>
            </div>
		</td>
		{{-- <td>
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
		</td> --}}
	@endif
</tr>