<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Edit Purchase Order') }}</h4>
                </div>

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

                    <div class="row">
                    	<div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="reference">
                                    {{ __('Purchase Order No.') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" class="form-control @error('reference') is-invalid @enderror" wire:model="inputs.reference"/>

                                @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="posting-date">
                                    {{ __('Supplier') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('supplier') is-invalid @enderror" id="supplier" wire:model="inputs.supplier">
                                    <option> {{ __('Select supplier') }}</option>
                                    @foreach($suppliers as $supplier)
                                        <option value="{{ $supplier->id }}"> {{ ucwords($supplier->user->profile->company) }}</option>
                                    @endforeach
                                </select>

                                @error('supplier')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="purchase_date">
                                    {{ __('Purchase Order Date') }} <span class="asterisk">*</span>
                                </label>

                                <input type="date" class="form-control @error('purchase_date') is-invalid @enderror" wire:model="inputs.purchase_date"/>

                                @error('purchase_date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="expected_on">
                                    {{ __('Expected On') }} <span class="asterisk">*</span>
                                </label>

                                <input type="date" class="form-control @error('expected_on') is-invalid @enderror" wire:model="inputs.expected_on"/>

                                @error('expected_on')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">
                                    {{ __('Notes') }} <span class="asterisk">*</span>
                                </label>

                                <textarea class="form-control @error('notes') is-invalid @enderror" rows="4" id="note" wire:model="inputs.notes"></textarea>

                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="card-body invoice-product-details">
								@foreach($inputs['items'] as $key => $item)
									<div data-repeater-list="group-g">
						  				<div class="repeater-wrapper">
											<div class="row">
							  					<div class="col-12 d-flex product-details-border position-relative pr-0">
													<div class="row w-100 pr-lg-0 pr-1 ">
								  						<div class="col-lg-5 col-12 mb-lg-0 mb-2 mt-2">
															<p class="card-text col-title mb-md-50 mb-0">Item</p>

															<select class="form-control" wire:model="inputs.items.{{ $key }}.product">
																<option>Select product or supply</option>
																
																@foreach($products as $product)
																	<option value="{{ $product->id }}">{{ $product->name }}</option>
																@endforeach
															</select>
								  						</div>

								  						<div class="col-lg-3 col-12 mb-lg-0 mb-2 mt-2">
															<p class="card-text col-title mb-md-50 mb-0">Cost</p>
															<input type="number" class="form-control" wire:model="inputs.items.{{ $key }}.cost"/>
								  						</div>

								  						<div class="col-lg-2 col-12 mb-lg-0 mb-2 mt-2">
															<p class="card-text col-title mb-md-50 mb-0">Qty</p>
															<input type="number" class="form-control" wire:model="inputs.items.{{ $key }}.qty"/>
								  						</div>

								  						<div class="col-lg-2 col-12 mb-lg-0 mb-2 mt-2">
															<p class="card-text col-title mb-md-50 mb-0">Price</p>
															<input type="text" class="form-control" wire:model="inputs.items.{{ $key }}.price" readonly />
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

								<div class="row mt-1 text-right">
					  				<div class="col-12 px-0">
										<button class="btn btn-primary btn-sm" wire:click="createItem">
						  					<i class="fa fa-plus mr-25"></i>
						  					<span class="align-middle">Add Item</span>
										</button>
					  				</div>
								</div>
							</div>
                        </div>

                        <div class="col-12" style="border-top: 1px solid;"></div>

                        <div class="col-md-5 col-12 m-auto">
                        	<table class="table">
                        		<tr>
									<td>Subtotal:</td>
									<td>{{ $inputs['subtotal'] }}</td>
								</tr>
								<tr>
									<td>Total:</td>
									<td>{{ $inputs['total'] }}</td>
								</tr>
                        	</table>
                        </div>

                        <div class="col-12 mt-2">
                            <button wire:click.prevent="save" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                            <button wire:click.prevent="resetBtn" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
