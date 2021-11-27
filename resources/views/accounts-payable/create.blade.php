@extends('layouts/contentLayoutMaster')

@section('title', 'Accounts Payable')

@section('content')
	@livewire('accounts-payable.create', ['company_id' => $company->id])
@endsection