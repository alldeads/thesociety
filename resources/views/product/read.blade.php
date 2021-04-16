@extends('layouts/contentLayoutMaster')

@section('title', 'View Product')

@section('content')
	@livewire('product.read', [
		'company_id' => $company->id,
		'product'    => $product
	])
@endsection
