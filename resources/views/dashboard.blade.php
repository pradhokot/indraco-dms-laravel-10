@php
    $currentRole = $role ?? request('role', 'departemen');
    $currentRole = in_array($currentRole, ['admin', 'gudang', 'departemen']) ? $currentRole : 'departemen';
@endphp

@extends('layouts.app')

@section('title', 'Dashboard (' . ucfirst($currentRole) . ') - INDRACO Document Management System')

@section('content')
    @include('pages.dashboard.' . $currentRole)
@endsection
