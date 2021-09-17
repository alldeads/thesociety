<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('New Branch') }}</h4>
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

                <form class="form">
                    <div class="row">

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="name">{{ __('Name') }} <span class="asterisk">*</span></label>

                                <input type="text" wire:model="inputs.name" id="name" class="form-control @error('name') is-invalid @enderror">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="abbr">
                                    {{ __('Abbreviation (Code)') }} (<em>{{ __('optional') }}</em>)
                                </label>

                                <input type="text" wire:model="inputs.abbr" id="abbr" class="form-control @error('abbr') is-invalid @enderror">

                                @error('abbr')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="phone">
                                    {{ __('Phone No.') }} (<em>{{ __('optional') }}</em>)
                                </label>

                                <input type="text" wire:model="inputs.phone" id="phone" class="form-control @error('phone') is-invalid @enderror">

                                @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="address">{{ __('Address') }} <span class="asterisk">*</span></label>

                                <input type="text" wire:model="inputs.address" id="address" class="form-control @error('address') is-invalid @enderror">

                                @error('address')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label class="form-label" for="description">
                                    {{ __('Description') }} (<em>{{ __('optional') }}</em>)
                                </label>

                                <textarea rows="2" cols="5" class="form-control @error('description') is-invalid @enderror" id="description" wire:model="inputs.description"></textarea>

                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label class="form-label" for="status">
                                    {{ __('Status') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('status') is-invalid @enderror" id="status" wire:model="inputs.status">
                                    <option> {{ __('Select Status') }}</option>
                                    <option value="active"> {{ __('Active') }}</option>
                                    <option value="inactive"> {{ __('Inactive') }}</option>
                                </select>

                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
          
                        <div class="col-12">
                            <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Create') }}</button>
                            <button wire:click.prevent="resetBtn" class="btn btn-outline-secondary">{{ __('Reset') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
