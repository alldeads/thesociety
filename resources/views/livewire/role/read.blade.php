<div>
    <div class="modal modal-slide-in fade" id="modal-role-read" wire:ignore>
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

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

                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">View Role</h5>
                </div>

                <div class="modal-body flex-grow-1">

                    <div class="form-group">    
                        <label class="form-label" for="edit-role">Role Name</label>
                        <input type="text" class="form-control" id="edit-role" readonly wire:model="inputs.name"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-by">{{ __('Created By') }}</label>

                        <input type="text" class="form-control" id="read-created-by" readonly wire:model="inputs.created_by"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-at">{{ __('Created On') }}</label>

                        <input type="text" class="form-control" id="read-created-at" readonly wire:model="inputs.created_at"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-updated-by">{{ __('Updated By') }}</label>

                        <input type="text" class="form-control" id="read-updated-by" readonly wire:model="inputs.updated_by"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-at">{{ __('Updated On') }}</label>

                        <input type="text" class="form-control" id="read-updated-at" readonly wire:model="inputs.updated_at"/>
                    </div>

                    <button type="reset" class="btn btn-success" data-dismiss="modal">{{ __('Close') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>