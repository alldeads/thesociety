@extends('layouts/contentLayoutMaster')

@section('title', 'Products')

@section('content')
	@livewire('product.index', ['company_id' => $company->id])
@endsection
