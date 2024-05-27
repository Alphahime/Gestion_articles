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
    public function ajouter_article_traitement(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
           'nom' => 'required',
           'description' => 'required',
           'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
       ]);
    
        $article = new Article();
    
        $article->nom = $request->nom;
        $article->description = $request->description;
        $article->date_creation = now(); 
        $article->status = '0'; 
        $article->image = $request->file('image')->store('public/images'); 

        $article->save();
    
        return redirect('/ajouter')->with('status', 'Article ajouté avec succès.');
    }
    
   public function ajouter_article()
{
    return view('articles.ajouter');
}

public function modifier_article(Request $request, $id)
    {
       
        $article = Article::findOrFail($id);

        
        return view('articles.update', compact('article'));
    }

    public function modifier_article_traitement(Request $request, $id)
    {
        
        $request->validate([
            'nom' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        try {
       
            $article = Article::findOrFail($id);

            $article->nom = $request->nom;
            $article->description = $request->description;
            
        
            if ($request->hasFile('image')) {
                $article->image = $request->file('image')->store('images');
            }

           
            $article->save();

            return redirect('/articles')->with('success', 'Article modifié avec succès.');
        } catch (\Exception $e) {
           
            return redirect()->back()->with('error', 'Une erreur est survenue lors de la modification de l\'article.');
        }
    }
}