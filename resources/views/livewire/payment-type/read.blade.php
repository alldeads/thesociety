<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ $this->inputs['name'] }}</h4>
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
                                <label class="form-label" for="type">{{ __('Type') }}</label>

                                <input type="text" wire:model="inputs.type" id="type" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">{{ __('Status') }}</label>

                                <input type="text" wire:model="inputs.status" id="status" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_by">{{ __('Created By') }}</label>

                                <input type="text" wire:model="inputs.created_by" id="created_by" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_at">{{ __('Created On') }}</label>

                                <input type="text" wire:model="inputs.created_at" id="created_at" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_by">{{ __('Updated By') }}</label>

                                <input type="text" wire:model="inputs.updated_by" id="updated_by" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_at">{{ __('Updated On') }}</label>

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
