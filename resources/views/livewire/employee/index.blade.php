<div class="row" id="table-hover-animation">
  	<div class="col-12">
		<div class="card">
	  		<div class="card-body">
	  			<div class="row">
	  			
	  				<div class="col-md-6 col-lg-8 col-xl-8 col-sm-12 mt-1">
	  					<div class="form-group">
		                  	<input type="text" class="form-control" placeholder="Search employee name, email, role, and status" wire:model="search"/>
                		</div>
	  				</div>

	  				@can('role.create')
		  				<div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 mt-1">
		  					<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-employee-create" wire:ignore>
			          			<i data-feather="plus" class="mr-25"></i>
			              		<span>Create</span>
			            	</button>
		  				</div>
	  				@endcan

	  				<div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 mt-1">
	  					<div class="btn-group" wire:ignore>
		              		<button type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
			  				{{-- @livewire('role.item', ['item' => $result], key($result->id)) --}}

			  				<tr>
			  					<td>{{ $result->id }}</td>
			  					<td>{{ $result->user->name }}</td>
			  					<td>{{ $result->role->role_name }}</td>
			  					<td>{{ $result->created_at }}</td>
			  					<td>{{ $result->user->status }}</td>
			  					<td></td>
			  				</tr>
			  			@endforeach

			  			@if( count($results->toArray()) == 0 )
			  				<tr class="text-center">
			  					<td colspan="4"> No items found.</td>
			  				</tr>
			  			@endif
		  			</tbody>
				</table>
	  		</div>
		</div>
  	</div>
</div>

@livewire('role.create', ['company_id' => $company_id])
@livewire('role.edit', ['company_id' => $company_id])
@livewire('role.delete', ['company_id' => $company_id])