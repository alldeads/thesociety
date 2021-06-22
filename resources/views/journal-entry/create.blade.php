@extends('layouts/contentLayoutMaster')

@section('title', 'Journal Entries')

@section('content')
	@livewire('journal-entry.create', ['company_id' => $company->id])
@endsection