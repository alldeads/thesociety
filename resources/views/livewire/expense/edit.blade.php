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
								<label class="form-label" for="posting-date">
									{{ __('Posting Date') }} <span class="asterisk">*</span>
								</label>
								<input type="date" id="posting-date" class="form-control @error('posting_date') is-invalid @enderror" wire:model.defer="inputs.posting_date">

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

								<select class="form-control @error('account_title') is-invalid @enderror" id="account-title" wire:model.defer="inputs.account_title">
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
								<input type="number" wire:model.defer="inputs.account_number" id="account_number" class="form-control">
							</div>
						</div>

						<div class="col-md-6 col-12">
							<div class="form-group">
								<label class="form-label" for="check_no">
									{{ __('Check No.') }} (<em>{{ __('optional') }}</em>)
								</label>
								<input type="number" wire:model.defer="inputs.check_no" id="check_no" class="form-control">
							</div>
						</div>

                        <div class="col-md-6 col-12">
							<div class="form-group">
								<label class="form-label" for="payee">
									{{ __('Payee/Payor') }} <span class="asterisk">*</span>
								</label>
								<select class="form-control @error('payor') is-invalid @enderror" id="payee" wire:model.defer="inputs.payor">
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
								<label class="form-label" for="amount">
									{{ __('Amount') }} <span class="asterisk">*</span>
								</label>
                                
								<input type="number" wire:model.defer="inputs.amount" id="amount" class="form-control @error('amount') is-invalid @enderror">

								@error('amount')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						<div class="col-md-6 col-12">
							<div class="form-group">
								<label class="form-label" for="attachment">{{ __('Attachment') }} (<em>{{ __('optional') }}</em>)</label>
								<input type="file" id="attachment" class="form-control" wire:model.defer="inputs.attachment">

								@if ($inputs['old_attachment'])
									<span> <a href="{{ $inputs['old_attachment'] }}" target="_blank"> View Attachment</a></span>
								@endif
							</div>
						</div>

                        <div class="col-md-6 col-12">
							<div class="form-group">
								<label class="form-label" for="status">
									{{ __('Status') }} (<em>{{ __('optional') }}</em>)</label>
								</label>
                                
								<select class="form-control @error('status') is-invalid @enderror" id="status" wire:model.defer="inputs.status">
									<option> {{ __('Select a status') }}</option>
                                    <option value="pending"> {{ __('Pending') }}</option>
                                    <option value="for-approval"> {{ __('For Approval') }}</option>
									<option value="for-reimbursement"> {{ __('For Reimbursement') }}</option>
                                    <option value="approved"> {{ __('Approved') }}</option>
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
								<label class="form-label" for="description">
									{{ __('Description') }} <span class="asterisk">*</span>
								</label>
								<textarea rows="2" cols="5" class="form-control @error('description') is-invalid @enderror" id="description" wire:model.defer="inputs.description"></textarea>

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
								<textarea rows="2" cols="5" class="form-control" id="notes" wire:model.defer="inputs.notes"></textarea>
							</div>
						</div>
		  
						<div class="col-12">
							<button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                            <button wire:click.prevent="read" class="btn btn-secondary mr-1">{{ __('View') }}</button>
							<button wire:click.prevent="resetBtn" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
