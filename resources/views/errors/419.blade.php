@extends('errors.layout')

@section('code', '419')
@section('error_title', 'Session Expired')
@section('message', 'Your session has expired for security reasons. Please refresh the page and try again.')
@section('hint', 'This usually happens after a page is left open for a long time or a form token becomes invalid.')
@section('icon', 'bi-clock-history')
