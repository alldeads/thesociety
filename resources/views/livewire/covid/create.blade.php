<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('New Record') }}</h4>
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
                            <label class="form-label" for="date_visited">
                                {{ __('Date Visited') }} <span class="asterisk">*</span>
                            </label>

                            <input type="date" class="form-control @error('date_visited') is-invalid @enderror" id="date_visited" wire:model.defer="inputs.date_visited"/>

                            @error('date_visited')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="first_name">
                                {{ __('First Name') }} <span class="asterisk">*</span>
                            </label>

                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" wire:model.defer="inputs.first_name"/>

                            @error('first_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="last_name">
                                {{ __('Last Name') }} <span class="asterisk">*</span>
                            </label>

                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="account_code" wire:model.defer="inputs.last_name"/>

                            @error('last_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="phone">
                                {{ __('Phone Number') }} <span class="asterisk">*</span>
                            </label>

                            <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phone" wire:model.defer="inputs.phone"/>

                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="address">
                                {{ __('Address') }} <span class="asterisk">*</span>
                            </label>

                            <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" wire:model.defer="inputs.address"/>

                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
      
                    <div class="col-12">
                        <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Create') }}</button>
                        <button wire:click.prevent="initialize" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>