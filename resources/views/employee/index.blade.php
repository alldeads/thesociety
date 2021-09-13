@extends('layouts/contentLayoutMaster')

@section('title', 'Employees')

@section('content')
	@livewire('employee.index', ['company_id' => $company->id])
@endsection
