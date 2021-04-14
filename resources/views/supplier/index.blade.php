@extends('layouts/contentLayoutMaster')

@section('title', 'Suppliers')

@section('content')
	@livewire('supplier.index', ['company_id' => $company->id])
@endsection
