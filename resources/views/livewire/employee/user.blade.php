<tr>
	<td>{{ $user->id }}</td>
	<td>
		<img
			src="{{asset('images/portrait/small/avatar-s-5.jpg')}}"
			class="mr-75 round"
			height="20"
			width="20"
			alt="{{ ucwords($user->user->profile->name_with_mi) }}"/>
        <span class="font-weight-bold">{{ ucwords($user->user->profile->name_with_mi) }}</span>
	</td>
	<td>{{ ucwords($user->role->role_name) }}</td>
	<td>{{ $user->created_at->format('F j, Y') }}</td>
	<td>
		<span class="badge badge-pill  badge-light-{{ $user->user->status == "active" ? "success" : "danger" }}">
			{{ ucwords($user->user->status) }}
		</span>
	</td>

	@if(auth()->user()->can('employee.update') || auth()->user()->can('employee.delete'))
		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('employee.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan
	                
	                @can('employee.delete')
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