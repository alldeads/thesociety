<tr>
	<td>{{ $item->created_at->format('F, j Y h:i:s a') }}</td>
	<td>{{ $item->user->profile->name }}</td>
	<td>{{ ucwords($item->chart_account->chart_name) }}</td>
	<td>
		{{ ucwords($item->chart_account->type->name) }}
	</td>

	@if ( $item->debit != 0 )
		<td style="color: blue;">
			{{ number_format($item->debit) }}
		</td>
	@else
		<td>
			-
		</td>
	@endif

	@if ( $item->credit != 0 )
		<td style="color: red;">
			({{ number_format($item->credit) }})
		</td>
	@else
		<td>
			-
		</td>
	@endif

	<td>{{ number_format($item->balance) }}</td>

	@if( auth()->user()->can('cash-flow.update') || auth()->user()->can('cash-flow.delete') )
		<td>
		    @can('cash-flow.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

	    	@can('cash-flow.delete')
	    		<span type="button" wire:click="delete">
					<i class="fas fa-trash ml-1"></i>
				</span>
		    @endcan
		</td>
	@endif
</tr>