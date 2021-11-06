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
							@if( auth()->user()->can('journal_entry.update') || auth()->user()->can('journal_entry.delete') || auth()->user()->can('journal_entry.read') )
								<th>Actions</th>
							@endif
						</tr>
		  			</thead>
		  			<tbody>
			  			@forelse($results as $key => $result)
			  				@livewire('journal-entry.item', ['item' => $result], key($result->id))
			  			@empty
			  				<tr class="text-center">
			  					<td colspan="6"> {{ __('No items found.') }}</td>
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

  	@livewire('journal-entry.delete', ['company_id' => $company_id])
</div>
