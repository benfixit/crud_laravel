<?php

namespace App\Http\Controllers\Film;

use App\Country;
use App\Film;
use App\Genre;
use App\Http\Requests\FilmStoreRequest;
use App\Http\Resources\FilmCollection;
use App\Repositories\FilmRepository;
use App\Http\Controllers\Controller;

class FilmController extends Controller
{
    protected $repository;

    public function __construct(FilmRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $films = new FilmCollection(Film::paginate(1));

        return view('film.index', [
            'films' => $films,
        ]);
    }

    public function show(Film $film)
    {
        return view('film.show', [
            'film' => $film,
        ]);
    }

    public function create()
    {
        $countries = Country::all();
        $genres = Genre::all();

        return view('film.create', [
            'countries' => $countries,
            'genres' => $genres,
        ]);
    }

    public function store(FilmStoreRequest $request)
    {
        $data = $request->validated();

        $data['photo'] = $request->file('photo')->getClientOriginalName();

        if($id = $this->repository->save($data) && $request->photo->store('films')){
            return redirect()->route('film.show', $id)->with([
                'message' => 'Film was successfully addes'
            ]);
        }

        return redirect()->back()->withErrors('Film could not be added');
    }
}
