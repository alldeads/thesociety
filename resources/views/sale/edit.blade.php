@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Sales Order')

@section('content')
	@livewire('sale.edit', [
		'company' => $company,
		'sales'   => $sales
	])
@endsection

