@extends('layouts.app')

@section('content')
    <x-list-item :items="$repos" firstField="name" secondField="description"/>
@endsection


