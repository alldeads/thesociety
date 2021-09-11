@extends('layouts/contentLayoutMaster')

@section('title', 'Sales Order')

@section('content')
	@livewire('sale.index', ['company_id' => $company->id])
@endsection
