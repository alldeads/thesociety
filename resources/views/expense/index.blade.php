@extends('layouts.contentLayoutMaster')

@section('title', 'Expenses')

@section('content')
	@livewire('expense.index', ['company_id' => $company->id])
@endsection
