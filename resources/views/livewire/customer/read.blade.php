<section>
    <div class="row card">
        <div class="col-12 card-body">
            <div id="account-details-vertical">
                <div class="content-header">
                    <h5 class="mb-0 p-1">Basic Information</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="first_name">
                            First Name
                        </label>

                        <input type="text" id="first_name" class="form-control" wire:model="inputs.first_name" readonly/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="last_name">
                            Last Name
                        </label>

                        <input type="text" id="last-name" class="form-control" readonly wire:model="inputs.last_name"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="phone">
                            Phone No.
                        </label>

                        <input type="text" id="phone" class="form-control" readonly wire:model="inputs.phone"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="email">Email</label>

                        <input type="email" id="email" class="form-control" wire:model="inputs.email" readonly/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="status">
                            Status <span class="asterisk">*</span>
                        </label>

                        <input type="text" id="status" class="form-control" wire:model="inputs.status" readonly/>
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

                        <input type="text" id="company" class="form-control" wire:model="inputs.company" readonly/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="position">Position</label>

                        <input type="text" id="position" class="form-control" readonly wire:model="inputs.position"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="telephone">Telephone No.</label>

                        <input type="text" id="telephone" class="form-control" readonly wire:model="inputs.telephone"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="fax">Fax No.</label>

                        <input type="text" id="fax" class="form-control" readonly wire:model="inputs.fax"/>
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

                        <input type="text" id="address_line_1" class="form-control" readonly wire:model="inputs.address_line_1" />
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="address_line_2">Address Line 2</label>

                        <input type="text" id="address_line_2" class="form-control" readonly wire:model="inputs.address_line_2"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="city">City</label>

                        <input type="text" id="city" class="form-control" readonly wire:model="inputs.city"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="state">State / Province</label>

                        <input type="text" id="state" class="form-control" readonly wire:model="inputs.state"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="postal">Zip / Postal Code</label>

                        <input type="text" id="postal" class="form-control" readonly wire:model="inputs.postal"/>
                    </div>

                    <div class="form-group col-md-6">
                        <label class="form-label" for="country">Country</label>

                        <input type="text" id="country" class="form-control" readonly wire:model="inputs.country"/>
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

                        <input type="text" id="twitter" class="form-control" readonly wire:model="inputs.twitter"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="facebook">Facebook</label>

                        <input type="text" id="facebook" class="form-control" readonly wire:model="inputs.facebook"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="instagram">Instagram</label>

                        <input type="text" id="instagram" class="form-control" readonly wire:model="inputs.instagram"/>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="linkedin">Linkedin</label>

                        <input type="text" id="linkedin" class="form-control" readonly wire:model="inputs.linkedin"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="pinterest">Pinterest</label>

                        <input type="text" id="pinterest" class="form-control" readonly wire:model="inputs.pinterest"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="youtube">Youtube</label>

                        <input type="text" id="youtube" class="form-control" readonly wire:model="inputs.youtube"/>
                    </div>
                </div>
            </div>

            <div id="other-details-vertical">

                <div class="content-header">
                    <h5 class="mb-0 p-1">Others</h5>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="created_by">Created By</label>

                        <input type="text" id="created_by" class="form-control" readonly wire:model="inputs.created_by"/>

                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="created_at">Created On</label>

                        <input type="text" id="created_at" class="form-control" readonly wire:model="inputs.created_at"/>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label class="form-label" for="updated_by">Updated By</label>

                        <input type="text" id="updated_by" class="form-control" readonly wire:model="inputs.updated_by"/>
                    </div>
                    <div class="form-group col-md-6">
                        <label class="form-label" for="youtube">Updated On</label>

                        <input type="text" id="updated_at" class="form-control" readonly wire:model="inputs.updated_at"/>
                    </div>
                </div>

                <div>
                    <button class="btn btn-primary" wire:click="edit">Edit</button>
                </div>
            </div>
        </div>
    </div>
</section>