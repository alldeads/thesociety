@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Stock')

@section('content')
	@livewire('stock-level.edit', [
		'company_id' => $company->id,
		'stock'      => $stock
	])
@endsection
