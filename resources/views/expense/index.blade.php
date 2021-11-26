@extends('layouts.contentLayoutMaster')

@section('title', 'Expenses')

@section('content')
	@include('panels.report')
	@livewire('expense.index', ['company_id' => $company->id])
@endsection
