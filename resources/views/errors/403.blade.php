@extends('errors.layout')

@section('code', '403')
@section('error_title', 'Access Restricted')
@section('message', 'You do not have permission to open this page or perform this action.')
@section('hint', 'If you believe this access should be allowed, please contact the administrator or sign in with the right account.')
@section('icon', 'bi-shield-lock')
