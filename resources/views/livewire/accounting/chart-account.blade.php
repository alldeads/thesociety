<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title">Create</h4>
			</div>
			<div class="table-responsive">
				<table class="table table-hover">
					<thead>
						<tr>
							<th>Code</th>
							<th>Name</th>
							<th>Account Type</th>
							<th>Actions</th>
						</tr>
					</thead>

					<tbody>
						@foreach($accounts as $account)
							@livewire('accounting.chart-account-item', ['account' => $account])
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>