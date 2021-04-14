<div>
    <div class="modal modal-slide-in fade" id="modal-chart-create" wire:ignore>
	    <div class="modal-dialog sidebar-sm">
	      	<form class="add-new-record modal-content pt-0">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

	        	<div class="modal-header mb-1">
	          		<h5 class="modal-title" id="exampleModalLabel">New Account</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="basic-icon-account-name">Account Title</label>
	            		<input type="text" class="form-control" id="basic-icon-account-name" required placeholder="Enter Account Title" wire:model="inputs.account_title"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="account-code">Account Code</label>
	            		<input type="text" class="form-control" id="account-code" required placeholder="Enter Account Code" wire:model="inputs.account_code"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="account-type">Account Type</label>

	            		<select class="form-control" id="account-type" wire:model="inputs.account_type">
	            			<option> Select Account Type</option>
	            			@foreach( $types as $type)
	            				<option value="{{ $type->id }}">{{ ucwords($type->name) }}</option>
	            			@endforeach
	            		</select>
	          		</div>

					<button wire:click.prevent="submit" class="btn btn-primary data-submit mr-1">Create</button>
					<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
	        	</div>
	      	</form>
	    </div>
	</div>
</div>