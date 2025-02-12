<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\GameGenre;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule as ValidationRule;

class GameController extends Controller
{
    public function showHomePage(){
        if (Auth::user()) {
            $dob = Auth::user()->dob;
            $age = Carbon::parse($dob)->age;
            $games = Game::where('gamepegirating', '<=', "$age")->paginate(8);
        } else {
            $games = Game::paginate(10);
        }
        return view('home')->with('games', $games);
    }

    public function showGameDetail(Request $request){
        $game = Game::find($request->route('id'));
        return view('gamedetail')->with('game', $game);
    }

    public function searchGame(Request $request){
        $query = $request->search;
        $games = Game::where('gametitle', 'like', "%$query%")->paginate(10)->appends(['search' => $query]);
        return view('home')->with('games', $games);
    }

    public function showManageGamePage(){
        $games = Game::all();
        return view('managegame')->with('games', $games);
    }

    public function showManageGameGenrePage(){
        $genres = GameGenre::all();
        return view('managegamegenre')->with('genres', $genres);
    }

    public function deleteGame(Request $request){
        $user = Game::where('id', $request->route('id'))->firstorfail()->delete();
        return redirect('/manageGame');
    }

    public function showUpdateGamePage(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $game = Game::find($request->route('id'));
            $genres = GameGenre::all();
            return view('updategame')->with('game', $game)->with('genres', $genres);
        } else {
            return redirect('/');
        }
    }

    public function updateGame(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $this->validate($request, [
                'title' => 'required',
                "photo" => "image",
                "desc" => "required",
                "price" => "required|integer|numeric|gte:0",
                "genre" => "required",
                'new_genre' => 'unique:game_genres,genre',
                "rating" => ["required", ValidationRule::in([0, 3, 7, 12, 16, 18])]
            ]);

            $game = Game::find($request->route('id'));
            $game->gametitle = $request->title;
            if ($_FILES['photo']['size'] != 0) {
                $name = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public/Game Image', $name);
                $game->gameimage = $name;
            }
            $game->gamedescription = $request->desc;
            $game->gameprice = $request->price;
            $genre = $request->genre;
            if ($genre != 0) {
                // update genre
                $game->gamegenre_id = $genre;
            } else {
                // add new genre
                $newGenre = GameGenre::create([
                    'genre' => $request->new_genre,
                    'created_at' => now()
                ]);
                $game->gamegenre_id = $newGenre->id;
            }
            $game->gamepegirating = $request->rating;
            $game->save();

            return redirect('/manageGame');
        } else {
            return redirect('/');
        }
    }

    public function showAddGamePage(){
        if (Auth::user()->role->name == 'Admin') {
            $genres = GameGenre::all();
            return view('addgame')->with('genres', $genres);
        } else {
            return redirect('/');
        }
    }

    public function addGame(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $this->validate($request, [
                'title' => 'required',
                "photo" => "image",
                "desc" => "required",
                "price" => "required|integer|numeric|gte:0",
                "genre" => "required",
                'new_genre' => 'unique:game_genres,genre',
                "rating" => ["required", ValidationRule::in([0, 3, 7, 12, 16, 18])]
            ]);

            if ($_FILES['photo']['size'] != 0) {
                $name = $request->file('photo')->getClientOriginalName();
                $request->file('photo')->storeAs('public/Game Image', $name);
            }

            $genre = $request->genre;
            $genreInsert = 0;
            if ($genre != 0) {
                $genreInsert = $genre;
            } else {
                $newGenre = GameGenre::create([
                    'genre' => $request->new_genre,
                    'created_at' => now()
                ]);
                $genreInsert = $newGenre->id;
            }

            Game::create([
                'gametitle' => $request->title,
                'gameimage' => $request->file('photo')->getClientOriginalName(),
                'gameprice' => $request->price,
                'gamedescription' => $request->desc,
                'gamepegirating' => $request->rating,
                'gamegenre_id' => $genreInsert,
                'Created_at' => now()
            ]);

            return redirect('/manageGame');
        } else {
            return redirect('/');
        }
    }

    public function showUpdateGameGenrePage(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $genre = GameGenre::find($request->route('id'));
            return view('updategamegenre')->with('genre', $genre);
        } else {
            return redirect('/');
        }
    }

    public function updateGameGenre(Request $request){
        if (Auth::user()->role->name == 'Admin') {
            $this->validate($request, [
                'title' => 'unique:game_genres,genre'
            ]);

            $genre = GameGenre::find($request->route('id'));
            $genre->genre = $request->title;
            $genre->save();

            return redirect('/manageGameGenre');
        } else {
            return redirect('/');
        }
    }
}

