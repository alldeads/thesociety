<div class="card-body">
	<div class="d-flex justify-content-between">

		@can('chart.create')
			<button type="button" class="btn btn-primary rounded" data-toggle="modal" data-target="#modal-chart-create" wire:ignore>
	  			<i data-feather="plus" class="mr-25"></i>
	      		<span>{{ __('Create') }}</span>
	    	</button>
		@endcan

		@can('chart.export')
	    	<div class="btn-group">
	      		<button type="button" class="btn btn-outline-primary ml-2 dropdown-toggle rounded" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	      			<i class="fas fa-download mr-1"></i>
	      			<span>{{ __('Export') }}</span>
	      		</button>
	             <div class="dropdown-menu">
	                <a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
	                	'type' => 'csv',
	                	'q'    => $this->search
	                ]) }}" target="_blank">
	      				<span>{{ __('CSV') }}</span>
	            	</a>
	            	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
	                	'type' => 'xls',
	                	'q'    => $this->search
	                ]) }}" target="_blank">
	      				<span>{{ __('EXCEL (xls)') }}</span>
	            	</a>

	            	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
	                	'type' => 'xlsx',
	                	'q'    => $this->search
	                ]) }}" target="_blank">
	      				<span>{{ __('EXCEL (xlsx)') }}</span>
	            	</a>

	            	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
	                	'type' => 'ods',
	                	'q'    => $this->search
	                ]) }}" target="_blank">
	      				<span>{{ __('ODS') }}</span>
	            	</a>

	            	<a class="dropdown-item" href="{{ route('chart-of-accounts-export', [
	                	'type' => 'pdf',
	                	'q'    => $this->search
	                ]) }}" target="_blank">
	      				<span>{{ __('PDF') }}</span>
	            	</a>
	            </div>
	    	</div>
	    @endcan   
	</div>
	<hr>
	<div class="row">
		<div class="col-lg-10 col-md-10 col-sm-12 mt-1">
			<div class="form-group">
	          	<input type="text" class="form-control" placeholder="Search account title, account type, and code" wire:model="search"/>
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