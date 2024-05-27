<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Article;

class ArticleController extends Controller
{
    //
    public function liste_article(){

    $articles = Article::all();
     
    return view('articles.liste', compact('articles'));
    }
    public function ajouter_article_traitement(Request $request){
     
        $request->validate([
           
            'nom' => 'required',
            'description' => 'required',
            'date_creation' => 'required',
            'status' => 'required',
            'image' => 'required',
           
        ]);

        $articles = new Article();

        $articles->nom = $request->nom;
        $articles->description = $request->description;
        $articles->date_creation = $request->sdate_creation;
        $articles->status = $request->status;
        $articles->image = $request->image;
        $articles->save();

        return redirect('/ajouter/traitement')->with('status', 'Ajouter ajouté avec succes');
}
public function ajouter_article()
{
    return view('articles.ajouter');
}

}
