@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Product')

@section('content')
	@livewire('product.edit', [
		'company_id' => $company->id,
		'product'    => $product
	])
@endsection
