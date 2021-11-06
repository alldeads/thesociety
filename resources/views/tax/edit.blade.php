@extends('layouts.contentLayoutMaster')

@section('title', 'Edit Tax')

@section('content')
	@livewire('tax.edit', ['tax' => $tax])
@endsection
