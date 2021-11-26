@extends('layouts/contentLayoutMaster')

@section('title', 'View Expense')

@section('content')
	@livewire('expense.read', ['expense' => $expense])
@endsection