<div>
    <div class="modal modal-slide-in fade" id="modal-cash-flow-create" wire:ignore>
	    <div class="modal-dialog sidebar-sm">
	      	<form class="add-new-record modal-content pt-0">
	        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">×</button>

	        	<div class="modal-header mb-1">
	          		<h5 class="modal-title" id="exampleModalLabel">New Entry</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="basic-icon-cash-flow">Account Title</label>
	            		<select class="form-control form-control-lg" id="basic-icon-cash-flow" wire:model="inputs.account_title">
	            			<option> Select account</option>
	            			@foreach($accounts as $account)
	            				<option value="{{ $account->id }}"> {{ ucwords($account->chart_name) }}</option>
	            			@endforeach
              			</select>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="basic-icon-cash-flow-type">Movement</label>
	            		<select class="form-control form-control-lg" id="basic-icon-cash-flow-type" wire:model="inputs.movement">
	            			<option> Select movement</option>
	            			<option value="cr"> Credit</option>
	            			<option value="dr"> Debit</option>
              			</select>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="amount">Amount</label>
	            		<input type="number" wire:model="inputs.amount" id="amount" class="form-control">
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="payee">Payee/Payor</label>
	            		<select class="form-control form-control-lg" id="payee" wire:model="inputs.payor">
	            			<option> Select payee or payor</option>
	            			@foreach($users as $user)
	            				@if ( isset($user->profile->name) )
	            					<option value="{{ $user->id }}"> {{ ucwords($user->profile->name) }}</option>
	            				@endif
	            			@endforeach
              			</select>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="notes">Notes (<em>optional</em>)</label>
	            		<textarea rows="2" cols="5" class="form-control" id="notes" wire:model="inputs.notes"></textarea>
	          		</div>

	          		<div class="form-group">	
	            		<label class="form-label" for="attachment">Attachment (<em>optional</em>)</label>
	            		<input type="file" class="form-control" wire:model="inputs.attachment">
	          		</div>

					<button wire:click.prevent="submit" class="btn btn-primary data-submit mr-1">Create</button>
					<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
	        	</div>
	      	</form>
	    </div>
	</div>
</div>