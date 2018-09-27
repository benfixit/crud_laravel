@extends('layouts.master')

@section('navigation')
    @parent
@endsection

@section('main-content')
    <div role="main" class="container">
        <div class="my-3 p-3 bg-white rounded shadow-sm">
            @include('film.partials.brief')
        </div>
    </div>
@endsection

@section('more-content')
    <div class="container show-page">
        <div class="row mb-4">
            <div class="col-sm-3">
                <span class="text-gray-dark"><strong>Release Date:</strong> {{ $film->release_date }}</span>
            </div>
            <div class="col-sm-2">
                <span class="text-gray-dark"><strong>Ticket Price:</strong> {{ $film->ticket_price }}</span>
            </div>
            <div class="col-sm-2">
                <span class="text-gray-dark"><strong>Rating:</strong> </span>
                @for($i = 0; $i < $film->rating; $i++)
                    <i class="fas fa-star"></i>
                @endfor
            </div>
            <div class="col-sm-2">
                <span class="text-gray-dark"><strong>Country:</strong> {{ $film->country->name }}</span>
            </div>
            <div class="col-sm-3">
                <span class="text-gray-dark"><strong>Genre</strong> </span>
                @foreach($film->genres as $genre)
                    <span>{{ $genre->name }}, </span>
                @endforeach
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12 mb-8">
                @if(Auth::check())
                    <div class="my-3 p-3 bg-white rounded shadow-sm">
                        <h6 class="border-bottom border-gray pb-2 mb-0">Post Comment</h6>
                        <br>
                        <form name="post-comment" id="post-comment" method="post"
                              action="{{ route('comment.store') }}">
                            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" class="form-control" name="film_id" value="{{ $film->id }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name"
                                       class="col-sm-2 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-10">
                                    <input id="name" type="text" class="form-control" name="name"
                                           value="{{ Auth::user()->name }}" readonly>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="content"
                                       class="col-sm-2 col-form-label text-md-right">{{ __('Comment') }}</label>

                                <div class="col-md-10">
                                            <textarea id="content" minlength="10"
                                                      class="form-control{{ $errors->has('content') ? ' is-invalid' : '' }}"
                                                      name="content" rows="5" cols="50"
                                                      required>{{ old('content') }}</textarea>

                                    @if ($errors->has('content'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('content') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-8 offset-md-4 text-right">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                @else
                    <h6 class="border-bottom border-gray pb-2 mb-0">
                        Please <a href="{{ route('login') }}">Sign in</a> or <a href="{{ route('register') }}">Sign up</a> to comment on this film.
                    </h6>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('footer')
    @parent
@endsection