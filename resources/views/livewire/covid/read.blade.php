<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ ucwords($covid->name) }}</h4>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 col-12">
                        <div class="form-group">
                            <label class="form-label" for="date_visited">
                                {{ __('Date Visited') }}
                            </label>

                            <input type="text" class="form-control" id="date_visited" readonly wire:model="inputs.date_visited"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="first_name">
                                {{ __('First Name') }}
                            </label>

                            <input type="text" class="form-control" id="first_name" wire:model="inputs.first_name" readonly/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="last_name">
                                {{ __('Last Name') }}
                            </label>

                            <input type="text" class="form-control" id="last_name" readonly wire:model="inputs.last_name"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="phone">
                                {{ __('Phone Number') }}
                            </label>

                            <input type="text" class="form-control" id="phone" readonly wire:model="inputs.phone"/>
                        </div>
                    </div>

                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label class="form-label" for="address">
                                {{ __('Address') }}
                            </label>

                            <input type="text" class="form-control" id="address" readonly wire:model="inputs.address"/>
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