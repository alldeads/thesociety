<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $inputs['name'] }}</h4>
                </div>

                <div class="card-body">

                    <form class="form">
                        <div class="row">

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">{{ __('Name') }}</label>

                                    <input type="text" wire:model="inputs.name" id="name" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="abbr">
                                        {{ __('Abbreviation (Code)') }}
                                    </label>

                                    <input type="text" wire:model="inputs.abbr" id="abbr" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="phone">
                                        {{ __('Phone No.') }}
                                    </label>

                                    <input type="text" wire:model="inputs.phone" id="phone" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="address">{{ __('Address') }}</label>

                                    <input type="text" wire:model="inputs.address" id="address" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-4 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="status">
                                        {{ __('Status') }}
                                    </label>

                                    <input type="text" wire:model="inputs.status" id="status" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="description">
                                        {{ __('Description') }}
                                    </label>

                                    <textarea rows="2" cols="5" class="form-control" id="description" wire:model="inputs.description" disabled></textarea>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="created_by">
                                        {{ __('Created By') }}
                                    </label>

                                    <input type="text" wire:model="inputs.created_by" id="created_by" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="created_at">
                                        {{ __('Date Created') }}
                                    </label>

                                    <input type="text" wire:model="inputs.created_at" id="created_at" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="updated_by">
                                        {{ __('Updated By') }}
                                    </label>

                                    <input type="text" wire:model="inputs.updated_by" id="updated_by" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="updated_at">
                                        {{ __('Date Updated') }}
                                    </label>

                                    <input type="text" wire:model="inputs.updated_at" id="updated_at" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <button wire:click.prevent="edit" class="btn btn-primary mr-1">{{ __('Edit') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
