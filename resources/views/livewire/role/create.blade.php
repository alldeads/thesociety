<div>
    <div class="modal modal-slide-in fade" id="modal-1" wire:ignore>
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
	          		<h5 class="modal-title" id="exampleModalLabel">New Role</h5>
	        	</div>

	        	<div class="modal-body flex-grow-1">
	          		<div class="form-group">	
	            		<label class="form-label" for="basic-icon-default-fullname">Role Name</label>
	            		<input type="text" class="form-control" id="basic-icon-default-role" required placeholder="Enter Role Name" wire:model="inputs.name"/>
	          		</div>
					<button wire:click.prevent="submit" class="btn btn-primary data-submit mr-1">Create</button>
					<button type="reset" class="btn btn-outline-secondary" data-dismiss="modal">Cancel</button>
	        	</div>
	      	</form>
	    </div>
	</div>
</div>