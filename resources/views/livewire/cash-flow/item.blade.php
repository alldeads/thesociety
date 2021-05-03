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

	@if( auth()->user()->can('cashflow.update') || auth()->user()->can('cashflow.delete') )
		<td>
		    @can('cashflow.update')
				<span type="button" wire:click="edit">
					<i class="fas fa-pen ml-1"></i>
				</span>
		    @endcan

		    @if ($last->id == $item->id)
		    	@can('cashflow.delete')
		    		<span type="button" wire:click="delete">
						<i class="fas fa-trash ml-1"></i>
					</span>
			    @endcan
			@endif
		</td>
	@endif
</tr>