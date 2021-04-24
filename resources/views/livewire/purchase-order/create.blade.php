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
				<div class="card-body invoice-padding invoice-product-details" wire:ignore>
		  			<form class="source-item">
						<div data-repeater-list="group-g">
			  				<div class="repeater-wrapper" data-repeater-item>
								<div class="row">
				  					<div class="col-12 d-flex product-details-border position-relative pr-0">
										<div class="row w-100 pr-lg-0 pr-1 py-2">
					  						<div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-lg-0 mt-2">
												<p class="card-text col-title mb-md-50 mb-0">Item</p>

												<select class="form-control" wire:model="inputs.product">
													<option>Select product or supply</option>
													
													@foreach($products as $product)
														<option value="{{ $product->id }}">{{ $product->name }}</option>
													@endforeach
												</select>
					  						</div>

					  						<div class="col-lg-3 col-12 my-lg-0 my-2">
												<p class="card-text col-title mb-md-2 mb-0">Cost</p>
												<input type="number" class="form-control" wire:model="inputs.cost"/>
					  						</div>

					  						<div class="col-lg-2 col-12 my-lg-0 my-2">
												<p class="card-text col-title mb-md-2 mb-0">Qty</p>
												<input type="number" class="form-control" wire:model="inputs.quantity"/>
					  						</div>

					  						<div class="col-lg-2 col-12 mt-lg-0 mt-2">
												<p class="card-text col-title mb-md-50 mb-0">Price</p>
												<p class="card-text mb-0">$24.00</p>
					  						</div>
										</div>
					<div
					  class="d-flex flex-column align-items-center justify-content-between border-left invoice-product-actions py-50 px-25"
					>
					  <i data-feather="x" class="cursor-pointer font-medium-3" data-repeater-delete></i>
					  <div class="dropdown">
						<i
						  class="cursor-pointer more-options-dropdown mr-0"
						  data-feather="settings"
						  role="button"
						  id="dropdownMenuButton"
						  data-toggle="dropdown"
						  aria-haspopup="true"
						  aria-expanded="false"
						>
						</i>
						<div
						  class="dropdown-menu dropdown-menu-right item-options-menu p-1"
						  aria-labelledby="dropdownMenuButton"
						>
						  <div class="form-group">
							<label for="discount-input" class="form-label">Discount(%)</label>
							<input type="number" class="form-control" id="discount-input" />
						  </div>
						  <div class="form-row mt-50">
							<div class="form-group col-md-6">
							  <label for="tax-1-input" class="form-label">Tax 1</label>
							  <select name="tax-1-input" id="tax-1-input" class="form-control tax-select">
								<option value="0%" selected>0%</option>
								<option value="1%">1%</option>
								<option value="10%">10%</option>
								<option value="18%">18%</option>
								<option value="40%">40%</option>
							  </select>
							</div>
							<div class="form-group col-md-6">
							  <label for="tax-2-input" class="form-label">Tax 2</label>
							  <select name="tax-2-input" id="tax-2-input" class="form-control tax-select">
								<option value="0%" selected>0%</option>
								<option value="1%">1%</option>
								<option value="10%">10%</option>
								<option value="18%">18%</option>
								<option value="40%">40%</option>
							  </select>
							</div>
						  </div>
						  <div class="dropdown-divider my-1"></div>
						  <div class="d-flex justify-content-between">
							<button type="button" class="btn btn-outline-primary btn-apply-changes">Apply</button>
							<button type="button" class="btn btn-outline-secondary">Cancel</button>
						  </div>
						</div>
					  </div>
					</div>
				  </div>
				</div>
			  </div>
			</div>
			<div class="row mt-1">
			  <div class="col-12 px-0">
				<button type="button" class="btn btn-primary btn-sm btn-add-new" data-repeater-create>
				  <i data-feather="plus" class="mr-25"></i>
				  <span class="align-middle">Add Item</span>
				</button>
			  </div>
			</div>
		  </form>
		</div>
		<!-- Product Details ends -->

		<!-- Invoice Total starts -->
		<div class="card-body invoice-padding">
		  <div class="row invoice-sales-total-wrapper">
			<div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
			  <div class="d-flex align-items-center mb-1">
				<label for="salesperson" class="form-label">Salesperson:</label>
				<input type="text" class="form-control ml-50" id="salesperson" placeholder="Edward Crowley" />
			  </div>
			</div>
			<div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
			  <div class="invoice-total-wrapper">
				<div class="invoice-total-item">
				  <p class="invoice-total-title">Subtotal:</p>
				  <p class="invoice-total-amount">$1800</p>
				</div>
				<div class="invoice-total-item">
				  <p class="invoice-total-title">Discount:</p>
				  <p class="invoice-total-amount">$28</p>
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

		<div class="card-body invoice-padding py-0">
		  <!-- Invoice Note starts -->
		  <div class="row">
			<div class="col-12">
			  <div class="form-group mb-2">
				<label for="note" class="form-label font-weight-bold">Note:</label>
				<textarea class="form-control" rows="2" id="note">
