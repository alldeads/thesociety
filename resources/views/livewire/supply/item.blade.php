<tr>
	<td> <a href="#" wire:click.prevent="read"> {{ $item->sku }} </a></td>
	@if ( strlen($item->name) > 20 ) 
		<td>{{ substr($item->name, 0, 20) }}...</td>
	@else
		<td>{{ $item->name }}</td>
	@endif
	
	<td>{{ number_format($item->cost, 2, '.', ',') }}</td>
	<td>{{ ucwords($item->status) }}</td>

	<td>{{ $item->created_at->format('F j, Y') }}</td>

	@if( auth()->user()->can('supply.update') || auth()->user()->can('supply.delete') || auth()->user()->can('supply.read') )
		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('supply.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('supply.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @can('supply.delete')
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