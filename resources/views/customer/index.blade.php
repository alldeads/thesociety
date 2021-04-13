@extends('layouts/contentLayoutMaster')

@section('title', 'Customers')

@section('content')
	@livewire('customer.index', ['company_id' => $company->id])
@endsection
