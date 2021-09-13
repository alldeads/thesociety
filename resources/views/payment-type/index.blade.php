@extends('layouts/contentLayoutMaster')

@section('title', 'Payment Types')

@section('content')
	@livewire('payment-type.index', ['company_id' => $company->id])
@endsection
