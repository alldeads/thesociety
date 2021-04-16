<section class="bs-validation">
  	<div class="row">
		<div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 m-auto">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title">{{ $product->name }}</h4>
				</div>

				<div class="card-body">

					<div class="form-group">
		  				<label class="form-label" for="sku">SKU</label>
		  				<input type="text" id="sku" class="form-control" readonly wire:model="inputs.sku"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="basic-addon-name">Name</label>
		  				<input type="text" id="name" class="form-control" readonly wire:model="inputs.name"/>
					</div>

					<div class="form-group">
		  				<label class="d-block" for="description">Description</label>
		  				<textarea class="form-control" readonly id="description" rows="3" wire:model="inputs.description"></textarea>
					</div>

					<div class="form-group">
		  				<label class="d-block" for="short">Brief Description</label>
		  				<input type="text" id="short" class="form-control" readonly wire:model="inputs.brief_description"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="cost">Cost</label>
		  				<input type="number" id="cost" class="form-control" readonly wire:model="inputs.cost"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="price">SRP Price</label>
		  				<input type="number" id="price" class="form-control" readonly wire:model="inputs.price"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="mark">Mark Up %</label>
		  				<input type="text" id="mark" class="form-control" wire:model="inputs.mark_up" readonly />
					</div>

					<div class="form-group">
		  				<label class="form-label" for="discounted">Discounted Price</label>
		  				<input type="number" id="discounted" class="form-control" readonly wire:model="inputs.discounted"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="quantity">Quantity</label>
		  				<input type="number" id="quantity" class="form-control" readonly wire:model="inputs.quantity"/>
					</div>

					<div class="form-group">
		  				<label class="form-label" for="threshold">Threshold</label>
		  				<input type="number" id="threshold" class="form-control" readonly wire:model="inputs.threshold"/>
					</div>

					<div class="form-group">
          				<label for="status">Status</label>
          				<input type="text" id="status" class="form-control" readonly wire:model="inputs.status"/>
        			</div>

        			<div class="form-group">
          				<label for="updated">Updated By</label>
          				<input type="text" id="updated" class="form-control" readonly wire:model="inputs.updated_by"/>
        			</div>

        			<div class="form-group">
          				<label for="Created">Created By</label>
          				<input type="text" id="Created" class="form-control" readonly wire:model="inputs.created_by"/>
        			</div>

        			<div class="form-group">
          				<label for="last_updated">Last Updated At</label>
          				<input type="text" id="last_updated" class="form-control" readonly wire:model="inputs.updated_at"/>
        			</div>

        			<div class="form-group">
          				<label for="Created_at">Created At</label>
          				<input type="text" id="Created_at" class="form-control" readonly wire:model="inputs.created_at"/>
        			</div>
				</div>
	  		</div>
		</div>
	</div>
</section>