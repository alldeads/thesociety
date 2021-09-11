@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Purchase Order')

@section('content')
	@livewire('purchase-order.edit', [
		'company'    => $company,
		'purchase'   => $purchase
	])
@endsection

