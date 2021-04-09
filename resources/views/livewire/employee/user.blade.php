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