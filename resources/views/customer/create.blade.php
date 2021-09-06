@extends('layouts/contentLayoutMaster')

@section('title', 'New Customer')

@section('content')
	@livewire('customer.create', ['company_id' => $company->id])
@endsection
