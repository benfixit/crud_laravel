@extends('layouts.master')

@section('navigation')
    @parent
@endsection

@section('main-content')
    <div role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            @foreach($films as $film)
                @include('film.partials.brief')
            @endforeach

            <p class="lead">
                <a href="{{ route('film.show', $film->slug) }}" class="btn btn-sm btn-primary">See More Details</a>
            </p>
        </div>
    </div>

    <div class="container text-center mb-2">
        <p>
            {{ $films->links() }}
        </p>
    </div>
@endsection

@section('more-content')
    @parent
@endsection

@section('footer')
    @parent
@endsection