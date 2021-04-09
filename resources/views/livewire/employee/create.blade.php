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
							<i data-feather="share-2"></i><span class="d-none d-sm-block">Social</span>
						</a>
					</li>
				</ul>

				<div class="tab-content">
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
																<input type="checkbox" class="custom-control-input" id="{{$menu->menu->base}}-write" wire:model="inputs.permissions.{{$menu->menu->base}}-write"/>
																<label class="custom-control-label" for="{{$menu->menu->base}}-write"></label>
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
									<button type="reset" class="btn btn-outline-secondary">Reset</button>
								</div>
							</div>
						</form>
					</div>

					<div class="tab-pane" id="information" aria-labelledby="information-tab" role="tabpanel">
						<form class="form-validate">
							<div class="row mt-1">
								<div class="col-12">
									<h4 class="mb-1">
										<i data-feather="user" class="font-medium-4 mr-25"></i>
										<span class="align-middle">Personal Information</span>
									</h4>
								</div>
								
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="birth">Birth date</label>
				  <input
					id="birth"
					type="text"
					class="form-control birthdate-picker"
					name="dob"
					placeholder="YYYY-MM-DD"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="mobile">Mobile</label>
				  <input id="mobile" type="text" class="form-control" value="&#43;6595895857" name="phone" />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="website">Website</label>
				  <input
					id="website"
					type="text"
					class="form-control"
					placeholder="Website here..."
					value="https://rowboat.com/insititious/Angelo"
					name="website"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="languages">Languages</label>
				  <select id="languages" class="form-control">
					<option value="English">English</option>
					<option value="Spanish">Spanish</option>
					<option value="French" selected>French</option>
					<option value="Russian">Russian</option>
					<option value="German">German</option>
					<option value="Arabic">Arabic</option>
					<option value="Sanskrit">Sanskrit</option>
				  </select>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label class="d-block mb-1">Gender</label>
				  <div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="male" name="gender" class="custom-control-input" />
					<label class="custom-control-label" for="male">Male</label>
				  </div>
				  <div class="custom-control custom-radio custom-control-inline">
					<input type="radio" id="female" name="gender" class="custom-control-input" checked />
					<label class="custom-control-label" for="female">Female</label>
				  </div>
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label class="d-block mb-1">Contact Options</label>
				  <div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="email-cb" checked />
					<label class="custom-control-label" for="email-cb">Email</label>
				  </div>
				  <div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="message" checked />
					<label class="custom-control-label" for="message">Message</label>
				  </div>
				  <div class="custom-control custom-checkbox custom-control-inline">
					<input type="checkbox" class="custom-control-input" id="phone" />
					<label class="custom-control-label" for="phone">Phone</label>
				  </div>
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
				  <label for="address-1">Address Line 1</label>
				  <input
					id="address-1"
					type="text"
					class="form-control"
					value="A-65, Belvedere Streets"
					name="address"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="address-2">Address Line 2</label>
				  <input id="address-2" type="text" class="form-control" placeholder="T-78, Groove Street" />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="postcode">Postcode</label>
				  <input id="postcode" type="text" class="form-control" placeholder="597626" name="zip" />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="city">City</label>
				  <input id="city" type="text" class="form-control" value="New York" name="city" />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="state">State</label>
				  <input id="state" type="text" class="form-control" name="state" placeholder="Manhattan" />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6">
				<div class="form-group">
				  <label for="country">Country</label>
				  <input id="country" type="text" class="form-control" name="country" placeholder="United States" />
				</div>
			  </div>
			  <div class="col-12 d-flex flex-sm-row flex-column mt-2">
				<button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
				<button type="reset" class="btn btn-outline-secondary">Reset</button>
			  </div>
			</div>
		  </form>
		  <!-- users edit Info form ends -->
		</div>
		<!-- Information Tab ends -->

		<!-- Social Tab starts -->
		<div class="tab-pane" id="social" aria-labelledby="social-tab" role="tabpanel">
		  <!-- users edit social form start -->
		  <form class="form-validate">
			<div class="row">
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="twitter-input">Twitter</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon3">
					  <i data-feather="twitter" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="twitter-input"
					type="text"
					class="form-control"
					value="https://www.twitter.com/adoptionism744"
					placeholder="https://www.twitter.com/"
					aria-describedby="basic-addon3"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="facebook-input">Facebook</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon4">
					  <i data-feather="facebook" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="facebook-input"
					type="text"
					class="form-control"
					value="https://www.facebook.com/adoptionism664"
					placeholder="https://www.facebook.com/"
					aria-describedby="basic-addon4"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="instagram-input">Instagram</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon5">
					  <i data-feather="instagram" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="instagram-input"
					type="text"
					class="form-control"
					value="https://www.instagram.com/adopt-ionism744"
					placeholder="https://www.instagram.com/"
					aria-describedby="basic-addon5"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="github-input">Github</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon9">
					  <i data-feather="github" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="github-input"
					type="text"
					class="form-control"
					value="https://www.github.com/madop818"
					placeholder="https://www.github.com/"
					aria-describedby="basic-addon9"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="codepen-input">Codepen</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon12">
					  <i data-feather="codepen" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="codepen-input"
					type="text"
					class="form-control"
					value="https://www.codepen.com/adoptism243"
					placeholder="https://www.codepen.com/"
					aria-describedby="basic-addon12"
				  />
				</div>
			  </div>
			  <div class="col-lg-4 col-md-6 form-group">
				<label for="slack-input">Slack</label>
				<div class="input-group input-group-merge">
				  <div class="input-group-prepend">
					<span class="input-group-text" id="basic-addon11">
					  <i data-feather="slack" class="font-medium-2"></i>
					</span>
				  </div>
				  <input
					id="slack-input"
					type="text"
					class="form-control"
					value="@adoptionism744"
					placeholder="https://www.slack.com/"
					aria-describedby="basic-addon11"
				  />
				</div>
			  </div>

			  <div class="col-12 d-flex flex-sm-row flex-column mt-2">
				<button type="submit" class="btn btn-primary mb-1 mb-sm-0 mr-0 mr-sm-1">Save Changes</button>
				<button type="reset" class="btn btn-outline-secondary">Reset</button>
			  </div>
			</div>
		  </form>
		  <!-- users edit social form ends -->
		</div>
		<!-- Social Tab ends -->
	  </div>
	</div>
  </div>
</section>
<!-- users edit ends -->
</div>