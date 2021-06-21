@extends('layouts/contentLayoutMaster')

@section('title', 'Journal Entries')

@section('content')
	@livewire('journal-entry.index', ['company_id' => $company->id])
@endsection