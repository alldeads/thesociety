<div>
    <div class="modal modal-slide-in fade" id="modal-chart-read" wire:ignore>
	    <div class="modal-dialog sidebar-sm">
	      	<form class="add-new-record modal-content pt-0">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

	        	<div class="modal-header mb-1">
	          		<h5 class="modal-title" id="exampleModalLabel">{{ __('Account Details') }}</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="read-title">{{ __('Account Title') }}</label>
	            		<input type="text" class="form-control" id="read-title" readonly wire:model="inputs.account_title"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="read-code">{{ __('Account Code') }}</label>
	            		<input type="text" class="form-control" id="read-code" readonly wire:model="inputs.account_code"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="read-type">{{ __('Account Type') }}</label>

	            		<input type="text" class="form-control" id="read-type" readonly wire:model="inputs.account_type"/>
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