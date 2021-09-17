<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __('Sales Order') }}</h4>
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
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="reference">
                                    {{ __('Sales Order No.') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" class="form-control @error('reference') is-invalid @enderror" wire:model="inputs.reference"/>

                                @error('reference')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="customer">
                                    {{ __('Customer') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('customer') is-invalid @enderror" id="customer" wire:model="inputs.customer">
                                    <option value="0"> {{ __('Guest Customer') }}</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}"> {{ ucwords($customer->user->profile->name) }}</option>
                                    @endforeach
                                </select>

                                @error('customer')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('status') is-invalid @enderror" id="status" wire:model="inputs.status">
                                    <option value="paid"> {{ __('Paid') }}</option>
                                    <option value="cancelled"> {{ __('Cancelled') }}</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">
                                    {{ __('Notes') }}
                                </label>

                                <textarea class="form-control @error('notes') is-invalid @enderror" wire:model="inputs.notes"/></textarea>

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

                                                        <div class="col-lg-2 col-12 mb-lg-0 mb-2 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">SRP</p>
                                                            <input type="text" class="form-control" wire:model="inputs.items.{{ $key }}.srp" readonly />
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
                                    <td>Discount:</td>
                                    <td>
                                        <input type="number" wire:model="inputs.discount" name="discount" class="form-control @error('discount') is-invalid @enderror">
                                    </td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td>{{ $inputs['total'] }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-12 mb-2" style="border-top: 1px solid;"></div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="payment">
                                    {{ __('Payment Type') }}
                                </label>

                                <select class="form-control @error('payment') is-invalid @enderror" id="payment" wire:model="inputs.payment">
                                    <option> Select a payment method</option>

                                    @foreach($payments as $payment)
                                        <option value="{{ $payment->id }}"> {{ ucwords($payment->name) }}</option>
                                    @endforeach
                                </select>

                                @error('payment')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="transaction">
                                    {{ __('Transaction #') }}
                                </label>

                                <input type="text" class="form-control @error('transaction') is-invalid @enderror" wire:model="inputs.transaction"/>

                                @error('transaction')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="amount">
                                    {{ __('Amount') }}
                                </label>

                                <input type="number" class="form-control @error('amount') is-invalid @enderror" wire:model="inputs.amount"/>

                                @error('amount')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-3 col-12">
                            <div class="form-group">
                                <label class="form-label" for="change">
                                    {{ __('Change') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.change" readonly/>
                            </div>
                        </div>

                        <div class="col-12 mt-2">
                            <button wire:click.prevent="save" class="btn btn-primary mr-1">{{ __('Create') }}</button>
                            <button wire:click.prevent="resetBtn" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
