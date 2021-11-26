@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Expense')

@section('content')
	@livewire('expense.edit', ['expense' => $expense])
@endsection