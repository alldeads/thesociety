<tr>
	<td>{{ $item->id }}</td>
	<td>{{ ucwords($item->role_name) }}</td>
	<td>{{ $item->created_at->format('F j, Y') }}</td>
	<td>{{ $item->user_created->profile->name ?? '' }}</td>

	@if( auth()->user()->can('role.update') || auth()->user()->can('role.delete') || auth()->user()->can('role.read') )
		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('role.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('role.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @can('role.delete')
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