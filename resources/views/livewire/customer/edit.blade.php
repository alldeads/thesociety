<section>
    <div class="row card">
        <div class="col-12 card-body">

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

            <div id="account-details-vertical">
                <div class="content-header">
                    <h5 class="mb-0 p-1">Basic Information</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="first_name">
                            First Name <span class="asterisk">*</span>
                        </label>

                        <input type="text" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="Enter First Name" wire:model="inputs.first_name"/>

                        @error('first_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="last_name">
                            Last Name <span class="asterisk">*</span>
                        </label>

                        <input type="text" id="last-name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Enter Last Name" wire:model="inputs.last_name"/>

                        @error('last_name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="phone">
                            Phone No. <span class="asterisk">*</span>
                        </label>

                        <input type="text" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Enter Phone No." wire:model="inputs.phone"/>

                        @error('phone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">
                        	Email <span class="asterisk">*</span>
                        </label>

                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Enter Email Address" wire:model="inputs.email"/>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="status">
                            Status <span class="asterisk">*</span>
                        </label>

                        <select class="form-control @error('status') is-invalid @enderror" id="status" wire:model="inputs.status">
                            <option>Select status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status->id }}"> {{ ucwords($status->name) }}</option>
                            @endforeach
                        </select>

                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr/>

            <div id="personal-info-vertical">
                <div class="content-header">
                    <h5 class="mb-0 p-1">Company Details</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="company">Company Name</label>

                        <input type="text" id="company" class="form-control @error('company') is-invalid @enderror" placeholder="Enter Company Name" wire:model="inputs.company" />

                        @error('company')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="position">Position</label>

                        <input type="text" id="position" class="form-control @error('position') is-invalid @enderror" placeholder="Enter Position" wire:model="inputs.position"/>

                        @error('position')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="telephone">Telephone No.</label>

                        <input type="text" id="telephone" class="form-control @error('telephone') is-invalid @enderror" placeholder="Enter Telephone No." wire:model="inputs.telephone"/>

                        @error('telephone')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="fax">Fax No.</label>

                        <input type="text" id="fax" class="form-control @error('fax') is-invalid @enderror" placeholder="Enter Fax No." wire:model="inputs.fax"/>

                        @error('fax')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr/>

            <div id="address-step-vertical">
                <div class="content-header">
                    <h5 class="mb-0 p-1">Address</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="address_line_1">Address Line 1</label>

                        <input type="text" id="address_line_1" class="form-control @error('address_line_1') is-invalid @enderror" placeholder="Enter Address Line 1" wire:model="inputs.address_line_1" />

                        @error('address_line_1')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="address_line_2">Address Line 2</label>

                        <input type="text" id="address_line_2" class="form-control @error('address_line_2') is-invalid @enderror" placeholder="Enter Address Line 2" wire:model="inputs.address_line_2"/>

                        @error('address_line_2')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="city">City</label>

                        <input type="text" id="city" class="form-control @error('city') is-invalid @enderror" placeholder="Enter City" wire:model="inputs.city"/>

                        @error('city')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="state">State / Province</label>

                        <input type="text" id="state" class="form-control @error('state') is-invalid @enderror" placeholder="Enter State or Province" wire:model="inputs.state"/>

                        @error('state')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="postal">Zip / Postal Code</label>

                        <input type="text" id="postal" class="form-control @error('postal') is-invalid @enderror" placeholder="Enter Zip Code" wire:model="inputs.postal"/>

                        @error('postal')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="country">Country</label>

                        <input type="text" id="country" class="form-control @error('country') is-invalid @enderror" placeholder="Enter Country" wire:model="inputs.country"/>

                        @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>

            <hr/>

            <div id="social-links-vertical">

                <div class="content-header">
                    <h5 class="mb-0 p-1">Social Media</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="twitter">Twitter</label>

                        <input type="text" id="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="https://twitter.com/abc" wire:model="inputs.twitter"/>

                        @error('twitter')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="facebook">Facebook</label>

                        <input type="text" id="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="https://facebook.com/abc" wire:model="inputs.facebook"/>

                        @error('facebook')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="instagram">Instagram</label>

                        <input type="text" id="instagram" class="form-control @error('instagram') is-invalid @enderror" placeholder="https://instagram.com/abc" wire:model="inputs.instagram"/>

                        @error('instagram')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="linkedin">Linkedin</label>

                        <input type="text" id="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="https://linkedin.com/abc" wire:model="inputs.linkedin"/>

                        @error('linkedin')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="pinterest">Pinterest</label>

                        <input type="text" id="pinterest" class="form-control @error('pinterest') is-invalid @enderror" placeholder="https://pinterest.com/abc" wire:model="inputs.pinterest"/>

                        @error('pinterest')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="youtube">Youtube</label>

                        <input type="text" id="youtube" class="form-control @error('youtube') is-invalid @enderror" placeholder="https://youtube.com/abc" wire:model="inputs.youtube"/>

                        @error('youtube')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                
                <div>
                    <button class="btn btn-primary" wire:click="submit">Save Changes</button>
                    <button class="btn btn-secondary ml-1" wire:click="read">View</button>
                </div>
            </div>
        </div>
    </div>
</section>