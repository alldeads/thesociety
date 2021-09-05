<section class="bs-validation">
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">{{ $inputs['reference'] }}</h4>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="product">{{ __('Product') }}</label>

                                <input type="text" class="form-control" wire:model="inputs.product" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="branch">{{ __('Branch') }}</label>

                                <input type="text" class="form-control" wire:model="inputs.branch" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="reason">{{ __('Reason') }} </label>

                                <input type="text" class="form-control" wire:model="inputs.reason" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="stock">{{ __('Stock Before') }} </label>

                                <input type="number" name="stock" class="form-control"  wire:model="inputs.before" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="after">{{ __('Stock After') }}</label>

                                <input type="number" name="after" class="form-control"  wire:model="inputs.after" readonly>
                            </div>
                        </div>

                        <div class="col-md-4 col-12">
                            <div class="form-group">
                                <label class="form-label" for="difference">{{ __('Difference') }}</label>

                                <input type="number" name="difference" class="form-control"  wire:model="inputs.difference" readonly>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="notes">{{ __('Notes') }}</label>

                                <textarea class="form-control" wire:model="inputs.notes" disabled></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_by">{{ __('Created By') }}</label>

                                <input type="text" name="created_by" class="form-control"  wire:model="inputs.created_by" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_at">{{ __('Created On') }}</label>

                                <input type="text" name="created_at" class="form-control"  wire:model="inputs.created_at" readonly>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>