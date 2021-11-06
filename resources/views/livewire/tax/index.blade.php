<div class="row">
  	<div class="col-12">
		<div class="card">

			@include('partials.card-body')

	  		<div class="table-responsive">
				<table class="table table-hover">
		  			<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Percentage %</th>
							@if( auth()->user()->can('tax.update') || auth()->user()->can('tax.delete') || auth()->user()->can('tax.read') )
								<th>Actions</th>
							@endif
						</tr>
		  			</thead>
		  			<tbody>
			  			@forelse($results as $result)
			  				@livewire('tax.item', ['item' => $result], key($result->id))
			  			@empty
			  				<tr class="text-center">
			  					<td colspan="3"> {{ __('No items found.') }}</td>
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

	@livewire('tax.delete', ['company_id' => $company_id])
</div>