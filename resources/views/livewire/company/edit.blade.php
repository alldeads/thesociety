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
						<label class="form-label" for="vertical-username">Company Name</label>
						<input type="text" id="vertical-username" class="form-control" placeholder="johndoe" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Email</label>
						<input type="email" id="vertical-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-username">Phone No.</label>
						<input type="text" id="vertical-username" class="form-control" placeholder="johndoe" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Fax No.</label>
						<input type="email" id="vertical-email" class="form-control" placeholder="john.doe@email.com" aria-label="john.doe"/>
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
						<input type="text" id="vertical-twitter" class="form-control" placeholder="https://twitter.com/abc" />
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-facebook">Facebook</label>
						<input type="text" id="vertical-facebook" class="form-control" placeholder="https://facebook.com/abc" />
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-google">Google+</label>
						<input type="text" id="vertical-google" class="form-control" placeholder="https://plus.google.com/abc" />
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-linkedin">Linkedin</label>
						<input type="text" id="vertical-linkedin" class="form-control" placeholder="https://linkedin.com/abc" />
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