@extends('layouts/contentLayoutMaster')

@section('title', 'Create Purchase Order')

@section('content')
	@livewire('purchase-order.create', ['company' => $company])
@endsection