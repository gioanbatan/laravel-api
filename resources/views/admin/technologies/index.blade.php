@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col">
                @foreach ($technologies as $technology)
                    <div>{{ $technology->name }}</div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
