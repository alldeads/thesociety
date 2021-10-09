<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ ucwords($account->account_title) }}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="form-label" for="account_title">
                                {{ __('Account Title') }}
                            </label>

                            <input type="text" class="form-control" id="account_title" wire:model="inputs.account_title" readonly/>
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="form-label" for="account_code">
                                {{ __('Account Code') }}
                            </label>

                            <input type="text" class="form-control" id="account_code" readonly wire:model="inputs.account_code"/>
                        </div>
                    </div>

                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label class="form-label" for="account_type">
                                {{ __('Account Type') }}
                            </label>

                            <input type="text" class="form-control" id="account_type" readonly wire:model="inputs.account_type"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="created_by">
                                {{ __('Created By') }}
                            </label>

                            <input type="text" class="form-control" id="created_by" readonly wire:model="inputs.created_by"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="created_at">
                                {{ __('Created On') }}
                            </label>

                            <input type="text" class="form-control" id="created_at" readonly wire:model="inputs.created_at"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="updated_by">
                                {{ __('Updated By') }}
                            </label>

                            <input type="text" class="form-control" id="updated_by" readonly wire:model="inputs.updated_by"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="update_at">
                                {{ __('Updated On') }}
                            </label>

                            <input type="text" class="form-control" id="update_at" readonly wire:model="inputs.updated_at"/>
                        </div>
                    </div>
      
                    <div class="col-12">
                        <button wire:click.prevent="edit" class="btn btn-primary mr-1">{{ __('Edit') }}</button>
                        <button wire:click.prevent="create" class="btn btn-outline-secondary">{{ __('Create Another') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>