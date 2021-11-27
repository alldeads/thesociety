@extends('layouts.contentLayoutMaster')

@section('title', 'Accounts Payable')

@section('content')
	{{-- @include('panels.report') --}}
	@livewire('accounts-payable.index', ['company_id' => $company->id])
@endsection
