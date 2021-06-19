@extends('layouts/contentLayoutMaster')

@section('title', 'Cash Flow')

@section('content')
	@livewire('cash-flow.create', ['company_id' => $company->id])
@endsection