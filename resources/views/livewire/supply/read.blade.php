<section class="bs-validation">
  	<div class="row">
		<div class="col-12">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title">{{ $supply->name }}</h4>
				</div>

				<div class="card-body">
					<div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="sku">
                                    {{ __('SKU') }}
                                </label>

                                <input type="text" id="sku" class="form-control" wire:model="inputs.sku" readonly>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="name">
                                    {{ __('Name') }}
                                </label>

                                <input type="text" id="name" class="form-control" wire:model="inputs.name" readonly>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="description">
                                    {{ __('Description') }}
                                </label>

                                <textarea class="form-control" id="description" rows="3" wire:model="inputs.description" readonly></textarea>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cost">
                                    {{ __('Cost') }}
                                </label>

                                <input type="text" class="form-control" id="cost" wire:model="inputs.cost" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="threshold">
                                    {{ __('Threshold') }}
                                </label>

                                <input type="text" class="form-control" id="threshold" wire:model="inputs.threshold" readonly />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }}
                                </label>

                                <input type="text" id="status" class="form-control" readonly wire:model="inputs.status"/>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="created_by">
                                    {{ __('Created By') }}
                                </label>

                                <input type="text" id="created_by" class="form-control" readonly wire:model="inputs.created_by"/>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="created_at">
                                    {{ __('Created On') }}
                                </label>

                                <input type="text" id="created_at" class="form-control" readonly wire:model="inputs.created_at"/>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="updated_by">
                                    {{ __('Updated By') }}
                                </label>

                                <input type="text" id="updated_by" class="form-control" readonly wire:model="inputs.updated_by"/>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="form-group">
                                <label class="form-label" for="udpated_at">
                                    {{ __('Updated On') }}
                                </label>

                                <input type="text" id="udpated_at" class="form-control" readonly wire:model="inputs.updated_at"/>
                            </div>
                        </div>

                        <div class="col-12">
							<button wire:click.prevent="edit" class="btn btn-primary">Edit</button>
		  				</div>
                    </div>
				</div>
	  		</div>
		</div>
	</div>
</section>