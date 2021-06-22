@extends('layouts/contentLayoutMaster')

@section('title', 'Edit Journal Entry')

@section('content')
	@livewire('journal-entry.edit', ['journal' => $journal])
@endsection