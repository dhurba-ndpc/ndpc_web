@extends('errors.layout')

@section('code', '429')
@section('error_title', 'Too Many Requests')
@section('message', 'We received too many requests in a short time. Please wait a moment before trying again.')
@section('hint', 'Rate limits help keep Namaste Pay services stable, secure, and available for everyone.')
@section('icon', 'bi-hourglass-split')
