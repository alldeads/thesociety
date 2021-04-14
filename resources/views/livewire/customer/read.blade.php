<section>
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

	  		<div class="step" data-target="#others" wire:ignore>
				<button type="button" class="step-trigger">
			  		<span class="bs-stepper-box">-</span>
			  			<span class="bs-stepper-label">
						<span class="bs-stepper-title">Others</span>
						<span class="bs-stepper-subtitle">Other Information</span>
			  		</span>
				</button>
	  		</div>

	  		<div wire:ignore>
				<button class="btn btn-success" wire:click="edit">Edit Customer</button>
	  		</div>
		</div>

		<div class="bs-stepper-content" wire:ignore>
	  		<div id="account-details-vertical" class="content" wire:ignore>
				<div class="content-header">
		  			<h5 class="mb-0">Basic Information</h5>
		  			<small class="text-muted">Enter Customer Information.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="first-name">First Name</label>
						<input type="text" id="first-name" class="form-control" readonly wire:model="inputs.first_name"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="last-name">Last Name</label>
						<input type="text" id="last-name" class="form-control"readonly wire:model="inputs.last_name"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-username">Phone No.</label>
						<input type="text" id="vertical-username" class="form-control" readonly wire:model="inputs.phone"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-email">Email</label>
						<input type="email" id="vertical-email" class="form-control" readonly wire:model="inputs.email"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="status">Status</label>
						<input type="text" id="status" class="form-control" readonly wire:model="inputs.status"/>
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
		  			<small>Enter Customer Company Details</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="company-name">Company Name</label>
						<input type="text" id="company-name" class="form-control" wire:model="inputs.company" readonly />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="position">Position</label>
						<input type="text" id="position" class="form-control" wire:model="inputs.position" readonly/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="telephone">Telephone No.</label>
						<input type="text" id="telephone" class="form-control" wire:model="inputs.telephone" readonly/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-business">Fax No.</label>
						<input type="text" id="fax" class="form-control" wire:model="inputs.fax" readonly/>
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
		  			<h5 class="mb-0">Billing Address</h5>
		  			<small>Enter Billing Address.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="address_line_1">Address Line 1</label>
						<input type="text" id="address_line_1" class="form-control" readonly wire:model="inputs.address_line_1" />
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="address-2">Address Line 2</label>
						<input type="text" id="address-2" class="form-control" readonly wire:model="inputs.address_line_2"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="city">City</label>
						<input type="text" id="city" class="form-control" readonly wire:model="inputs.city"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="state">State / Province</label>
						<input type="email" id="state" class="form-control" readonly wire:model="inputs.state"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="postal">Zip / Postal Code</label>
						<input type="text" id="postal" class="form-control" readonly wire:model="inputs.postal"/>
		  			</div>

		  			<div class="form-group col-md-6">
						<label class="form-label" for="country">Country</label>
						<input type="text" id="country" class="form-control" readonly wire:model="inputs.country"/>
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
					<small>Enter Customer Social Links.</small>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-twitter">Twitter</label>
						<input type="text" id="vertical-twitter" class="form-control" readonly wire:model="inputs.twitter"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-facebook">Facebook</label>
						<input type="text" id="vertical-facebook" class="form-control" readonly wire:model="inputs.facebook"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-instagram">Instagram</label>
						<input type="text" id="vertical-instagram" class="form-control"readonly wire:model="inputs.instagram"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-linkedin">Linkedin</label>
						<input type="text" id="vertical-linkedin" class="form-control" readonly wire:model="inputs.linkedin"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-pinterest">Pinterest</label>
						<input type="text" id="vertical-pinterest" class="form-control" readonly wire:model="inputs.pinterest"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-youtube">Youtube</label>
						<input type="text" id="vertical-youtube" class="form-control" readonly wire:model="inputs.youtube"/>
		  			</div>
				</div>
				<div class="d-flex justify-content-between">
		  			<button class="btn btn-primary btn-prev">
						<i data-feather="arrow-left" class="align-middle mr-sm-25 mr-0"></i>
						<span class="align-middle d-sm-inline-block d-none">Previous</span>
		  			</button>
				</div>
	  		</div>

	  		<div id="others" class="content" wire:ignore>
				<div class="content-header">
					<h5 class="mb-0">Other Information</h5>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-twitter">Created By</label>
						<input type="text" id="vertical-twitter" class="form-control" readonly wire:model="inputs.created_by"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-facebook">Last Updated By</label>
						<input type="text" id="vertical-facebook" class="form-control" readonly wire:model="inputs.updated_by"/>
		  			</div>
				</div>

				<div class="row">
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-twitter">Created At</label>
						<input type="text" id="vertical-twitter" class="form-control" readonly wire:model="inputs.created_at"/>
		  			</div>
		  			<div class="form-group col-md-6">
						<label class="form-label" for="vertical-facebook">Last Updated At</label>
						<input type="text" id="vertical-facebook" class="form-control" readonly wire:model="inputs.updated_at"/>
		  			</div>
				</div>
			</div>
		</div>
  	</div>
</section>