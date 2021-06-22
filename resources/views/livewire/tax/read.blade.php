<div>
    <div class="modal modal-slide-in fade" id="modal-tax-read" wire:ignore>
        <div class="modal-dialog sidebar-sm">
            <form class="add-new-record modal-content pt-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

                <div class="modal-header mb-1">
                    <h5 class="modal-title" id="exampleModalLabel">{{ __('View Tax') }}</h5>
                </div>

                <div class="modal-body flex-grow-1">
                    <div class="form-group">    
                        <label class="form-label" for="tax-name-edit">{{ __('Tax Name') }}</label>
                        <input type="text" class="form-control" id="tax-name-edit" wire:model="inputs.tax_name" readonly />
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="percentage-edit">{{ __('Percentage %') }}</label>
                        <input type="number" class="form-control" id="percentage-edit" wire:model="inputs.percentage" readonly />
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-by">{{ __('Created By') }}</label>

                        <input type="text" class="form-control" id="read-created-by" readonly wire:model="inputs.created_by"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-at">{{ __('Date Created') }}</label>

                        <input type="text" class="form-control" id="read-created-at" readonly wire:model="inputs.created_at"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-updated-by">{{ __('Last Updated By') }}</label>

                        <input type="text" class="form-control" id="read-updated-by" readonly wire:model="inputs.updated_by"/>
                    </div>

                    <div class="form-group">    
                        <label class="form-label" for="read-created-at">{{ __('Last Date Updated') }}</label>

                        <input type="text" class="form-control" id="read-updated-at" readonly wire:model="inputs.updated_at"/>
                    </div>

                    <button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>