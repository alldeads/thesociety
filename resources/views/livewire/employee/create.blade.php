<div>
	<section class="app-user-edit">
		<div class="card">
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

				<ul class="nav nav-pills" role="tablist">
					<li class="nav-item" wire:ignore>
						<a class="nav-link d-flex align-items-center active"
							id="account-tab"
							data-toggle="tab"
							href="#account"
							aria-controls="account"
							role="tab"
							aria-selected="true">
							<i data-feather="user"></i><span class="d-none d-sm-block">Account</span>
						</a>
					</li>

					<li class="nav-item" wire:ignore>
						<a class="nav-link d-flex align-items-center" id="information-tab" data-toggle="tab" href="#information" aria-controls="information" role="tab" aria-selected="false">
							<i data-feather="info"></i><span class="d-none d-sm-block">Information</span>
						</a>
					</li>

					<li class="nav-item" wire:ignore>
						<a class="nav-link d-flex align-items-center" id="social-tab" data-toggle="tab" href="#social" aria-controls="social" role="tab" aria-selected="false">
							<i data-feather="server"></i><span class="d-none d-sm-block">Other Information</span>
						</a>
					</li>
				</ul>

				<em class="mb-2">Note: Please indicate N/A if not applicable, required fields <span style="color:red;">*</span></em>

				<div class="tab-content" wire:ignore>
					<div class="tab-pane active" id="account" aria-labelledby="account-tab" role="tabpanel">

						<form class="form-validate">
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="first_name">First Name <span style="color:red;">*</span></label>
										<input type="text" class="form-control" placeholder="First Name" wire:model="inputs.first_name" id="first_name"/>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="middle_name">Middle Name </label>
										<input type="text" class="form-control" placeholder="Middle Name" wire:model="inputs.middle_name" id="middle_name"/>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="last_name">Last Name <span style="color:red;">*</span></label>
										<input type="text" class="form-control" placeholder="Last Name" wire:model="inputs.last_name" id="last_name"/>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="roles">Role</label>
										<select class="form-control" wire:model="inputs.role">
											<option> Select Role</option>
											@foreach($roles as $role)
												<option value="{{ $role->id }}">
													{{ ucwords($role->role_name) }}
												</option>
											@endforeach
										</select>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="email">Email <span style="color:red;">*</span></label>
										<input type="text" class="form-control" placeholder="Email" wire:model="inputs.email" id="email"/>
									</div>
								</div>

								<div class="col-md-4">
									<div class="form-group">
										<label for="password">Password <span style="color:red;">*</span></label>
										<input type="password" class="form-control" placeholder="Password" wire:model="inputs.password" id="password"/>
									</div>
								</div>

								<div class="col-12">
									<div class="table-responsive border rounded mt-1">
										<h6 class="py-1 mx-1 mb-0 font-medium-2" wire:ignore>
											<i data-feather="lock" class="font-medium-3 mr-25"></i>
											<span class="align-middle">Permission</span>
										</h6>

										<table class="table table-striped table-borderless">
											<thead class="thead-light">
												<tr>
													<th>Module</th>
													<th>View</th>
													<th>Read</th>
													<th>Edit</th>
													<th>Create</th>
													<th>Delete</th>
													<th>Export</th>
												</tr>
											</thead>

											<tbody>
												@foreach( $menus as $menu )
													<tr>
														<td>{{ ucwords($menu->menu->name) }}</td>
														<td>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-view" wire:model="inputs.permissions.{{$menu->menu->base}}-view"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-view"></label>
															</div>
														</td>
														<td>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-read" wire:model="inputs.permissions.{{$menu->menu->base}}-read"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-read"></label>
															</div>
														</td>
														<td>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-update" wire:model="inputs.permissions.{{$menu->menu->base}}-update"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-update"></label>
															</div>
														</td>
														<td>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-create" wire:model="inputs.permissions.{{$menu->menu->base}}-create"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-create"></label>
															</div>
														</td>
														<td>
															<div class="custom-control custom-checkbox">
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-delete" wire:model="inputs.permissions.{{$menu->menu->base}}-delete"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-delete"></label>
															</div>
														</td>

														<td>
															<div class="custom-control custom-checkbox">
																@if ($menu->menu->is_export)
																	<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-export" wire:model="inputs.permissions.{{$menu->menu->base}}-export"/>
																	<label class="custom-control-label" for="{{$menu->menu->base}}-export"></label>
																@endif
															</div>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
									</div>
								</div>
								<div class="col-12 d-flex flex-sm-row flex-column mt-2">
									<button wire:click="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
						<form>
							<div class="row mt-1">
								<div class="col-12">
									<h4 class="mb-1" wire:ignore>
										<i data-feather="user" class="font-medium-4 mr-25"></i>
										<span class="align-middle">Personal Information</span>
									</h4>
								</div>
								
			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="birth">Birth date <span style="color:red;">*</span></label>
		  								<input id="birth" type="text" class="form-control birthdate-picker" wire:model="inputs.birth_date" placeholder="YYYY-MM-DD"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="phone">Phone No. <span style="color:red;">*</span></label>
			  							<input id="phone" type="text" class="form-control" wire:model="inputs.phone_number" placeholder="Enter Phone Number"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="marital">Marital Status <span style="color:red;">*</span></label>
				  						<select id="marital" class="form-control" wire:model="inputs.marital_status">
				  							<option>Select Marital Status</option>
											<option value="single">Single</option>
											<option value="married">Married</option>
											<option value="widowed">Widowed</option>
											<option value="divorced">Divorced</option>
											<option value="separated">Separated</option>
											<option value="rp">Registered Partnership</option>
				  						</select>
									</div>
		  						</div>

		  						<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="gender">Gender <span style="color:red;">*</span></label>
				  						<select id="gender" class="form-control" wire:model="inputs.gender">
				  							<option>Select Gender</option>
											<option value="male">Male</option>
											<option value="female">Female</option>
											<option value="others">Others</option>
				  						</select>
									</div>
		  						</div>
			  					
			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="date_hired">Date Hired</label>
		  								<input id="date_hired" type="text" class="form-control birthdate-picker" wire:model="inputs.date_hired" placeholder="YYYY-MM-DD"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="nationality">Nationality <span style="color:red;">*</span></label>
		  								<input id="nationality" type="text" class="form-control" wire:model="inputs.nationality" placeholder="Enter Nationality"/>
									</div>
			  					</div>

			  					<div class="col-12">
									<h4 class="mb-1 mt-2">
			  							<i data-feather="map-pin" class="font-medium-4 mr-25"></i>
			  							<span class="align-middle">Address</span>
									</h4>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="address-1">Address Line 1 <span style="color:red;">*</span></label>
				  						<input id="address-1" type="text" class="form-control" placeholder="Enter Address Line 1" wire:model="inputs.address_line_1"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="address-2">Address Line 2</label>
				  						<input id="address-2" type="text" class="form-control" placeholder="Enter Address Line 2" wire:model="inputs.address_line_2"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="city">Municipality/City <span style="color:red;">*</span></label>
				  						<input id="city" type="text" class="form-control" placeholder="Enter City or Municipality" wire:model="inputs.city"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="state">Province/State <span style="color:red;">*</span></label>
				  						<input id="state" type="text" class="form-control" placeholder="Enter Province or State" wire:model="inputs.state"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="postal">Postal Code <span style="color:red;">*</span></label>
				  						<input id="postal" type="text" class="form-control" placeholder="Enter Postal or Zip Code" wire:model="inputs.postal"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="country">Country <span style="color:red;">*</span></label>
				  						<input id="country" type="text" class="form-control" placeholder="Enter Country" wire:model="inputs.country"/>
									</div>
			  					</div>
			  
			  					<div class="col-12 d-flex flex-sm-row flex-column mt-2">
									<button wire:click="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
			  					</div>
							</div>
		  				</form>
					</div>

					<!-- Social Tab starts -->
					<div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
		  				<!-- users edit social form start -->
		  				<form>
							<div class="row mt-1">
								<div class="col-12">
									<h4 class="mb-1">
										<i data-feather="sidebar" class="font-medium-4 mr-25"></i>
										<span class="align-middle">Personal Information</span>
									</h4>
								</div>

			  					<div class="col-lg-3 col-md-6">
									<div class="form-group">
				  						<label for="sss">SSS <span style="color:red;">*</span></label>
				  						<input id="sss" type="text" class="form-control" placeholder="Enter SSS No." wire:model="inputs.sss"/>
									</div>
			  					</div>

			  					<div class="col-lg-3 col-md-6">
									<div class="form-group">
				  						<label for="pagibig">Pagibig <span style="color:red;">*</span></label>
				  						<input id="pagibig" type="text" class="form-control" placeholder="Enter Pagibig No." wire:model="inputs.pagibig"/>
									</div>
			  					</div>

			  					<div class="col-lg-3 col-md-6">
									<div class="form-group">
				  						<label for="philhealth">Philhealth <span style="color:red;">*</span></label>
				  						<input id="philhealth" type="text" class="form-control" placeholder="Enter Philhealth No." wire:model="inputs.philhealth"/>
									</div>
			  					</div>

			  					<div class="col-lg-3 col-md-6">
									<div class="form-group">
				  						<label for="tin">Tin <span style="color:red;">*</span></label>
				  						<input id="tin" type="text" class="form-control" placeholder="Enter Tin No." wire:model="inputs.tin"/>
									</div>
			  					</div>

								<div class="col-12">
									<h4 class="mb-1 mt-2">
			  							<i data-feather="alert-triangle" class="font-medium-4 mr-25"></i>
			  							<span class="align-middle">Emergency Contact Information</span>
									</h4>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="contact-name">Name <span style="color:red;">*</span></label>
				  						<input id="contact-name" type="text" class="form-control" placeholder="Enter Contact Name" wire:model="inputs.contact_name"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="contact_phone">Contact No. <span style="color:red;">*</span></label>
				  						<input id="contact_phone" type="text" class="form-control" placeholder="Enter Contact Phone" wire:model="inputs.contact_phone"/>
									</div>
			  					</div>

			  					<div class="col-lg-4 col-md-6">
									<div class="form-group">
				  						<label for="relationship">Relationship <span style="color:red;">*</span></label>
				  						<input id="relationship" type="text" class="form-control" placeholder="Enter Contact Relationship" wire:model="inputs.contact_relationship"/>
									</div>
			  					</div>

				  				<div class="col-12 d-flex flex-sm-row flex-column mt-2">
									<button wire:click="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
				  				</div>
							</div>
		  				</form>
					</div>
	  			</div>
			</div>
  		</div>
	</section>
</div>