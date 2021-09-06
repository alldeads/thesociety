<section>
	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-header">
					<h4 class="card-title">{{ __('Edit Cash Flow Entry') }}</h4>
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

							<div class="col-12">
                				<div class="form-group">
                  					<label class="form-label" for="balance">
                  						{{ __('Running Balance') }}
                  					</label>

	            					<input type="text" id="balance" class="form-control" wire:model="inputs.balance" readonly>
                				</div>
              				</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="posting-date">
										{{ __('Posting Date') }} <span class="asterisk">*</span>
									</label>
									<input type="date" id="posting-date" class="form-control @error('posting_date') is-invalid @enderror" wire:model="inputs.posting_date">

									@error('posting_date')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="account-title">
										{{ __('Account Title') }} <span class="asterisk">*</span>
									</label>

									<select class="form-control @error('account_title') is-invalid @enderror" id="account-title" wire:model="inputs.account_title">
										<option> {{ __('Select account') }}</option>
										@foreach($accounts as $account)
											<option value="{{ $account->id }}"> {{ ucwords($account->chart_name) }}</option>
										@endforeach
									</select>

									@error('account_title')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="account_number">{{ __('Account No.') }} (<em>{{ __('optional') }}</em>)</label>
									<input type="number" wire:model="inputs.account_number" id="account_number" class="form-control">
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="check_no">
										{{ __('Check No.') }} (<em>{{ __('optional') }}</em>)
									</label>
									<input type="number" wire:model="inputs.check_no" id="check_no" class="form-control">
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="movement">
										{{ __('Movement') }} <span class="asterisk">*</span>
									</label>
									<select class="form-control @error('movement') is-invalid @enderror" id="movement" wire:model="inputs.movement" {{ $last->id != $cashflow->id ? "disabled" : "" }}>
										<option> {{ __('Select Movement') }}</option>
										<option value="cr"> {{ __('Credit') }}</option>
										<option value="dr"> {{ __('Debit') }}</option>
									</select>

									@error('movement')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="amount">
										{{ __('Amount') }} <span class="asterisk">*</span>
									</label>
									<input type="number" wire:model="inputs.amount" id="amount" class="form-control @error('amount') is-invalid @enderror" {{ $last->id != $cashflow->id ? "readonly" : "" }}>

									@error('amount')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="payee">
										{{ __('Payee/Payor') }} <span class="asterisk">*</span>
									</label>
									<select class="form-control @error('payor') is-invalid @enderror" id="payee" wire:model="inputs.payor">
										<option> {{ __('Select payee or payor') }}</option>
										@foreach($users as $user)
											@if ( isset($user->profile->name) )
												<option value="{{ $user->id }}"> {{ ucwords($user->profile->name) }}</option>
											@endif
										@endforeach
									</select>

									@error('payor')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="attachment">{{ __('Attachment') }} (<em>{{ __('optional') }}</em>)</label>
									<input type="file" id="attachment" class="form-control" wire:model="inputs.attachment">

									@if ($inputs['old_attachment'])
										<span> <a href="{{ $inputs['old_attachment'] }}" target="_blank"> View Attachment</a></span>
									@endif
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="description">
										{{ __('Description') }} <span class="asterisk">*</span>
									</label>
									<textarea rows="2" cols="5" class="form-control @error('description') is-invalid @enderror" id="description" wire:model="inputs.description"></textarea>

									@error('description')
										<span class="invalid-feedback" role="alert">
											<strong>{{ $message }}</strong>
										</span>
									@enderror
								</div>
							</div>

							<div class="col-md-6 col-12">
								<div class="form-group">
									<label class="form-label" for="notes">{{ __('Notes') }} (<em>{{ __('optional') }}</em>)</label>
									<textarea rows="2" cols="5" class="form-control" id="notes" wire:model="inputs.notes"></textarea>
								</div>
							</div>
			  
							<div class="col-12">
								<button wire:click.prevent="save" class="btn btn-primary mr-1 mt-1">{{ __('Save Changes') }}</button>
								<button wire:click.prevent="read" class="btn btn-info mr-1 mt-1">{{ __('View') }}</button>
								<button wire:click.prevent="resetBtn" class="btn btn-outline-secondary mt-1">{{ __('Reset') }}</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>