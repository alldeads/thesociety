@extends('layouts.contentLayoutMaster')

@section('title', 'View Tax')

@section('content')
	@livewire('tax.read', ['tax' => $tax])
@endsection
