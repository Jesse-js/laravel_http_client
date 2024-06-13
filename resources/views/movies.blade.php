@extends('layouts.app')

@section('content')
    <x-list-item :items="$movies" firstField="Title" secondField="Year" imgField="Poster"/>
@endsection
