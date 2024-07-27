<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Genre;
use App\Models\Movie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    public function index(){
        $movies = Movie::OrderByDesc('id')->paginate(10);
        $moviesForFind = Movie::all();
        return view('admin.movies.index', compact('movies', 'moviesForFind'));
    }

    public function create(){
        $genres = Genre::all();
        return view('admin.movies.create', compact('genres'));
    }

    public function store(Request $request) {
        $data = $request->except('poster');
        $data['poster'] = '';
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }

        Movie::query()->create($data);
        return redirect()->route('movie.index')->with('message', 'Đã thêm thành công phim mới!');
    }

    public function destroy(Movie $movie){
        $movie->delete();
        return redirect()->route('movie.index')->with('message', 'Đã xóa thành công!');
    }

    public function edit(Movie $movie){
        $genres = Genre::all();
        return view('admin.movies.edit', compact('movie', 'genres'));
    }

    public function detail(Movie $movie)
    {
        $genres = Genre::all();
        return view('admin.movies.detail', compact('movie', 'genres'));
    }

    public function update(Request $request, Movie $movie){
        $data = $request->except('poster');
        $poster_old = $movie->poster;
        $data['poster'] = $movie->poster;
        if ($request->hasFile('poster')) {
            $path_poster = $request->file('poster')->store('posters');
            $data['poster'] = $path_poster;
        }
        $movie->update($data);
        if(file_exists('storage/'. $poster_old)){
            unlink('storage/'. $poster_old);
        }
        return redirect()->back()->with('message', 'Đã cập nhật thành công');

    }

    public function search(Request $request){
        $search = $request->input('search');
        // dd($search);
        $moviesForFind = Movie::all();

        // // dd($search);
        $search = trim($search);
        $movies = Movie::OrderByDesc('id')->where('title', 'LIKE', "%$search%")
            ->paginate(10);
        $count = Movie::where('title', 'LIKE', "%$search%")
            ->count();
        return view('admin.movies.index',compact('movies'), compact('count', 'search', 'moviesForFind'));
    }

}
