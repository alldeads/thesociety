@extends('pos.layouts.master')

@section('content')
	<div class="row">
		@livewire('pos.cart', ['company_id' => $company->id])
		@livewire('pos.product', ['company_id' => $company->id])
	</div>
@endsection