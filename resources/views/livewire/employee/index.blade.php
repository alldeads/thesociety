<div>
	<div class="row" id="table-hover-animation">
	  	<div class="col-12">
			<div class="card">
		  		<div class="card-body">
		  			<div class="d-flex justify-content-between">
		  				@can('role.create')
	  						<button type="button" class="btn btn-primary rounded" wire:click="create" wire:ignore>
			          			<i data-feather="plus" class="mr-25"></i>
			              		<span>Create</span>
			            	</button>
		            	@endcan

		            	<div class="btn-group" wire:ignore>
		            		@can('employee.export')
			              		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			              			<i data-feather="share" class="mr-25"></i>
			              			<span>Export</span>
			              		</button>
					             <div class="dropdown-menu">
				                	<a class="dropdown-item" href="javascript:void(0);">
				                		<i data-feather="printer" class="mr-25"></i>
			              				<span>Print</span>
				                	</a>
					                <a class="dropdown-item" href="javascript:void(0);">
				                		<i data-feather="file-text" class="mr-25"></i>
			              				<span>Csv</span>
				                	</a>
				                	<a class="dropdown-item" href="javascript:void(0);">
				                		<i data-feather="file" class="mr-25"></i>
			              				<span>Excel</span>
				                	</a>
					            </div>
					        @endcan   
		            	</div>
		  			</div>
		  			<hr>
		  			<div class="row">
		  				<div class="col-md-10 col-lg-10 col-xl-10 col-sm-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control" placeholder="Search employee name, email, role, and status" wire:model="search"/>
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
								<th>ID</th>
								<th>Name</th>
								<th>Role</th>
								<th>Date Hired</th>
								<th>Status</th>
								@if( auth()->user()->can('employee.update') || auth()->user()->can('employee.delete') )
									<th>Actions</th>
								@endif
							</tr>
			  			</thead>
			  			<tbody>
				  			@foreach($results as $result)
				  				@livewire('employee.user', ['user' => $result], key($result->id))
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

	@livewire('employee.delete', ['company_id' => $company_id])
</div>