@extends('layouts/contentLayoutMaster')

@section('title', 'New Product')

@section('content')
	@livewire('product.create', ['company_id' => $company->id])
@endsection
