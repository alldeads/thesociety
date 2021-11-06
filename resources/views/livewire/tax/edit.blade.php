<section>
    <div class="row">
        <div class="col-12">
            <div class="card">
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

                    <form class="form">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="name">
                                        {{ __('Name') }} <span class="asterisk">*</span>
                                    </label>
                                    
                                    <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" wire:model.defer="inputs.name">

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label class="form-label" for="percentage">
                                        {{ __('Percentage') }} <span class="asterisk">*</span>
                                    </label>
                                    
                                    <input type="number" id="percentage" class="form-control @error('percentage') is-invalid @enderror" wire:model.defer="inputs.percentage">

                                    @error('percentage')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
              
                            <div class="col-12">
                                <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                                <button wire:click.prevent="read" class="btn btn-secondary mr-1">{{ __('View') }}</button>
                                <button wire:click.prevent="resetBtn" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
