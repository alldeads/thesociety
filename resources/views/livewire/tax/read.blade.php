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
                                    <label class="form-label" for="name">
                                        {{ __('Name') }}
                                    </label>
                                    
                                    <input type="text" id="name" class="form-control" wire:model.defer="inputs.name" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="percentage">
                                        {{ __('Percentage') }}
                                    </label>
                                    
                                    <input type="number" id="percentage" class="form-control" wire:model.defer="inputs.percentage" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="created_by">
                                        {{ __('Created By') }}
                                    </label>
                                    
                                    <input type="text" id="created_by" class="form-control" wire:model.defer="inputs.created_by" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="created_at">
                                        {{ __('Created On') }}
                                    </label>
                                    
                                    <input type="text" id="created_at" class="form-control" wire:model.defer="inputs.created_at" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="updated_by">
                                        {{ __('Updated By') }}
                                    </label>
                                    
                                    <input type="text" id="updated_by" class="form-control" wire:model.defer="inputs.updated_by" readonly>
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="updated_at">
                                        {{ __('Updated On') }}
                                    </label>
                                    
                                    <input type="text" id="updated_at" class="form-control" wire:model.defer="inputs.updated_at" readonly>
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
</section>
