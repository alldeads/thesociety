@extends('layouts/contentLayoutMaster')

@section('title', 'View Purchase Order')

@section('content')
	@livewire('purchase-order.view', [
		'company'    => $company,
		'purchase'   => $purchase
	])
@endsection

