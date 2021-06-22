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

	@if( auth()->user()->can('journal_entry.update') || auth()->user()->can('journal_entry.delete') || auth()->user()->can('journal_entry.read') )

		<td>
			<div class="dropdown">
                <button type="button" class="btn btn-sm dropdown-toggle hide-arrow" data-toggle="dropdown">
                   	<i class="fas fa-ellipsis-v ml-1"></i>
                </button>

                <div class="dropdown-menu">
                	@can('journal_entry.update')
	                    <a class="dropdown-item" wire:click="edit" href="javascript:void(0);">
	                      	<i class="fas fa-pen mr-1"></i>
	                      	<span>Edit</span>
	                    </a>
	                @endcan

	                @can('journal_entry.read')
	                    <a class="dropdown-item" wire:click="read" href="javascript:void(0);">
	                      	<i class="fas fa-eye mr-1"></i>
	                      	<span>View</span>
	                    </a>
	                @endcan

	                @can('journal_entry.delete')
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