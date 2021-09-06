@extends('layouts/contentLayoutMaster')

@section('title', 'Roles')

@section('content')
	@livewire('role.index', ['company_id' => $company->id])
@endsection
