@extends('pos.layouts.master')

@section('content')
	<div class="row">
		<div class="col-md-4 col-lg-4 col-xl-3 col-12">
			<div class="checkout-options">
				<div class="sidebar-shop" style="width: 100%;">
					<div class="card">
			            <div class="card-body">

			            	<select class="form-control">
			            		<option value="0"> Guest Customer</option>
			            	</select>

			            	<table class="table mt-2" style="width: 100%;">
			            		<tr>
			            			<td>
			            				<div class="item-name">
											<h6 class="mb-0">
												<a href="{{url('app/ecommerce/details')}}" class="text-body">Apple iPhone 11 (64GB, Black)</a>
											</h6>

											<small>x 1</small>
          								</div>
			            			</td>

			            			<td>
			            				<h4 class="item-price">4999.99</h4>
			            			</td>
			            		</tr>
			            		<tr>
			            			<td>
			            				<div class="item-name">
											<h6 class="mb-0">
												<a href="{{url('app/ecommerce/details')}}" class="text-body">Apple iPhone 11 (64GB, Black)</a>
											</h6>

											<small>x 1</small>
          								</div>
			            			</td>

			            			<td>
			            				<h4 class="item-price">4999.99</h4>
			            			</td>
			            		</tr>
			            		<tr>
			            			<td>
			            				<div class="item-name">
											<h6 class="mb-0">
												<a href="{{url('app/ecommerce/details')}}" class="text-body">Apple iPhone 11 (64GB, Black)</a>
											</h6>

											<small>x 1</small>
          								</div>
			            			</td>

			            			<td>
			            				<h4 class="item-price">4999.99</h4>
			            			</td>
			            		</tr>
			            	</table>

			              	<hr />

			              	<input type="number" name="discount" class="form-control" placeholder="Discount">

			              	<hr />

			              	<div class="price-details">
			                	<ul class="list-unstyled">
			                  		<li class="price-detail">
					                    <div class="detail-title">Sub Total</div>
					                    <div class="detail-amt">$598</div>
			                  		</li>
			                  		<li class="price-detail">
					                    <div class="detail-title">Discount</div>
					                    <div class="detail-amt discount-amt text-success">-25$</div>
			                  		</li>
			                	</ul>

			                	<hr />
			                	<ul class="list-unstyled">
			                  		<li class="price-detail">
					                    <div class="detail-title detail-total">Total</div>
					                    <div class="detail-amt font-weight-bolder">$574</div>
			                  		</li>
			                	</ul>
			                	<button type="button" class="btn btn-primary btn-block btn-next place-order">Place Order</button>
			              	</div>
			            </div>
  					</div>
				</div>
			</div>
		</div>

		@livewire('pos.product', ['company_id' => $company->id])
	</div>
@endsection