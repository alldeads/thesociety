<section class="bs-validation">
  	<div class="row">
		<div class="col-12">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title">{{ $product->name }}</h4>
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

                                <textarea class="form-control" id="description" rows="3" wire:model="inputs.description" disabled></textarea>
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="short">
                                    {{ __('Brief Description') }}
                                </label>

                                <input type="text" id="short" class="form-control" placeholder="Enter Short Description" wire:model="inputs.brief_description" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cost">
                                    {{ __('Cost') }}
                                </label>

                                <input type="text" class="form-control" id="cost" wire:model="inputs.cost" readonly/>
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="srp">
                                    {{ __('SRP') }}
                                </label>

                                <input type="text" class="form-control" id="srp" wire:model="inputs.srp" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="mark_up">
                                    {{ __('Mark Up %') }}
                                </label>

                                <input type="text" class="form-control" id="mark_up" wire:model="inputs.mark_up" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="margin">
                                    {{ __('Margin %') }}
                                </label>

                                <input type="text" class="form-control" id="margin" wire:model="inputs.margin" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="discounted">
                                    {{ __('Discounted Price') }}
                                </label>

                                <input type="text" class="form-control" id="discounted" wire:model="inputs.discounted" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="threshold">
                                    {{ __('Threshold') }}
                                </label>

                                <input type="number" class="form-control" id="threshold" wire:model="inputs.threshold" readonly />
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" class="form-control" id="status" wire:model="inputs.status" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_at">
                                    {{ __('Created On') }}
                                </label>

                                <input type="text" class="form-control" id="created_at" wire:model="inputs.created_at" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="created_by">
                                    {{ __('Created By') }}
                                </label>

                                <input type="text" class="form-control" id="created_by" wire:model="inputs.created_by" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_at">
                                    {{ __('Updated On') }}
                                </label>

                                <input type="text" class="form-control" id="updated_at" wire:model="inputs.updated_at" readonly />
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="updated_by">
                                    {{ __('Updated By') }}
                                </label>

                                <input type="text" class="form-control" id="updated_by" wire:model="inputs.updated_by" readonly />
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