<tr>
	<td>
		<a href="#" wire:click.prevent="read">
			{{ $item->posting_date }}
		</a>
	</td>
	<td>{{ $item->user->profile->name }}</td>

	<td>
		<span class="badge badge-light-primary badge-pill"> {{ ucwords($item->chart_account->chart_name) }} </span>
	</td>
	
	<td>
		<span class="badge badge-light-danger badge-pill"> {{ number_format($item->amount, 2,'.', ',') }} </span>
	</td>

	@if( auth()->user()->can('expense.update') || auth()->user()->can('expense.delete') || auth()->user()->can('expense.read') )

		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('expense.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('expense.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

                    @can('expense.delete')
                        <a class="dropdown-item" wire:click="delete" href="javascript:void(0);">
                            <i class="fas fa-trash mr-1"></i>
                            <span>Delete</span>
                        </a>
                    @endcan
                </div>
            </div>
		</td>
	@endif
</tr>