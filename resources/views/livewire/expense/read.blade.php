
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form class="form">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="posting-date">
                                    {{ __('Posting Date') }}
                                </label>

                                <input type="text" id="posting-date" class="form-control" wire:model="inputs.posting_date" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account-title">
                                    {{ __('Title') }}
                                </label>

                                <input type="text" id="account-title" class="form-control" wire:model="inputs.account_title" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="account-no">
                                    {{ __('Account No.') }}
                                </label>

                                <input type="text" id="account-no" class="form-control" wire:model="inputs.account_number" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="check-no">
                                    {{ __('Check No.') }}
                                </label>

                                <input type="text" id="check-no" class="form-control" wire:model="inputs.check_no" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="amount">
                                    {{ __('Amount') }}
                                </label>

                                <input type="text" id="amount" class="form-control" wire:model="inputs.amount" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="payee">
                                    {{ __('Payee/Payor') }}
                                </label>

                                <input type="text" id="payee" class="form-control" wire:model="inputs.payee" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="payee">
                                    {{ __('Attachment') }}
                                </label>

                                <input type="text" id="attachment" class="form-control" wire:model="inputs.attachment" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }}
                                </label>

                                <input type="text" id="amount" class="form-control" wire:model="inputs.status" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="description">
                                    {{ __('Description') }}
                                </label>

                                <textarea readonly rows="2" cols="5" class="form-control" id="description" wire:model="inputs.description"></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">
                                    {{ __('Notes') }}
                                </label>

                                <textarea rows="2" cols="5" class="form-control" id="notes" wire:model="inputs.notes" readonly></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_by">
                                    {{ __('Last Updated By') }}
                                </label>

                                <input type="text" id="updated_by" class="form-control" wire:model="inputs.updated_by" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_at">
                                    {{ __('Date Last Updated') }}
                                </label>

                                <input type="text" id="updated_at" class="form-control" wire:model="inputs.updated_at" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_by">
                                    {{ __('Created By') }}
                                </label>

                                <input type="text" id="created_by" class="form-control" wire:model="inputs.created_by" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_at">
                                    {{ __('Date Created') }}
                                </label>

                                <input type="text" id="created_at" class="form-control" wire:model="inputs.created_at" readonly>
                            </div>
                        </div>
        
                        <div class="col-12">
                            <button wire:click.prevent="edit" class="btn btn-primary mr-1">{{ __('Edit') }}</button>
                            <button wire:click.prevent="create" class="btn btn-outline-secondary">{{ __('Create Another') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
