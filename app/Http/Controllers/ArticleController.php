<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller
{
    public function __construct()
    {
        return $this->middleware('auth')->except('article');
    }

    public function index()
    {
        $article = Article::latest()->paginate(6);
        return view('articles.article', [
            'articles' => $article,
        ]);
    }

    public function add ()
    {
        $category = Category::all();
        return view('articles.add',[
            'categories' => $category
        ]);
    }

    public function create ()
    {
        $validator = Validator(request()->all(),[
            'title' => 'required',
            'body' => 'required',
            'category_id' => 'required'
        ]);

        if($validator->fails())
        {
            return back()->withErrors($validator);
        }

        $article = new Article;
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = Auth::id();
        $article->save();

        return redirect('articles')->with('create', 'A new article create');

    }

    public function detail ($id)
    {
        $article = Article::find($id);
        return view('articles.detail', [
            'article' => $article,
        ]);
    }

    public function edit($id)
    {
        $category = Category::all();
        $article = Article::find($id);

        return view('articles.edit',[
            'article' => $article,
            'categories' => $category,
        ]);

    }

    public function update ($id)
    {
        $article = Article::find($id);
        $article->title = request()->title;
        $article->body = request()->body;
        $article->category_id = request()->category_id;
        $article->user_id = Auth::id();
        $article->save();

        return redirect('articles');
    }

    public function delete ($id)
    {
        $article = Article::find($id);
        if(Gate::allows('delete-article', $article)) {
            $article->delete();
            return redirect('articles')->with('delete', 'Article delete success!');
        }else{
            return back()->with('error', 'Unauthorize');
        }
    }
}
