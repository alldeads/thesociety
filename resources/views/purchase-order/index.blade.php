@extends('layouts/contentLayoutMaster')

@section('title', 'Purchase Orders')

@section('content')
	@livewire('purchase-order.index', ['company_id' => $company->id])
@endsection
