@extends('layouts/contentLayoutMaster')

@section('title', 'Branches')

@section('content')
	@livewire('branch.index', ['company_id' => $company->id])
@endsection
