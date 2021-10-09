<div class="card-body">
	<div class="d-flex justify-content-between">

		@can($permission . '.create')
			<button type="button" class="btn btn-primary rounded" wire:click="create" wire:ignore>
	  			<i data-feather="plus" class="mr-25"></i>
	      		<span>{{ __('Create') }}</span>
	    	</button>
		@endcan

		@can($permission . '.export')
	    	<div class="btn-group">
	      		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	      			<i class="fas fa-download mr-1"></i>
	      			<span>{{ __('Export') }}</span>
	      		</button>
	             <div class="dropdown-menu">
	             	@foreach($file_types as $x => $type)
	             		<a class="dropdown-item" href="{{ route($export, [
		             			'type' => $x, 
		             			'q'    => $search,
		             			'from' => $from,
		             			'to'   => $to
		             		]) }}" target="_blank">
		      				<span>
		      					{{ __($type) }}
		      				</span>
		            	</a>
	             	@endforeach
	            </div>
	    	</div>
	    @endcan   
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-6 col-md-6 col-sm-12 mt-1">
			<div class="form-group">
	          	<input type="text" class="form-control" placeholder="{{ $placeholder }}" wire:model="search"/>
			</div>
		</div>

		<div class="col-md-2 col-lg-2 col-sm-12 mt-1">
			<div class="form-group">
	          	<input type="text" class="form-control basicpkr" placeholder="Date From" wire:model="from" />
			</div>
		</div>

		<div class="col-md-2 col-lg-2 col-sm-12 mt-1">
			<div class="form-group">
	          	<input type="text" class="form-control basicpkr" placeholder="Date To" wire:model="to" />
			</div>
		</div>

		<div class="col-lg-2 col-md-10 col-sm-12 mt-1">
			<div class="form-group">
	          	<select class="form-control" wire:model="limit">
	          		<option value="10">{{ __('10 entries') }}</option>
	          		<option value="25">{{ __('25 entries') }}</option>
	          		<option value="50">{{ __('50 entries') }}</option>
	          		<option value="100">{{ __('100 entries') }}</option>
	          		<option value="100">{{ __('250 entries') }}</option>
	          		<option value="100">{{ __('500 entries') }}</option>
	          		<option value="100">{{ __('1000 entries') }}</option>
	          	</select>
			</div>
		</div>
	</div>
</div>