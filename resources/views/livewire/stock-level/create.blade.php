<section class="bs-validation">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Create Stock Level</h4>
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

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="product">{{ __('Product') }} <span class="asterisk">*</span></label>

                                <select class="form-control @error('product') is-invalid @enderror" id="product" wire:model="inputs.product">
                                    <option> {{ __('Select a product') }}</option>

                                    @foreach( $products as $product )
                                        <option value="{{ $product->id }}"> {{ __($product->name) }}</option>
                                    @endforeach
                                </select>

                                @error('product')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="branch">{{ __('Branch') }} <span class="asterisk">*</span></label>

                                <select class="form-control @error('branch') is-invalid @enderror" id="branch" wire:model="inputs.branch">
                                    <option> {{ __('Select a branch') }}</option>

                                    @foreach( $branches as $branch )
                                        <option value="{{ $branch->id }}"> {{ __($branch->name) }}</option>
                                    @endforeach
                                </select>

                                @error('branch')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="reason">{{ __('Reasons') }} <span class="asterisk">*</span></label>

                                <select class="form-control @error('reason') is-invalid @enderror" id="reason" wire:model="inputs.reason">
                                    <option> {{ __('Select a reason') }}</option>

                                    @foreach( $reasons as $reason )
                                        @if ($reason->id != 1 && $reason->id != 6)
                                            <option value="{{ $reason->id }}"> {{ __($reason->name) }}</option>
                                        @endif
                                    @endforeach
                                </select>

                                @error('reason')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="stock">{{ __('Current Stock') }} <span class="asterisk">*</span></label>

                                <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror"  wire:model="inputs.stock" readonly>

                                @error('stock')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        @if ($inputs['reason'] == 2)
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="add_stock">{{ __('Add Stock') }} <span class="asterisk">*</span></label>

                                    <input type="number" name="add_stock" class="form-control @error('add_stock') is-invalid @enderror"  wire:model="inputs.add_stock">

                                    @error('add_stock')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        @if ($inputs['reason'] == 3)
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="on_hand">{{ __('On Hand') }} <span class="asterisk">*</span></label>

                                    <input type="number" name="on_hand" class="form-control @error('on_hand') is-invalid @enderror"  wire:model="inputs.on_hand">

                                    @error('on_hand')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        @if ($inputs['reason'] == 4 || $inputs['reason'] == 5)
                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="damage">{{ __('Damage/Loss') }} <span class="asterisk">*</span></label>

                                    <input type="number" name="damage" class="form-control @error('damage') is-invalid @enderror"  wire:model="inputs.damage">

                                    @error('damage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        @endif

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="after">{{ __('Stock After') }}</label>

                                <input type="number" name="after" class="form-control @error('after') is-invalid @enderror"  wire:model="inputs.after" readonly>

                                @error('after')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">{{ __('Notes') }}</label>

                                <textarea class="form-control @error('notes') is-invalid @enderror" wire:model="inputs.notes"></textarea>

                                @error('notes')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <button wire:click.prevent="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>