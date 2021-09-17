<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">{{ __('New Payment Type') }}</h4>
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
                                    <option> {{ __('Select Type') }}</option>
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
          
                        <div class="col-12">
                            <button wire:click.prevent="submit" class="btn btn-primary mr-1">{{ __('Create') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