It was a pleasure working with you and your team. We hope you will keep us in mind for future freelance projects. Thank You!</textarea
				>
			  </div>
			</div>
		  </div>
		  <!-- Invoice Note ends -->
		</div>
	  </div>
	</div>
	<!-- Invoice Edit Left ends -->

	<!-- Invoice Edit Right starts -->
	<div class="col-xl-3 col-md-4 col-12">
	  <div class="card">
		<div class="card-body">
		  <button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
			Send Invoice
		  </button>
		  <a href="{{url('app/invoice/preview')}}" class="btn btn-outline-primary btn-block mb-75">Preview</a>
		  <button type="button" class="btn btn-outline-primary btn-block mb-75">Save</button>
		  <button class="btn btn-success btn-block mb-75" data-toggle="modal" data-target="#add-payment-sidebar">
			Add Payment
		  </button>
		</div>
	  </div>
	  <div class="mt-2">
		<p class="mb-50">Accept payments via</p>
		<select class="form-control">
		  <option value="Bank Account">Bank Account</option>
		  <option value="Paypal">Paypal</option>
		  <option value="UPI Transfer">UPI Transfer</option>
		</select>
		<div class="invoice-terms mt-1">
		  <div class="d-flex justify-content-between">
			<label class="invoice-terms-title mb-0" for="paymentTerms">Payment Terms</label>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" checked id="paymentTerms" />
			  <label class="custom-control-label" for="paymentTerms"></label>
			</div>
		  </div>
		  <div class="d-flex justify-content-between py-1">
			<label class="invoice-terms-title mb-0" for="clientNotes">Client Notes</label>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" checked id="clientNotes" />
			  <label class="custom-control-label" for="clientNotes"></label>
			</div>
		  </div>
		  <div class="d-flex justify-content-between">
			<label class="invoice-terms-title mb-0" for="paymentStub">Payment Stub</label>
			<div class="custom-control custom-switch">
			  <input type="checkbox" class="custom-control-input" id="paymentStub" />
			  <label class="custom-control-label" for="paymentStub"></label>
			</div>
		  </div>
		</div>
	  </div>
	</div>
	<!-- Invoice Edit Right ends -->
  </div>

  <!-- Send Invoice Sidebar -->
  <div class="modal modal-slide-in fade" id="send-invoice-sidebar" aria-hidden="true">
	<div class="modal-dialog sidebar-lg">
	  <div class="modal-content p-0">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
		<div class="modal-header mb-1">
		  <h5 class="modal-title">
			<span class="align-middle">Send Invoice</span>
		  </h5>
		</div>
		<div class="modal-body flex-grow-1">
		  <form>
			<div class="form-group">
			  <label for="invoice-from" class="form-label">From</label>
			  <input
				type="text"
				class="form-control"
				id="invoice-from"
				value="shelbyComapny@email.com"
				placeholder="company@email.com"
			  />
			</div>
			<div class="form-group">
			  <label for="invoice-to" class="form-label">To</label>
			  <input
				type="text"
				class="form-control"
				id="invoice-to"
				value="qConsolidated@email.com"
				placeholder="company@email.com"
			  />
			</div>
			<div class="form-group">
			  <label for="invoice-subject" class="form-label">Subject</label>
			  <input
				type="text"
				class="form-control"
				id="invoice-subject"
				value="Invoice of purchased Admin Templates"
				placeholder="Invoice regarding goods"
			  />
			</div>
			<div class="form-group">
			  <label for="invoice-message" class="form-label">Message</label>
			  <textarea class="form-control" name="invoice-message" id="invoice-message" cols="3" rows="11">
Dear Queen Consolidated,

Thank you for your business, always a pleasure to work with you!

We have generated a new invoice in the amount of $95.59

We would appreciate payment of this invoice by 05/11/2019</textarea
			  >
			</div>
			<div class="form-group">
			  <span class="badge badge-light-primary">
				<i data-feather="link" class="mr-25"></i>
				<span class="align-middle">Invoice Attached</span>
			  </span>
			</div>
			<div class="form-group d-flex flex-wrap mt-2">
			  <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
			  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>
  <!-- /Send Invoice Sidebar -->

  <!-- Add Payment Sidebar -->
  <div class="modal modal-slide-in fade" id="add-payment-sidebar" aria-hidden="true">
	<div class="modal-dialog sidebar-lg">
	  <div class="modal-content p-0">
		<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>
		<div class="modal-header mb-1">
		  <h5 class="modal-title">
			<span class="align-middle">Add Payment</span>
		  </h5>
		</div>
		<div class="modal-body flex-grow-1">
		  <form>
			<div class="form-group">
			  <input id="balance" class="form-control" type="text" value="Invoice Balance: 5000.00" disabled />
			</div>
			<div class="form-group">
			  <label class="form-label" for="amount">Payment Amount</label>
			  <input id="amount" class="form-control" type="number" placeholder="$1000" />
			</div>
			<div class="form-group">
			  <label class="form-label" for="payment-date">Payment Date</label>
			  <input id="payment-date" class="form-control date-picker" type="text" />
			</div>
			<div class="form-group">
			  <label class="form-label" for="payment-method">Payment Method</label>
			  <select class="form-control" id="payment-method">
				<option value="" selected disabled>Select payment method</option>
				<option value="Cash">Cash</option>
				<option value="Bank Transfer">Bank Transfer</option>
				<option value="Debit">Debit</option>
				<option value="Credit">Credit</option>
				<option value="Paypal">Paypal</option>
			  </select>
			</div>
			<div class="form-group">
			  <label class="form-label" for="payment-note">Internal Payment Note</label>
			  <textarea class="form-control" id="payment-note" rows="5" placeholder="Internal Payment Note"></textarea>
			</div>
			<div class="form-group d-flex flex-wrap mb-0">
			  <button type="button" class="btn btn-primary mr-1" data-dismiss="modal">Send</button>
			  <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
			</div>
		  </form>
		</div>
	  </div>
	</div>
  </div>
  <!-- /Add Payment Sidebar -->
</section>
