@extends('layouts.app')

@section('content')
    <div class="flex">
        <div class="w-3/12">
            nav
        </div>
        <div class="w-7/12 border border-b-0 border-t-0 !border-gray-800">
            <app-timeline></app-timeline>
        </div>
    </div>
@endsection
