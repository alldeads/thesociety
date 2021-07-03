<tr>
	<td>{{ $item->reference }}</td>
	<td>{{ $item->supplier->user->profile->company ?? "N/A" }}</td>
	<td>{{ number_format($item->quantity, 2, '.', ',') }}</td>
	<td>{{ number_format($item->total, 2, '.', ',') }}</td>

	<td>
		<span class="badge badge-pill  badge-light-{{ $item->status->color }}">
			{{ ucwords($item->status->name) }}
		</span>
	</td>

	<td>{{ $item->user_approved->profile->name ?? "N/A" }}</td>

	<td>{{ $item->created_at->format('F j, Y') }}</td>

	@if( auth()->user()->can('purchase_order.update') || auth()->user()->can('purchase_order.delete') || auth()->user()->can('purchase_order.read') )
		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('purchase_order.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('purchase_order.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @can('purchase_order.delete')
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