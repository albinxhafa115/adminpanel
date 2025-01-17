@extends('adminlte::page')

@section('content')

@include('includes/alert_info')

{{ Form::model( $product, ['route' => ['products.update', $product->id], 'method' => 'put', 'role' => 'form'] ) }}
    @include('admin.products._fields')
{{ Form::close() }}

@endsection

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@endsection
