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

	@if( auth()->user()->can('supplier.update') || auth()->user()->can('supplier.delete') || auth()->user()->can('supplier.read') )
		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('supplier.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('supplier.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @can('supplier.delete')
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