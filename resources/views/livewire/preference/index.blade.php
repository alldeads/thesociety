<div class="row">
    <div class="col-12">
        <div class="card">
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

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account_payable">{{ __('Accounts Payable') }}</label>

                                <select class="form-control @error('account_payable') is-invalid @enderror" id="account_payable" wire:model.defer="inputs.account_payable">
			            			<option> {{ __('Select Account Title') }}</option>
			            			@foreach($accounts as $account)
										<option value="{{ $account->id }}"> {{ "($account->code) - " . ucwords($account->chart_name) }}</option>
									@endforeach
			            		</select>

                                @error('account_payable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account_receivable">{{ __('Accounts Receivable') }} </label>

                                <select class="form-control @error('account_receivable') is-invalid @enderror" id="account_receivable" wire:model.defer="inputs.account_receivable">
			            			<option> {{ __('Select Account Title') }}</option>
			            			@foreach($accounts as $account)
                                        <option value="{{ $account->id }}"> {{ "($account->code) - " . ucwords($account->chart_name) }}</option>
									@endforeach
			            		</select>

                                @error('account_receivable')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="expenses">{{ __('Expenses') }} </label>

                                <select class="form-control @error('expenses') is-invalid @enderror" id="expenses" wire:model.defer="inputs.expenses">
			            			<option> {{ __('Select Account Type') }}</option>
			            			@foreach($accounts as $account)
										<option value="{{ $account->id }}"> {{ ucwords($account->chart_name) }}</option>
									@endforeach
			            		</select>

                                @error('expenses')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
          
                        <div class="col-12">
                            <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Save Changes') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
