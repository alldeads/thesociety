@extends('layouts/contentLayoutMaster')

@section('title', 'Expenses')

@section('content')
	@livewire('expense.create', ['company_id' => $company->id])
@endsection