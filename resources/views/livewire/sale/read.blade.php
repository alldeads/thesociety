<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ __($inputs['reference']) }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="reference">
                                    {{ __('Sales Order No.') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.reference" readonly/>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="customer">
                                    {{ __('Customer') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.customer" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.status" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">
                                    {{ __('Notes') }}
                                </label>

                                <textarea class="form-control" rows="4" id="note" wire:model="inputs.notes" disabled></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_at">
                                    {{ __('Created At') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.created_at" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_by">
                                    {{ __('Created By') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.created_by" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_at">
                                    {{ __('Updated At') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.created_at" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_by">
                                    {{ __('Updated By') }}
                                </label>

                                <input type="text" class="form-control" wire:model="inputs.updated_by" readonly/>
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
                                                            <input type="text" class="form-control" value="{{ $item->product->name ?? '' }}" readonly />
                                                        </div>

                                                        <div class="col-lg-3 col-12 mb-lg-0 mb-2 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">SRP</p>
                                                            <input type="text" class="form-control" value="{{ number_format($item->price ?? 0, 2, '.', ',') }}" readonly />
                                                        </div>

                                                        <div class="col-lg-2 col-12 mb-lg-0 mb-2 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">Qty</p>
                                                            <input type="number" class="form-control" value="{{ $item->quantity ?? 0 }}" readonly/>
                                                        </div>

                                                        <div class="col-lg-2 col-12 mb-lg-0 mb-2 mt-2">
                                                            <p class="card-text col-title mb-md-50 mb-0">Price</p>
                                                            <input type="text" class="form-control" value="{{ number_format(($item->price ?? 0) * ($item->quantity ?? 0), 2, '.', ',') }}" readonly />
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="col-12" style="border-top: 1px solid;"></div>

                        <div class="col-md-5 col-12 m-auto">
                            <table class="table">
                                <tr>
                                    <td>Sub Total:</td>
                                    <td>{{ $inputs['subtotal'] }}</td>
                                </tr>
                                <tr>
                                    <td>Discount:</td>
                                    <td>{{ $inputs['discount'] }}</td>
                                </tr>
                                <tr>
                                    <td>Total:</td>
                                    <td>{{ $inputs['total'] }}</td>
                                </tr>
                            </table>
                        </div>

                        <div class="col-12 mt-2">
                            <button wire:click.prevent="edit" class="btn btn-primary mr-1">{{ __('Edit') }}</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
