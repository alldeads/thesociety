<div>
	<div class="row" id="table-hover-animation">
	  	<div class="col-12">
			<div class="card">
		  		<div class="card-body">
	  				<div class="d-flex justify-content-between">
			  			@can('cashflow.create')
	  						<button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-cash-flow-create" wire:ignore>
			          			<i data-feather="plus" class="mr-25"></i>
			              		<span>Create</span>
			            	</button>
		            	@endcan

		            	@can('cashflow.export')
				  			<div class="btn-group">
			              		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			              			<i class="fas fa-download mr-1"></i>
			              			<span>Export</span>
			              		</button>
					             <div class="dropdown-menu">
					                <a class="dropdown-item" href="{{ route('cash-flow-export', [
					                	'type' => 'csv',
					                	'q'    => $this->search,
					                	'from' => $this->date_from,
					                	'to'   => $this->date_to
					                ]) }}" target="_blank">
			              				<span>CSV</span>
				                	</a>
				                	<a class="dropdown-item" href="{{ route('cash-flow-export', [
					                	'type' => 'xls',
					                	'q'    => $this->search,
					                	'from' => $this->date_from,
					                	'to'   => $this->date_to
					                ]) }}" target="_blank">
			              				<span>EXCEL (xls)</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('cash-flow-export', [
					                	'type' => 'xlsx',
					                	'q'    => $this->search,
					                	'from' => $this->date_from,
					                	'to'   => $this->date_to
					                ]) }}" target="_blank">
			              				<span>EXCEL (xlsx)</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('cash-flow-export', [
					                	'type' => 'ods',
					                	'q'    => $this->search,
					                	'from' => $this->date_from,
					                	'to'   => $this->date_to
					                ]) }}" target="_blank">
			              				<span>ODS</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('cash-flow-export', [
					                	'type' => 'pdf',
					                	'q'    => $this->search,
					                	'from' => $this->date_from,
					                	'to'   => $this->date_to
					                ]) }}" target="_blank">
			              				<span>PDF</span>
				                	</a>
					            </div>
			            	</div>
			            @endcan   
					</div>
		  			<hr>
		  			<div class="row">
		  				<div class="col-md-6 col-lg-6 col-xl-6 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control" placeholder="Search account title, payee, or payor" wire:model="search"/>
	                		</div>
		  				</div>

		  				<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control basicpkr" placeholder="Date From" wire:model="date_from" />
	                		</div>
		  				</div>

		  				<div class="col-md-2 col-lg-2 col-xl-2 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control basicpkr" placeholder="Date To" wire:model="date_to" />
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
					<table class="table table-hover-animation">
			  			<thead>
							<tr>
								<th>Date</th>
								<th>Payee/Payor</th>
								<th>Title</th>
								<th>Type</th>
								<th>Debit</th>
								<th>Credit</th>
								<th>Balance</th>
								@if( auth()->user()->can('cashflow.update') || auth()->user()->can('cashflow.delete') )
									<th>Actions</th>
								@endif
							</tr>
			  			</thead>
			  			<tbody>
				  			@foreach($results as $result)
				  				@livewire('cash-flow.item', ['item' => $result], key($result->id))
				  			@endforeach
			  			</tbody>
					</table>
		  		</div>

		  		@if( count($results->items()) == 0 )
			  		<div class="m-auto p-2">
					  	<p>No Items Found.</p>
			  		</div>
		  		@endif
		  		
		  		<div class="m-auto">
		  			{{ $results->links() }}
		  		</div>
			</div>
	  	</div>
	</div>
</div>

@livewire('cash-flow.create', ['company_id' => $company_id])
@livewire('cash-flow.delete', ['company_id' => $company_id])