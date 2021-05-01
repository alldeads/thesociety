<section class="invoice-preview-wrapper">
  	<div class="row invoice-preview">
    	<div class="col-xl-9 col-md-8 col-12">
      		<div class="card invoice-preview-card">
        		<div class="card-body invoice-padding pb-0">
          			<div class="d-flex justify-content-between flex-md-row flex-column invoice-spacing mt-0">
            			<div>
              				<div class="logo-wrapper">
                				<img class="img-fluid rounded"
									src="{{ $company->avatar ?? '' }}"
									width="150"
									alt="Company logo"/>
              				</div>

              				<p class="card-text mb-25">{{ $company->name }}</p>
              				<p class="card-text mb-25">{{ $company->address[0] ?? "N/A" }}</p>
			  				<p class="card-text mb-25">{{ $company->address[1] ?? "N/A" }}</p>
			  				<p class="card-text mb-25">{{ $company->address[2] ?? "N/A" }}</p>
			  				<p class="card-text mb-0">{{ $company->phone ?? "N/A" }}</p>
			  				<p class="card-text mb-0">{{ $company->email ?? "N/A" }}</p>
            			</div>

            			<div class="mt-md-0 mt-2">
              				<h4 class="invoice-title">
                				P.O
                				<span class="invoice-number">#{{ $inputs['reference'] }}</span>
              				</h4>
              				<div class="invoice-date-wrapper">
				                <p class="invoice-date-title">Date Issued:</p>
				                <p class="invoice-date">{{ $inputs['purchase_date'] }}</p>
              				</div>
            			</div>
          			</div>
        		</div>

        		<hr class="invoice-spacing" />

        		<div class="card-body invoice-padding pt-0">
          			<div class="row invoice-spacing">
            			<div class="col-xl-8 p-0">
							<h6 class="mb-2">Supplier:</h6>
							<h6 class="mb-25">{{ $inputs['supplier_name'] }}</h6>
							<p class="card-text mb-25">{{ $inputs['supplier_address'][0] ?? "N/A" }}</p>
							<p class="card-text mb-25">{{ $inputs['supplier_address'][1] ?? "N/A" }}</p>
							<p class="card-text mb-25">{{ $inputs['supplier_address'][2] ?? "N/A" }}</p>

							@if ($inputs['supplier_phone'] != null)
								<p class="card-text mb-0">{{ $inputs['supplier_phone'] }}</p>
							@endif

							<p class="card-text mb-0">{{ $inputs['supplier_email'] }}</p>
            			</div>

            			<div class="col-xl-4 p-0 mt-xl-0 mt-2">
              				<h6 class="mb-2">Ship To:</h6>
              				<h6 class="mb-25">{{ $inputs['ship_to_name'] }}</h6>
              				<p class="card-text mb-25">{{ $company->address[0] ?? "N/A" }}</p>
			  				<p class="card-text mb-25">{{ $company->address[1] ?? "N/A" }}</p>
			  				<p class="card-text mb-25">{{ $company->address[2] ?? "N/A" }}</p>
			  				<p class="card-text mb-0">{{ $company->phone ?? "N/A" }}</p>
			  				<p class="card-text mb-0">{{ $company->email ?? "N/A" }}</p>
            			</div>
          			</div>
        		</div>

        		<div class="table-responsive">
          			<table class="table">
            			<thead>
              				<tr>
								<th class="py-1">Item / Description</th>
								<th class="py-1">Cost</th>
								<th class="py-1">Qty</th>
								<th class="py-1">Total</th>
              				</tr>
        				</thead>
            			
            			<tbody>
            				@foreach($inputs['items'] as $item)
	              				<tr>
	                				<td class="py-1">
					                  	<p class="card-text font-weight-bold mb-25">{{ $item->name }}</p>
	               	 				</td>
	               	 				<td class="py-1">
					                  	<p class="card-text font-weight-bold mb-25">
					                  		{{ number_format($item->cost, 2, '.', ',') }} 
					                  	</p>
	               	 				</td>
	               	 				<td class="py-1">
					                  	<p class="card-text font-weight-bold mb-25">
					                  		{{ number_format($item->quantity, 2, '.', ',') }} 
					                  	</p>
	               	 				</td>
	               	 				<td class="py-1">
					                  	<p class="card-text font-weight-bold mb-25">
					                  		{{ number_format($item->cost * $item->quantity, 2, '.', ',') }} 
					                  	</p>
	               	 				</td>
	              				</tr>
              				@endforeach
            			</tbody>
          			</table>
       			</div>

        		<div class="card-body invoice-padding pb-0">
          			<div class="row invoice-sales-total-wrapper">
            			<div class="col-md-6 order-md-1 order-2 mt-md-0 mt-3">
              				<p class="card-text mb-1">
                				<span class="font-weight-bold">Ship Via:</span> 
                				<span class="ml-75">{{ $inputs['ship_via'] }}</span>
             	 			</p>

             	 			<p class="card-text mb-1">
                				<span class="font-weight-bold">Shipping Method:</span> 
                				<span class="ml-75">{{ $inputs['shipping_method'] }}</span>
             	 			</p>

             	 			<p class="card-text mb-1">
                				<span class="font-weight-bold">Shipping Terms:</span> 
                				<span class="ml-75">{{ $inputs['shipping_terms'] }}</span>
             	 			</p>

             	 			<p class="card-text mb-1">
                				<span class="font-weight-bold">Approved By:</span> 
                				<span class="ml-75">{{ $inputs['approved_by'] }}</span>
             	 			</p>

             	 			<p class="card-text mb-1">
                				<span class="font-weight-bold">Created By:</span> 
                				<span class="ml-75">{{ $inputs['created_by'] }}</span>
             	 			</p>
           			 	</div>

            			<div class="col-md-6 d-flex justify-content-end order-md-2 order-1">
              				<div class="invoice-total-wrapper">
                				<div class="invoice-total-item">
                  					<p class="invoice-total-title">Subtotal:</p>
                  					<p class="invoice-total-amount">
                  						{{ number_format($inputs['sub_total'], 2, '.', ',') }}
                  					</p>
                				</div>

                				<div class="invoice-total-item">
									<p class="invoice-total-title">Discount(%):</p>
									<p class="invoice-total-amount">{{ number_format($inputs['discount'], 0) }}%</p>
                				</div>

                				<div class="invoice-total-item">
									<p class="invoice-total-title">Discount(fixed):</p>
									<p class="invoice-total-amount">
										{{ number_format($inputs['fixed'], 2, '.', ',') }}
									</p>
                				</div>

                				<div class="invoice-total-item">
                  					<p class="invoice-total-title">Tax:</p>
                  					<p class="invoice-total-amount">
                  						{{ number_format($inputs['tax'], 0) }}%
                  					</p>
                				</div>

                				<div class="invoice-total-item">
                  					<p class="invoice-total-title">Shipping Fee:</p>
                  					<p class="invoice-total-amount">
                  						{{ number_format($inputs['shipping'], 2, '.', ',') }}
                  					</p>
                				</div>

                				<hr class="my-50" />

                				<div class="invoice-total-item">
									<p class="invoice-total-title">Total:</p>
									<p class="invoice-total-amount">{{ number_format($inputs['total'], 2, '.', ',') }}</p>
                				</div>
              				</div>
            			</div>
          			</div>
        		</div>

        		<hr class="invoice-spacing" />

        		<div class="card-body invoice-padding pt-0">
          			<div class="row">
            			<div class="col-12">
              				<span class="font-weight-bold">Notes:</span>
              				<span>{{ $inputs['notes'] }}</span>
            			</div>
          			</div>
        		</div>
      		</div>
		</div>

    	<div class="col-xl-3 col-md-4 col-12 invoice-actions mt-md-0 mt-2">
      		<div class="card">
        		<div class="card-body">
          			<button class="btn btn-primary btn-block mb-75" data-toggle="modal" data-target="#send-invoice-sidebar">
            			Send Invoice
          			</button>
          			<button class="btn btn-outline-secondary btn-block btn-download-invoice mb-75">Download</button>
      				<a class="btn btn-outline-secondary btn-block mb-75" href="{{url('app/invoice/print')}}" target="_blank">
        				Print
      				</a>
      				<a class="btn btn-outline-secondary btn-block mb-75" href="{{ route('purchase-orders-edit', [
      					'purchase' => $purchase
      				]) }}"> Edit </a>
          			<button class="btn btn-success btn-block" data-toggle="modal" data-target="#add-payment-sidebar">
            			Add Payment
          			</button>
        		</div>
      		</div>
    	</div>
  </div>
</section>