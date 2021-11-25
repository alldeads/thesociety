@extends('layouts/contentLayoutMaster')

@section('title', 'Preferences')

@section('content')
	@livewire('preference.index', ['company_id' => $company->id])
@endsection
