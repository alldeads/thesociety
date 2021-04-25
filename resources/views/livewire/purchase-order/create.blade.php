<section class="invoice-edit-wrapper">
  	<div class="row invoice-edit">
		<div class="col-xl-9 col-md-8 col-12">
	  		<div class="card invoice-preview-card">
				<!-- Header starts -->
				<div class="card-body invoice-padding pb-0">
		  			<div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
						<div>
			  				<div class="logo-wrapper">
								<img class="img-fluid rounded"
									src="{{ $company->avatar ?? '' }}"
									width="150"
									alt="Company logo"/>
			  				</div>

			  				<p class="card-text mb-25">{{ $company->address[0] }}</p>
			  				<p class="card-text mb-25">{{ $company->address[1] }}</p>
			  				<p class="card-text mb-25">{{ $company->address[2] }}</p>
			  				<p class="card-text mb-0">{{ $company->phone }}</p>
			  				<p class="card-text mb-0">{{ $company->email }}</p>
						</div>

						<div class="invoice-number-date mt-md-0 mt-2" wire:ignore>
			  				<div class="d-flex align-items-center justify-content-md-end mb-1">
								<h4 class="invoice-title">P.O.</h4>
								<div class="input-group input-group-merge invoice-edit-input-group">
				  					<div class="input-group-prepend">
										<div class="input-group-text">
					  						<i data-feather="hash"></i>
										</div>
				  					</div>
				  					<input type="text" class="form-control invoice-edit-input" placeholder="53634" />
								</div>
			  				</div>

			  				<div class="d-flex align-items-center mb-1">
								<span class="title">Date:</span>
								<input type="text" class="form-control date-picker" />
			  				</div>
						</div>
		  			</div>
				</div>
				<!-- Header ends -->

				<hr class="invoice-spacing" />

				<!-- Address and Contact starts -->
				<div class="card-body invoice-padding pt-0">
		  			<div class="d-flex justify-content-between">
						<div>
			  				<h6 class="mb-2">Supplier: </h6>

			  				<select class="form-control" wire:model="inputs.supplier">
			  					<option>Select a supplier</option>

			  					@foreach($suppliers as $supplier)
			  						<option value="{{ $supplier->id }}"> {{ $supplier->user->profile->company }}</option>
			  					@endforeach
			  				</select>
						</div>

						<div>
			  				<h6 class="mb-2">Ship To:</h6>
			  				<select class="form-control" wire:model="inputs.employee">
			  					<option>Select an employee</option>

			  					@foreach($employees as $employee)
			  						<option value="{{ $employee->id }}"> {{ $employee->user->profile->name }}</option>
			  					@endforeach
			  				</select>
						</div>
		  			</div>
				</div>
				<!-- Address and Contact ends -->

				<!-- Product Details starts -->
				<div class="card-body invoice-padding invoice-product-details">
					@foreach($inputs['items'] as $key => $item)
						<div data-repeater-list="group-g" class="mt-3">
			  				<div class="repeater-wrapper">
								<div class="row">
				  					<div class="col-12 d-flex product-details-border position-relative pr-0">
										<div class="row w-100 pr-lg-0 pr-1 py-2">
					  						<div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
												<p class="card-text col-title mb-md-50 mb-0">Item</p>

												<select class="form-control" wire:model="inputs.items.{{ $key }}.product">
													<option>Select product or supply</option>
													
													@foreach($products as $product)
														<option value="{{ $product->id }}">{{ $product->name }}</option>
													@endforeach
												</select>
					  						</div>

					  						<div class="col-lg-3 col-12 my-lg-0 my-2">
												<p class="card-text col-title mb-md-2 mb-0">Cost</p>
												<input type="number" class="form-control" wire:model="inputs.items.{{ $key }}.cost"/>
					  						</div>

					  						<div class="col-lg-2 col-12 my-lg-0 my-2">
												<p class="card-text col-title mb-md-2 mb-0">Qty</p>
												<input type="number" class="form-control" wire:model="inputs.items.{{ $key }}.qty"/>
					  						</div>

					  						<div class="col-lg-2 col-12 mt-lg-0 mt-2">
												<p class="card-text col-title mb-md-50 mb-0">Price</p>
												<input type="number" class="form-control" wire:model="inputs.items.{{ $key }}.price"/>
					  						</div>
										</div>

										<div  class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25" wire:ignore>
					  						<i class="cursor-pointer font-medium-3" wire:click="deleteItem({{$key}})">
					  							<span class="fa fa-times"></span>
					  						</i>
										</div>
				  					</div>
								</div>
			  				</div>
						</div>
					@endforeach

					<div class="row mt-1">
		  				<div class="col-12 px-0">
							<button class="btn btn-primary btn-sm" wire:click="createItem">
			  					<i class="fa fa-plus mr-25"></i>
			  					<span class="align-middle">Add Item</span>
							</button>
		  				</div>
					</div>
				</div>
				<!-- Product Details ends -->

				<!-- Invoice Total starts -->
				<div class="card-body invoice-padding">
		  			<div class="row invoice-sales-total-wrapper">
						<div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
			  				<div class="d-flex align-items-center mb-1">
								<label for="note" class="form-label font-weight-bold">Note:</label>
								<textarea class="form-control" rows="4" id="note" wire:model="inputs.notes"></textarea>
			  				</div>
						</div>

						<div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
			  				<div class="invoice-total-wrapper">
								<div class="invoice-total-item">
									<p class="invoice-total-title">Subtotal:</p>
									<p class="invoice-total-amount">{{ $inputs['subtotal'] }}</p>
								</div>
								<div class="invoice-total-item">
									<p class="invoice-total-title">Discount:</p>
									<p class="invoice-total-amount">{{ $inputs['subtotal'] }}</p>
								</div>
								<div class="invoice-total-item">
									<p class="invoice-total-title">Tax:</p>
									<p class="invoice-total-amount">21%</p>
								</div>
								<hr class="my-50" />
								<div class="invoice-total-item">
									<p class="invoice-total-title">Total:</p>
									<p class="invoice-total-amount">$1690</p>
								</div>
			  				</div>
						</div>
		  			</div>
				</div>
				<!-- Invoice Total ends -->

				<hr class="invoice-spacing mt-0" />
	  		</div>
		</div>
		<!-- Invoice Edit Left ends -->

		<!-- Invoice Edit Right starts -->
		<div class="col-xl-3 col-md-4 col-12">
	  		<div class="card">
				<div class="card-body">
		  			<button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
						Send Purchase Order
		  			</button>
					<button type="button" class="btn btn-outline-primary btn-block mb-75">Save</button>
					<button class="btn btn-success btn-block mb-75" data-toggle="modal" data-target="#add-payment-sidebar">
						Add Payment
		  			</button>
				</div>
	 		</div>

	  		<div class="mt-2">
				<div class="invoice-terms mt-1">
		  			<div class="d-flex justify-content-between">
						<label class="invoice-terms-title mb-0" for="paymentTerms">Publish</label>
						<div class="custom-control custom-switch">
							<input type="checkbox" class="custom-control-input" checked id="paymentTerms" />
							<label class="custom-control-label" for="paymentTerms"></label>
						</div>
		  			</div>
		  			<div class="d-flex justify-content-between py-1">
						<label class="invoice-terms-title mb-0" for="clientNotes">Draft</label>
						<div class="custom-control custom-switch">
			  				<input type="checkbox" class="custom-control-input" checked id="clientNotes" />
			  				<label class="custom-control-label" for="clientNotes"></label>
						</div>
		  			</div>
				</div>
	  		</div>
		</div>
		<!-- Invoice Edit Right ends -->
  	</div>
</section>
