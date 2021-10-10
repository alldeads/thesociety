<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Edit Account') }}</h4>
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

                <form class="form">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account_title">
                                    {{ __('Account Title') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" class="form-control @error('account_type') is-invalid @enderror" id="account_title" wire:model.defer="inputs.account_title"/>

                                @error('account_title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account_code">
                                    {{ __('Account Code') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" class="form-control @error('account_code') is-invalid @enderror" id="account_code" wire:model.defer="inputs.account_code"/>

                                @error('account_code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account-type">
                                    {{ __('Account Type') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('account_type') is-invalid @enderror" id="account-type" wire:model.defer="inputs.account_type">
			            			<option> {{ __('Select Account Type') }}</option>
			            			@foreach( $types as $type)
			            				<option value="{{ $type->id }}">{{ ucwords($type->name) }}</option>
			            			@endforeach
			            		</select>

                                @error('account_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
          
                        <div class="col-12">
                            <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                            <button wire:click.prevent="read" class="btn btn-secondary mr-1">{{ __('View') }}</button>
                            <button wire:click.prevent="initialize" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>