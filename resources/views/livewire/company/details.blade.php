<section class="app-user-view">
  	<!-- User Card & Plan Starts -->
  	<div class="row">
		<!-- User Card starts-->
		<div class="col-xl-9 col-lg-8 col-md-7">
	  		<div class="card user-card">
				<div class="card-body">
		  			<div class="row">
						<div class="col-xl-6 col-lg-12 d-flex flex-column justify-content-between border-container-lg">
			  				<div class="user-avatar-section">
								<div class="d-flex justify-content-start">
				  					<img class="img-fluid rounded"
										src="{{ $company->avatar ?? '' }}"
										height="104"
										width="104"
										alt="Company logo"/>

				  					<div class="d-flex flex-column ml-1">
										<div class="user-info mb-1">
					  						<h4 class="mb-0">{{ $company->name ?? '' }}</h4>
					  						<span class="card-text">{{ $company->email ?? '' }}</span>
										</div>
										
										@can('company.update')
											<div class="d-flex flex-wrap">
						  						<a href="{{ route('company-edit') }}" class="btn btn-primary">Edit</a>
											</div>
										@endcan
				  					</div>
								</div>
			  				</div>

			  				<div class="d-flex align-items-center user-total-numbers">
								<div class="d-flex align-items-center mr-2">
				  					<div class="color-box bg-light-primary">
										<i data-feather="dollar-sign" class="text-primary"></i>
				  					</div>
				  					<div class="ml-1">
										<h5 class="mb-0">23.3k</h5>
										<small>Monthly Sales</small>
				  					</div>
								</div>
								<div class="d-flex align-items-center">
				  					<div class="color-box bg-light-success">
										<i data-feather="trending-up" class="text-success"></i>
				  					</div>
				  					<div class="ml-1">
										<h5 class="mb-0">$99.87K</h5>
										<small>Annual Profit</small>
				  					</div>
								</div>
			  				</div>
						</div>

						<div class="col-xl-6 col-lg-12 mt-2 mt-xl-0">
			  				<div class="user-info-wrapper">
								<div class="d-flex flex-wrap">
				  					<div class="user-info-title">
										<i data-feather="user" class="mr-1"></i>
										<span class="card-text user-info-title font-weight-bold mb-0">Company</span>
				  					</div>
				  					<p class="card-text mb-0">{{ $company->name ?? '' }}</p>
								</div>
								<div class="d-flex flex-wrap my-50">
				  					<div class="user-info-title">
										<i data-feather="check" class="mr-1"></i>
										<span class="card-text user-info-title font-weight-bold mb-0">Status</span>
				  					</div>
				  					<p class="card-text mb-0">{{ $company->status ?? '' }}</p>
								</div>
								<div class="d-flex flex-wrap my-50">
				  					<div class="user-info-title">
										<i data-feather="star" class="mr-1"></i>
										<span class="card-text user-info-title font-weight-bold mb-0">Nature</span>
				  					</div>
				  					<p class="card-text mb-0">{{ $company->nature ?? '' }}</p>
								</div>
								<div class="d-flex flex-wrap my-50">
				  					<div class="user-info-title">
										<i data-feather="flag" class="mr-1"></i>
										<span class="card-text user-info-title font-weight-bold mb-0">Country</span>
				  					</div>
				  					<p class="card-text mb-0">Philippines</p>
								</div>
								<div class="d-flex flex-wrap">
				  					<div class="user-info-title">
										<i data-feather="phone" class="mr-1"></i>
										<span class="card-text user-info-title font-weight-bold mb-0">Phone</span>
				  					</div>
				  					<p class="card-text mb-0">{{ $company->phone ?? '' }}</p>
								</div>
			  				</div>
						</div>
		  			</div>
				</div>
	  		</div>
		</div>
		<!-- /User Card Ends-->

		<!-- Plan Card starts-->
		<div class="col-xl-3 col-lg-4 col-md-5">
	  		<div class="card plan-card border-primary">
				<div class="card-header d-flex justify-content-between align-items-center pt-75 pb-1">
		  			<h5 class="mb-0">Current Plan</h5>
	  				<span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date">May 20, <span class="nextYear"></span>
	  				</span>
				</div>
				<div class="card-body">
		  			<div class="badge badge-light-primary">Platinum</div>
	  				<ul class="list-unstyled my-1">
						<li>
		  					<span class="align-middle">25 User(s)</span>
						</li>
						<li class="my-25">
		  					<span class="align-middle">Unlimited storage</span>
						</li>
						<li class="my-25">
		  					<span class="align-middle">15 features</span>
						</li>
						<li>
		  					<span class="align-middle">Premium Support</span>
						</li>
	  				</ul>
	  				<button class="btn btn-primary text-center btn-block">Upgrade Plan</button>
				</div>
  			</div>
		</div>
		<!-- /Plan CardEnds -->
  	</div>
  	<!-- User Card & Plan Ends -->

  	<!-- User Timeline & Permissions Starts -->
  	<div class="row">
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-primary p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="users" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $employees }}</h2>
                    <p class="card-text">Employees</p>
                </div>
                <div id="employee-chart"></div>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="map-pin" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $branches }}</h2>
                    <p class="card-text">Branches</p>
                </div>
                <div id="branch-chart"></div>
            </div>
        </div>

        <!-- Orders Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="shopping-bag" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $products }}</h2>
                    <p class="card-text">Products</p>
                </div>
                <div id="product-chart"></div>
            </div>
        </div>

        <!-- Orders Chart Card starts -->
        <div class="col-lg-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-header flex-column align-items-start pb-0">
                    <div class="avatar bg-light-warning p-50 m-0">
                        <div class="avatar-content">
                            <i data-feather="package" class="font-medium-5"></i>
                        </div>
                    </div>
                    <h2 class="font-weight-bolder mt-1">{{ $supplies }}</h2>
                    <p class="card-text">Supplies</p>
                </div>
                <div id="supply-chart"></div>
            </div>
        </div>
  	</div>
  	<!-- User Timeline & Permissions Ends -->
</section>