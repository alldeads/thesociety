<div>
    <div class="modal modal-slide-in fade" id="modal-tax-edit" wire:ignore>
	    <div class="modal-dialog sidebar-sm">
	      	<form class="add-new-record modal-content pt-0">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

	        	<div class="modal-header mb-1">
	          		<h5 class="modal-title" id="exampleModalLabel">Edit Tax</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="tax-name-edit">Tax Name</label>
	            		<input type="text" class="form-control" id="tax-name-edit" required placeholder="Enter Tax Name" wire:model="inputs.tax_name"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="fixed-rate-edit">Fixed Rate <small>(Optional)</small></label>
	            		<input type="number" class="form-control" id="fixed-rate-edit" required placeholder="Enter Fixed Rate" wire:model="inputs.fixed_rate"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="percentage-edit">Percentage(%)</label>
	            		<input type="number" class="form-control" id="percentage-edit" required placeholder="Enter Percentage" wire:model="inputs.percentage"/>
	          		</div>

					<button wire:click.prevent="submit" class="btn btn-primary data-submit mr-1">Save Changes</button>
					<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
	        	</div>
	      	</form>
	    </div>
	</div>
</div>