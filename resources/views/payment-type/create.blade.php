@extends('layouts/contentLayoutMaster')

@section('title', 'Payment Types')

@section('content')
	@livewire('payment-type.create', ['company_id' => $company->id])
@endsection