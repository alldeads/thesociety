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
						<span class="bs-stepper-subtitle">Add Information</span>
			  		</span>
				</button>
	  		</div>

	  		<div class="step" data-target="#personal-info-vertical" wire:ignore>
				<button type="button" class="step-trigger">
		  			<span class="bs-stepper-box">2</span>
		  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Details</span>
						<span class="bs-stepper-subtitle">Add Company Details</span>
		  			</span>
				</button>
	  		</div>

	  		<div class="step" data-target="#address-step-vertical" wire:ignore>
				<button type="button" class="step-trigger">
		  			<span class="bs-stepper-box">3</span>
		  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Address</span>
						<span class="bs-stepper-subtitle">Add Address</span>
		  			</span>
				</button>
	  		</div>

  			<div class="step" data-target="#social-links-vertical" wire:ignore>
				<button type="button" class="step-trigger">
		  			<span class="bs-stepper-box">4</span>
		  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Social Links</span>
						<span class="bs-stepper-subtitle">Add Social Links</span>
	  				</span>
				</button>
	  		</div>
		</div>

		<div class="bs-stepper-content" wire:ignore>
	  		<div id="account-details-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Basic Information</h5>
		  			<small class="text-muted">Enter Your Company Information.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-username">Company Name</label>
						<input type="text" id="vertical-username" class="form-control" placeholder="Enter Company Name" wire:model="inputs.name"/>
						@error('name') <span class="error">{{ $message }}</span> @enderror
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Email</label>
						<input type="email" id="vertical-email" class="form-control" placeholder="Enter Company Email" wire:model="inputs.email"/>
						@error('email') <span class="error">{{ $message }}</span> @enderror
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-username">Phone No.</label>
						<input type="text" id="vertical-username" class="form-control" placeholder="Enter Company Phone" wire:model="inputs.phone"/>
						@error('phone') <span class="error">{{ $message }}</span> @enderror
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Fax No.</label>
						<input type="text" id="vertical-email" class="form-control" placeholder="Enter Company Fax" wire:model="inputs.fax"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="avatar">
							<img class="img-fluid rounded"
								src="{{ $company->avatar ?? '' }}"
								width="150"
								alt="Company logo"/>
						</label>
						<input type="file" id="avatar" class="form-control" wire:model="inputs.avatar"/>
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

	  		<div id="personal-info-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Company Details</h5>
		  			<small>Enter Your Company Details</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-bir">BIR No.</label>
						<input type="text" id="vertical-bir" class="form-control" placeholder="Enter BIR No." wire:model="inputs.bir" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-sss">SSS No.</label>
						<input type="text" id="vertical-sss" class="form-control" placeholder="Enter SSS No." wire:model="inputs.sss"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-dti">DTI No.</label>
						<input type="text" id="vertical-dti" class="form-control" placeholder="Enter DTI No." wire:model="inputs.dti"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-business">Business Permit No.</label>
						<input type="text" id="vertical-business" class="form-control" placeholder="Enter Business Permit No." wire:model="inputs.business_permit"/>
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

	  		<div id="address-step-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Company Address</h5>
		  			<small>Enter Your Company Address.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="street">Address Line 1</label>
						<input type="text" id="street" class="form-control" placeholder="Enter Address Line 1" wire:model="inputs.address_line_1" />
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

	  		<div id="social-links-vertical" class="content" wire:ignore>
				<div class="content-header">
					<h5 class="mb-0">Social Links</h5>
					<small>Enter Your Social Links.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-twitter">Twitter</label>
						<input type="text" id="vertical-twitter" class="form-control" placeholder="https://twitter.com/abc" wire:model="inputs.twitter"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-facebook">Facebook</label>
						<input type="text" id="vertical-facebook" class="form-control" placeholder="https://facebook.com/abc" wire:model="inputs.facebook"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-instagram">Instagram</label>
						<input type="text" id="vertical-instagram" class="form-control" placeholder="https://instagram.com/abc" wire:model="inputs.instagram"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-linkedin">Linkedin</label>
						<input type="text" id="vertical-linkedin" class="form-control" placeholder="https://linkedin.com/abc" wire:model="inputs.linkedin"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-pinterest">Pinterest</label>
						<input type="text" id="vertical-pinterest" class="form-control" placeholder="https://pinterest.com/abc" wire:model="inputs.pinterest"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-youtube">Youtube</label>
						<input type="text" id="vertical-youtube" class="form-control" placeholder="https://youtube.com/abc" wire:model="inputs.youtube"/>
		  			</div>
				</div>
				<div class="d-flex justify-content-between">
		  			<button class="btn btn-primary btn-prev">
						<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
						<span class="align-middle d-sm-inline-block d-none">Previous</span>
		  			</button>
	  				<button class="btn btn-success" wire:click="save">Submit</button>
				</div>
	  		</div>
		</div>
  	</div>
</section>