<div>
    <div class="modal modal-slide-in fade" id="modal-tax-create" wire:ignore>
	    <div class="modal-dialog sidebar-sm">
	      	<form class="add-new-record modal-content pt-0">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

	        	<div class="modal-header mb-1">
	          		<h5 class="modal-title" id="exampleModalLabel">New Tax</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="tax-name">Tax Name</label>
	            		<input type="text" class="form-control" id="tax-name" required placeholder="Enter Tax Name" wire:model="inputs.tax_name"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="fixed-rate">Fixed Rate <small>(Optional)</small></label>
	            		<input type="number" class="form-control" id="fixed-rate" required placeholder="Enter Fixed Rate" wire:model="inputs.fixed_rate"/>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="percentage">Percentage(%)</label>
	            		<input type="number" class="form-control" id="percentage" required placeholder="Enter Percentage" wire:model="inputs.percentage"/>
	          		</div>

					<button wire:click.prevent="submit" class="btn btn-primary data-submit mr-1">Create</button>
					<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
	        	</div>
	      	</form>
	    </div>
	</div>
</div>