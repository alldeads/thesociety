@extends('layouts/contentLayoutMaster')

@section('title', 'View Sales Order')

@section('content')
	@livewire('sale.read', [
		'company' => $company,
		'sales'   => $sales
	])
@endsection

