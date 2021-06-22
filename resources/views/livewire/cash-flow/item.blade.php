<tr>
	<td>{{ $item->posting_date }}</td>
	<td>{{ $item->user->profile->name }}</td>
	<td>{{ ucwords($item->chart_account->chart_name) }}</td>
	<td>
		{{ ucwords($item->chart_account->type->name) }}
	</td>

	@if ( $item->debit != 0 )
		<td style="color: blue;">
			{{ number_format($item->debit, 2,'.', ',') }}
		</td>
	@else
		<td>
			-
		</td>
	@endif

	@if ( $item->credit != 0 )
		<td style="color: red;">
			({{ number_format($item->credit, 2,'.', ',') }})
		</td>
	@else
		<td>
			-
		</td>
	@endif

	<td>{{ number_format($item->balance, 2,'.', ',') }}</td>

	@if( auth()->user()->can('cashflow.update') || auth()->user()->can('cashflow.delete') || auth()->user()->can('cashflow.read') )

		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('cashflow.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('cashflow.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @if ($last->id == $item->id)
		                @can('cashflow.delete')
		                    <a class="dropdown-item" wire:click="delete" href="javascript:void(0);">
		                      	<i class="fas fa-trash mr-1"></i>
		                      	<span>Delete</span>
		                    </a>
		                @endcan
	                @endif
                </div>
            </div>
		</td>
	@endif
</tr>