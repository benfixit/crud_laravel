@extends('layouts.master')

@section('navigation')
    @parent
@endsection

@section('main-content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Add A New Film') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('film.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-sm-4 col-form-label text-md-right">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}"
                                           name="name" value="{{ old('name') }}" required autofocus>

                                    @if ($errors->has('name'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="description"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Description') }}</label>

                                <div class="col-md-6">
                                    <textarea id="description"
                                              class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                              name="description" rows="5" cols="30"
                                              required>{{ old('description') }}</textarea>

                                    @if ($errors->has('description'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="release_date"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Release Date') }}</label>

                                <div class="col-md-6">
                                    <input id="release_date" type="date"
                                           class="form-control{{ $errors->has('release_date') ? ' is-invalid' : '' }}"
                                           name="release_date" value="{{ old('release_date') }}" required>

                                    @if ($errors->has('release_date'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('release_date') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="rating"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Rating') }} (1 - 5)</label>

                                <div class="col-md-6">
                                    <input id="rating" type="number" min="1" max="5"
                                           class="form-control{{ $errors->has('rating') ? ' is-invalid' : '' }}"
                                           name="rating" value="{{ old('rating') }}" required>

                                    @if ($errors->has('rating'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('rating') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="ticket_price"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Ticket Price') }}</label>

                                <div class="col-md-6">
                                    <input id="ticket_price" type="text"
                                           class="form-control{{ $errors->has('ticket_price') ? ' is-invalid' : '' }}"
                                           name="ticket_price" value="{{ old('ticket_price') }}" required>

                                    @if ($errors->has('ticket_price'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('ticket_price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="country"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Country') }}</label>

                                <div class="col-md-6">
                                    <select id="country" name="country_id"
                                            class="form-control{{ $errors->has('country_id') ? ' is-invalid' : '' }}"
                                            required>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                    @if ($errors->has('country_id'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('country_id') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="genre"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Genre') }}</label>
                                <div class="col-sm-6">
                                    <div class="row">
                                        @foreach($genres as $genre)
                                            <div class="col-md-4">
                                                <label for="genre{{ $genre->id }}"
                                                       class="control-label text-md-right">{{ $genre->name }}</label>
                                                <input id="genre{{ $genre->id }}" type="checkbox" name="genre[]" value="{{ $genre->id }}">

                                                @if ($errors->has('genre'))
                                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('genre') }}</strong>
                                        </span>
                                                @endif
                                            </div>
                                        @endforeach
                                    </div>

                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="photo"
                                       class="col-sm-4 col-form-label text-md-right">{{ __('Photo') }}</label>

                                <div class="col-md-6">
                                    <input id="photo" type="file"
                                           class="form-control{{ $errors->has('photo') ? ' is-invalid' : '' }}"
                                           name="photo" value="{{ old('photo') }}" accept="image/*" required>

                                    @if ($errors->has('photo'))
                                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('photo') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>


                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-right">
                                    <button type="submit" class="btn btn-primary btn-sm">
                                        {{ __('Submit') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('more-content')
    @parent
@endsection

@section('footer')
    @parent
@endsection
