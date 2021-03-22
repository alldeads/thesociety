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

										<div class="d-flex flex-wrap">
					  						<a href="{{ route('company-edit') }}" class="btn btn-primary">Edit</a>
										</div>
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
	  				<span class="badge badge-light-secondary" data-toggle="tooltip" data-placement="top" title="Expiry Date">July 22, <span class="nextYear"></span>
	  				</span>
				</div>
				<div class="card-body">
		  			<div class="badge badge-light-primary">Basic</div>
	  				<ul class="list-unstyled my-1">
						<li>
		  					<span class="align-middle">5 Users</span>
						</li>
						<li class="my-25">
		  					<span class="align-middle">10 GB storage</span>
						</li>
						<li>
		  					<span class="align-middle">Basic Support</span>
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
		<!-- information starts -->
		<div class="col-md-6">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title mb-2">User Timeline</h4>
				</div>
				<div class="card-body">
		  			<ul class="timeline">
						<li class="timeline-item">
			  				<span class="timeline-point timeline-point-indicator"></span>
			  				<div class="timeline-event">
								<div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
				  					<h6>12 Invoices have been paid</h6>
				  					<span class="timeline-event-time">12 min ago</span>
								</div>
								<p>Invoices have been paid to the company.</p>
								<div class="media align-items-center">
									<img
									class="mr-1"
									src="{{asset('images/icons/file-icons/pdf.png')}}"
									alt="invoice"
									height="23"
									/>
				  					<div class="media-body">invoice.pdf</div>
								</div>
			  				</div>
						</li>
						<li class="timeline-item">
			  				<span class="timeline-point timeline-point-warning timeline-point-indicator"></span>
		  					<div class="timeline-event">
								<div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
				  					<h6>Client Meeting</h6>
				  					<span class="timeline-event-time">45 min ago</span>
								</div>
								<p>Project meeting with john @10:15am.</p>
								<div class="media align-items-center">
				  					<div class="avatar">
										<img src="{{asset('images/avatars/12-small.png')}}" alt="avatar" height="38" width="38" />
				  					</div>
				  					<div class="media-body ml-50">
										<h6 class="mb-0">John Doe (Client)</h6>
										<span>CEO of Infibeam</span>
				  					</div>
								</div>
			  				</div>
						</li>
						<li class="timeline-item">
			  				<span class="timeline-point timeline-point-info timeline-point-indicator"></span>
			  				<div class="timeline-event">
								<div class="d-flex justify-content-between flex-sm-row flex-column mb-sm-0 mb-1">
				  					<h6>Create a new project for client</h6>
				  					<span class="timeline-event-time">2 days ago</span>
								</div>
								<p class="mb-0">Add files to new design folder</p>
			  				</div>
						</li>
		  			</ul>
				</div>
	  		</div>
		</div>
		<!-- information Ends -->
  	</div>
  	<!-- User Timeline & Permissions Ends -->
</section>