@extends('layouts/contentLayoutMaster')

@section('title', 'Cash Flow')

@section('content')
	@livewire('cash-flow.index', ['company_id' => $company->id])
@endsection
