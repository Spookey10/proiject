<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// permite recunoasterea metodelor din clasa Games
use App\Game;
//use App\Models\Category;

class GamesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // luam toate jocurile si le prezentam in pagina web
         $games = Game::get();

         return view('games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // atunci cand adaugam un joc afisam si o lista de categorii pentru a adauga jocul in una din aceste categorii
       // $categories = Category::get();

       // return view('games.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // validam datele din formular, daca ceva nu e bine face redirect automat in pagina cu formularul, stocand si erorile de validare
        $request->validate(
              [
            'name' => 'required|max:255|unique:games', // name nu poate fi mai mare de 255 caractere (max:255 )
            'price' => 'required|integer|between:10,100', // presupun ca price este un numar intreg ( regula integer ) intre 10 si 100 euro ( regula between:min, max), de exemplu.
            'category' => 'required|exists:categories,id' // regula exists:table,column verifica id-ul categoriei exista in tabelul de categorii
        ]);

        // stocam un baza de date noul joc adaugat ( adica inca un rand in tabelul cu jocuri )
        $game = Game::create($request->only('name', 'price'));

        // attach the category to the game so if we want to get the categories of a game, we simply write $game->cateogries; and we are given a collection with all categories
        $game->categories()->attach($request->only('category'));

        // facem redirect in pagina principala cu jocuri si stocam in sesiune mesajul de succes.
        return redirect('/games')
        ->with('success', 'Game is successfully saved');
}    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $game = Game::first();
        
      //  dd($game);
        //  games foldeer 
        return view('games.show', compact('game'));
       // return 'show me ';
       // dd('eroul ascuns');
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       // dd('erorul care editeaza');
        $game = Game::findOrFail($id);
        // cauta jocul dupa id , daca nu gasesti id ul, da eroare

        return view('games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
       // dd('metoda pentru update');
        $validatedData = $request
        ->validate([
            'name' => 'required|max:255',
            'price' => 'required'
        ]);
        // cauta jocul ce are in interorul sau id -ul respectiva ,daca are
        // actualizeaza cu urmatoarele valori
        // Game::whereId($id)::
        // ->update($validatedData);
        //  ce este o medota statica?

        // aceea metoda care pune ::
// se poate folosi o singura data 
        // metoda dinamica poate avea un numar nelimitate


// daca actualizarea a avut success , fa redirect catre pagina principala 
        return redirect('/games')->with('success', 'Game Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd('metoda pentru distrugere in masa');
        $game = Game::findOrFail($id);
        //sterge jocul
        $game->delete();

        // acelasi rezultat cu 
        $game = Game::findOrFail($id)->delete();

        return redirect('/games')->with('success', 'Game Data is successfully deleted');
    }
}