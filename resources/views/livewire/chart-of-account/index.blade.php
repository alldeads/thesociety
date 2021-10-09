<div class="row">
  	<div class="col-12">
		<div class="card">
	  		@include('partials.card-body')

	  		<div class="table-responsive">
				<table class="table table-hover">
		  			<thead>
						<tr>
							<th>{{ __('Code') }}</th>
							<th>{{ __('Title') }}</th>
							<th>{{ __('Type') }}</th>
							@if( auth()->user()->can('chart.update') || auth()->user()->can('chart.delete') || auth()->user()->can('chart.read') )
								<th>{{ __('Actions') }}</th>
							@endif
						</tr>
		  			</thead>
		  			<tbody>
			  			@forelse($results as $result)
			  				@livewire('chart-of-account.item', ['account' => $result], key($result->id))
			  			@empty
			  				<tr class="text-center">
			  					<td colspan="4"> {{ __('No items found.') }}</td>
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

	@livewire('chart-of-account.edit')
	@livewire('chart-of-account.delete')
</div>