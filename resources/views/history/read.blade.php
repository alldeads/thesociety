@extends('layouts/contentLayoutMaster')

@section('title', 'View History')

@section('content')
	@livewire('history.read', [
		'history' => $history
	])
@endsection
