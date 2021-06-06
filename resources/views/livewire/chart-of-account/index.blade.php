<div>
	<div class="row" id="table-hover-animation">
	  	<div class="col-12">
			<div class="card">
		  		<div class="card-body">
		  			<div class="d-flex justify-content-between">
		  				@can('chart.create')
	  						<button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-chart-create" wire:ignore>
			          			<i data-feather="plus" class="mr-25"></i>
			              		<span>Create</span>
			            	</button>
		            	@endcan

		            	<div class="btn-group">
		            		@can('chart.export')
			              		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			              			<i class="fas fa-download mr-1"></i>
			              			<span>Export</span>
			              		</button>
					             <div class="dropdown-menu">
					                <a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
					                	'type' => 'csv',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>Csv</span>
				                	</a>
				                	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
					                	'type' => 'xls',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>Excel (xls)</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
					                	'type' => 'xlsx',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>Excel (xlsx)</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
					                	'type' => 'pdf',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>PDF</span>
				                	</a>
					            </div>
					        @endcan   
		            	</div>
		  			</div>
		  			<hr>
		  			<div class="row">
		  				<div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control" placeholder="Search account title, account type, and code" wire:model="search"/>
	                		</div>
		  				</div>
		  				<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<select class="form-control" wire:model="limit">
			                  		<option value="10">10 entries</option>
			                  		<option value="25">25 entries</option>
			                  		<option value="50">50 entries</option>
			                  		<option value="100">100 entries</option>
			                  	</select>
	                		</div>
		  				</div>
		  			</div>
		 		</div>

		  		<div class="table-responsive">
					<table class="table">
			  			<thead>
							<tr>
								<th>Code</th>
								<th>Title</th>
								<th>Type</th>
								@if( auth()->user()->can('chart.update') || auth()->user()->can('chart.delete') )
									<th>Actions</th>
								@endif
							</tr>
			  			</thead>
			  			<tbody>
				  			@foreach($results as $result)
				  				@livewire('chart-of-account.item', ['account' => $result], key($result->id))
				  			@endforeach

				  			@if( count($results->toArray()) == 0 )
				  				<tr class="text-center">
				  					<td colspan="4"> No items found.</td>
				  				</tr>
				  			@endif
			  			</tbody>
					</table>
		  		</div>
		  		<div class="m-auto">
		  			{{ $results->links() }}
		  		</div>
			</div>
	  	</div>
	</div>
</div>

@livewire('chart-of-account.create', ['company_id' => $company_id])
@livewire('chart-of-account.edit', ['company_id' => $company_id])
@livewire('chart-of-account.read')
@livewire('chart-of-account.delete', ['company_id' => $company_id])