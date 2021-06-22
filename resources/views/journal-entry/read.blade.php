@extends('layouts/contentLayoutMaster')

@section('title', 'View Journal Entry')

@section('content')
	@livewire('journal-entry.read', ['journal' => $journal])
@endsection