@extends('errors.layout')

@section('code', '500')
@section('error_title', 'Server Error')
@section('message', 'Something unexpected happened while processing your request.')
@section('hint', 'Please try again shortly. If the issue continues, our support team can help you with the details.')
@section('icon', 'bi-exclamation-triangle')
