<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('Edit Payment Type') }}</h4>
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
                                <label class="form-label" for="type">
                                    {{ __('Type') }} <span class="asterisk">*</span>
                                </label>

                                <select class="form-control @error('type') is-invalid @enderror" id="type" wire:model="inputs.type">
                                    <option> {{ __('Select a type') }}</option>
                                    <option value="card"> {{ __('Card') }}</option>
                                    <option value="check"> {{ __('Check') }}</option>
                                    <option value="other"> {{ __('Other') }}</option>
                                </select>

                                @error('type')
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
                                    <option> {{ __('Select a status') }}</option>
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
                            <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Update') }}</button>
                            <button wire:click.prevent="resetBtn" class="btn btn-outline-secondary mr-1">{{ __('Reset') }}</button>
                            <button wire:click.prevent="read" class="btn btn-secondary">{{ __('View') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
