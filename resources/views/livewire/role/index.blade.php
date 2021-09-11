<div>
	<div class="row">
	  	<div class="col-12">
			<div class="card">
		  		<div class="card-body">
		  			<div class="d-flex justify-content-between">
		  				@can('role.create')
	  						<button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-role-create" wire:ignore>
			          			<i data-feather="plus" class="mr-25"></i>
			              		<span>Create</span>
			            	</button>
		            	@endcan

		            	@can('role.export')
			            	<div class="btn-group">
			              		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			              			<i class="fas fa-download mr-1"></i>
			              			<span>{{ __('Export') }}</span>
			              		</button>
					             <div class="dropdown-menu">
					                <a class="dropdown-item" href="{{ route('roles-export', [
					                	'type' => 'csv',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>{{ __('CSV') }}</span>
				                	</a>
				                	<a class="dropdown-item" href="{{ route('roles-export', [
					                	'type' => 'xls',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>{{ __('EXCEL (xls)') }}</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('roles-export', [
					                	'type' => 'xlsx',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>{{ __('EXCEL (xlsx)') }}</span>
				                	</a>

				                	<a class="dropdown-item" href="{{ route('roles-export', [
					                	'type' => 'pdf',
					                	'q'    => $this->search
					                ]) }}" target="_blank">
			              				<span>{{ __('PDF') }}</span>
				                	</a>
					            </div>
			            	</div>
			            @endcan  
		  			</div>
		  			<hr>
		  			<div class="row">
		  				<div class="col-md-10 col-12 mt-1">
		  					<div class="form-group">
			                  	<input type="text" class="form-control" placeholder="Search role name" wire:model="search"/>
	                		</div>
		  				</div>
		  				<div class="col-md-2 col-12 mt-1">
		  					<div class="form-group">
			                  	<select class="form-control" wire:model="limit">
			                  		<option value="10">{{ __('10 entries') }}</option>
			                  		<option value="25">{{ __('25 entries') }}</option>
			                  		<option value="50">{{ __('50 entries') }}</option>
			                  		<option value="100">{{ __('100 entries') }}</option>
			                  	</select>
	                		</div>
		  				</div>
		  			</div>
		 		</div>

		  		<div class="table-responsive">
					<table class="table table-hover">
			  			<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>Date Created</th>
								<th>Updated By</th>
								@if( auth()->user()->can('role.update') || auth()->user()->can('role.delete') || auth()->user()->can('role.read') )
									<th>Actions</th>
								@endif
							</tr>
			  			</thead>
			  			<tbody>
				  			@forelse($results as $result)
				  				@livewire('role.item', ['item' => $result], key($result->id))
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
	</div>

	@livewire('role.create', ['company_id' => $company_id])
	@livewire('role.edit', ['company_id' => $company_id])
	@livewire('role.delete', ['company_id' => $company_id])
	@livewire('role.read', ['company_id' => $company_id])
</div>

