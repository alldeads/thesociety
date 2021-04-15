<section>
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

  	<div class="bs-stepper vertical vertical-wizard-example">
		<div class="bs-stepper-header">
	  		<div class="step" data-target="#account-details-vertical" wire:ignore>
				<button type="button" class="step-trigger">
			  		<span class="bs-stepper-box">1</span>
			  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Basic Information</span>
						<span class="bs-stepper-subtitle">Supplier Information</span>
			  		</span>
				</button>
	  		</div>

	  		<div class="step" data-target="#address-step-vertical" wire:ignore>
				<button type="button" class="step-trigger">
		  			<span class="bs-stepper-box">2</span>
		  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Address</span>
						<span class="bs-stepper-subtitle">Supplier Address</span>
		  			</span>
				</button>
	  		</div>

	  		<div class="step" data-target="#personal-info-vertical" wire:ignore>
				<button type="button" class="step-trigger">
		  			<span class="bs-stepper-box">3</span>
		  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Contacts</span>
						<span class="bs-stepper-subtitle">Supplier Representative</span>
		  			</span>
				</button>
	  		</div>

	  		<div wire:ignore>
				<button class="btn btn-success" wire:click="submit">Save Changes</button>
	  		</div>
		</div>

		<div class="bs-stepper-content" wire:ignore>
	  		<div id="account-details-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Basic Information</h5>
		  			<small class="text-muted">Enter Supplier Information.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="company-name">Company Name</label>
						<input type="text" id="company-name" class="form-control" placeholder="Enter Company Name" wire:model="inputs.company" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="telephone">Telephone No.</label>
						<input type="text" id="telephone" class="form-control" placeholder="Enter Telephone No." wire:model="inputs.telephone"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-username">Phone No.</label>
						<input type="text" id="vertical-username" class="form-control" placeholder="Enter Phone No." wire:model="inputs.phone"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Email</label>
						<input type="email" id="vertical-email" class="form-control" placeholder="Enter Email Address" wire:model="inputs.email"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="status">Status</label>
						<select class="form-control" id="status" wire:model="inputs.status">
							<option>Select status</option>
							@foreach($statuses as $status)
								<option value="{{ $status->id }}"> {{ ucwords($status->name) }}</option>
							@endforeach
						</select>
		  			</div>
				</div>

				<div class="d-flex justify-content-between">
		  			<button class="btn btn-outline-secondary btn-prev" disabled>
						<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
						<span class="align-middle d-sm-inline-block d-none">Previous</span>
		  			</button>
		  			<button class="btn btn-primary btn-next">
						<span class="align-middle d-sm-inline-block d-none">Next</span>
						<i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
		  			</button>
				</div>
	  		</div>

	  		<div id="address-step-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Supplier Address</h5>
		  			<small>Enter Supplier Address.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="address_line_1">Address Line 1</label>
						<input type="text" id="address_line_1" class="form-control" placeholder="Enter Address Line 1" wire:model="inputs.address_line_1" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="address-2">Address Line 2</label>
						<input type="text" id="address-2" class="form-control" placeholder="Enter Address Line 2" wire:model="inputs.address_line_2"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="city">City</label>
						<input type="text" id="city" class="form-control" placeholder="Enter City" wire:model="inputs.city"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="state">State / Province</label>
						<input type="email" id="state" class="form-control" placeholder="Enter State or Province" wire:model="inputs.state"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="postal">Zip / Postal Code</label>
						<input type="text" id="postal" class="form-control" placeholder="Enter Zip Code" wire:model="inputs.postal"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="country">Country</label>
						<input type="text" id="country" class="form-control" placeholder="Enter Country" wire:model="inputs.country"/>
		  			</div>
				</div>

				<div class="d-flex justify-content-between">
		  			<button class="btn btn-primary btn-prev">
						<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
						<span class="align-middle d-sm-inline-block d-none">Previous</span>
		  			</button>
		  			<button class="btn btn-primary btn-next">
						<span class="align-middle d-sm-inline-block d-none">Next</span>
						<i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
		  			</button>
				</div>
	  		</div>

	  		<div id="personal-info-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Supplier Contact</h5>
		  			<small>Enter Customer Company Details</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="first-name">First Name</label>
						<input type="text" id="first-name" class="form-control" placeholder="Enter First Name" wire:model="inputs.first_name"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="last-name">Last Name</label>
						<input type="text" id="last-name" class="form-control" placeholder="Enter Last Name" wire:model="inputs.last_name"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-contact_phone">Contact Phone No.</label>
						<input type="text" id="vertical-contact_phone" class="form-control" placeholder="Enter Phone No." wire:model="inputs.contact_phone"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-contact_email">Contact Email</label>
						<input type="email" id="vertical-contact_email" class="form-control" placeholder="Enter Email Address" wire:model="inputs.contact_email"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="position">Position</label>
						<input type="text" id="position" class="form-control" placeholder="Enter Position" wire:model="inputs.position"/>
		  			</div>
				</div>

				<div class="d-flex justify-content-between">
		  			<button class="btn btn-primary btn-prev">
						<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
						<span class="align-middle d-sm-inline-block d-none">Previous</span>
		  			</button>
		  			<button class="btn btn-primary btn-next">
						<span class="align-middle d-sm-inline-block d-none">Next</span>
						<i data-feather="arrow-right" class="align-middle ml-sm-25 ml-0"></i>
		  			</button>
				</div>
	  		</div>
		</div>
  	</div>
</section>