<section class="bs-validation">
  	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 m-auto">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title">Create Supply</h4>
				</div>

				<div class="card-body">
	  				<div class="alert alert-danger" style="display: {{ count($errors) > 0 ? 'block' : 'none' }}" role="alert">
						<div class="alert-body">
							<i data-feather="info"></i>
							<ul style="list-style: none;">
						        @foreach($errors->all() as $error)
						        	<li>{{$error}}</li>
						        @endforeach
				    		</ul>
						</div>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="sku">SKU</label>
		  				<input type="text" id="sku" class="form-control" placeholder="Enter SKU" wire:model="inputs.sku"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="basic-addon-name">Name <span style="color:red;">*</span></label>
		  				<input type="text" id="name" class="form-control" placeholder="Enter Name" wire:model="inputs.name"/>
					</div>

					<div class="form-group">
		  				<label class="d-block" for="description">Description <span style="color:red;">*</span></label>
		  				<textarea class="form-control" id="description" rows="3" wire:model="inputs.description"></textarea>
					</div>
		
					<div class="form-group">
		  				<label for="customFile1">Image</label>
		  				<input type="file" class="form-control" id="image" wire:model="inputs.avatar" />
					</div>

					<div class="form-group">
		  				<label class="form-label" for="cost">Cost <span style="color:red;">*</span></label>
		  				<input type="number" id="cost" class="form-control" placeholder="Enter Cost" wire:model="inputs.cost"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="quantity">Quantity <span style="color:red;">*</span></label>
		  				<input type="number" id="quantity" class="form-control" placeholder="Enter Initial Quantity" wire:model="inputs.quantity"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="threshold">Threshold</label>
		  				<input type="number" id="threshold" class="form-control" placeholder="Enter Threshold" wire:model="inputs.threshold"/>
					</div>

					<div class="form-group">
          				<label for="status">Status</label>
          				<select class="form-control" id="status" wire:model="inputs.status">
							<option value="">Select Status</option>
							<option value="published">Publish</option>
							<option value="draft">Draft</option>
							<option value="new">New</option>
							<option value="in-stock">In Stock</option>
							<option value="out-stock">Out of Stock</option>
          				</select>
        			</div>
		
					<div class="row">
		  				<div class="col-12">
							<button wire:click.prevent="submit" class="btn btn-primary">Submit</button>
		  				</div>
					</div>
				</div>
	  		</div>
		</div>
	</div>
</section>