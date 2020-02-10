@extends('layouts.app')


@section('content')   
   @if (Auth::check())
      <index-component></index-component>
   @else
      <list-component></list-component>
   @endif
@endsection  