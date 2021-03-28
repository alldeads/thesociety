<div class="row" id="table-hover-animation">
  	<div class="col-12">
		<div class="card">
	  		<div class="card-body">
	  			<div class="row">
	  			
	  				<div class="col-md-6 col-lg-8 col-xl-8 col-sm-12 mt-1">
	  					<div class="form-group">
		                  <input type="text" class="form-control" placeholder="Search role name" wire:model="search"/>
                		</div>
	  				</div>

	  				<div class="col-md-3 col-lg-2 col-xl-2 col-sm-3 mt-1">
	  					<button type="button" class="btn btn-primary" wire:ignore>
		          			<i data-feather="plus" class="mr-25"></i>
		              		<span>Create</span>
		            	</button>
	  				</div>

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
							<th>Date Created</th>
							<th>Actions</th>
						</tr>
		  			</thead>
		  			<tbody>
			  			@foreach($results as $result)
			  				@livewire('role.item', ['item' => $result], key($result->id))
			  			@endforeach
		  			</tbody>
				</table>
	  		</div>
		</div>
  	</div>
</div>