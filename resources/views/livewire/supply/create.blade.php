<section class="bs-validation">
  	<div class="row">
		<div class="col-12">
	  		<div class="card">
				<div class="card-header">
		  			<h4 class="card-title">Create Supply</h4>
				</div>

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

					<div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="sku">
                                    {{ __('SKU') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" id="sku" class="form-control @error('sku') is-invalid @enderror" wire:model="inputs.sku">

                                @error('sku')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="name">
                                    {{ __('Name') }} <span class="asterisk">*</span>
                                </label>

                                <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model="inputs.name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="description">
                                    {{ __('Description') }} <span class="asterisk">*</span>
                                </label>

                                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" wire:model="inputs.description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="avatar">
                                    {{ __('Image') }}
                                </label>

                                <input type="file" class="form-control @error('avatar') is-invalid @enderror" id="avatar" wire:model="inputs.avatar" />

                                @error('avatar')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="cost">
                                    {{ __('Cost') }} <span class="asterisk">*</span>
                                </label>

                                <input type="number" class="form-control @error('cost') is-invalid @enderror" id="cost" wire:model="inputs.cost" />

                                @error('cost')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="threshold">
                                    {{ __('Threshold') }}
                                </label>

                                <input type="number" class="form-control @error('threshold') is-invalid @enderror" id="threshold" wire:model="inputs.threshold"/>

                                @error('threshold')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('status') is-invalid @enderror" id="status" wire:model="inputs.status">
									<option value="">Select Status</option>
									<option value="published">Publish</option>
									<option value="draft">Draft</option>
									<option value="new">New</option>
									<option value="in-stock">In Stock</option>
									<option value="out-stock">Out of Stock</option>
		          				</select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
							<button wire:click.prevent="submit" class="btn btn-primary">Submit</button>
		  				</div>
                    </div>
				</div>
	  		</div>
		</div>
	</div>
</section>