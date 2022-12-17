<tr>
	<td>
		<a href="#" wire:click.prevent="edit"> 
			{{ $account->code }}
		</a>
	</td>
	<td>{{ $account->name }}</td>
	<td>
		<span class="badge badge-pill  badge-light-{{ $account->type->color }}">
			{{ $account->type->name }}
		</span>
	</td>

	@if($hasPermissions)
		@include('partials.action')
	@endif
</tr>