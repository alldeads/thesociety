<div class="row">
  	<div class="col-12">
		<div class="card">

			@include('partials.card-body')

	  		<div class="table-responsive">
				<table class="table table-hover">
		  			<thead>
						<tr>
							<th>Date</th>
							<th>Payee/Payor</th>
							<th>Title</th>
							<th>Type</th>
							<th>Debit</th>
							<th>Credit</th>
							<th>Balance</th>
							@if( auth()->user()->can('cashflow.update') || auth()->user()->can('cashflow.delete') || auth()->user()->can('cashflow.read'))
								<th>Actions</th>
							@endif
						</tr>
		  			</thead>
		  			<tbody>
			  			@forelse($results as $key => $result)
			  				@livewire('cash-flow.item', ['item' => $result], key($result->id))
			  			@empty
			  				<tr class="text-center">
			  					<td colspan="7"> {{ __('No items found.') }}</td>
			  				</tr>
			  			@endforelse
		  			</tbody>
				</table>
	  		</div>
	  		
	  		<div class="m-auto">
	  			{{ $results->links() }}
	  		</div>
		</div>
  	</div>

	@livewire('cash-flow.delete', ['company_id' => $company_id])
</div>