<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Http\Requests\StoreArticleRequest;
use Illuminate\Http\Response;
use Illuminate\View\View;


class ArticlesController extends Controller
{

    protected array $articles = [
        [
            'title'=>222,
            'content'=>44
        ],
        [
            'title'=>456,
            'content'=>44
        ]

    ];
    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index(): View
    {
        $article = new Article();
        return view('articles.index', ['articles'=>$article->all()]);
    }
    // public function index()
    // {
    //     return view('articles.index', ['articles'=>$this->articles]);
    // }

    /**
     * Show the form for creating a new resource.
     * 
     * @return View
     */
    public function create()
    {
        return \view('articles.create');
    }

    /**
     * Store a newly created resource in storage.
     * 
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(StoreArticleRequest $request, Article $article): RedirectResponse
    {
//dd($request->all());
        $validated = $request->validated();
        //dd($validated);
        $articleItem = $article->create($validated);

        //$article->title = $validated['title'];
        //$article->content = $validated['content'];
        //$article->save();

        $request->session()->flash('status', 'Article created!');

        return redirect()->route('articles.show', ['article' => $articleItem->id]);
    }

    /**
     * Display the specified resource.
     * 
     * @param int $id
     * @return View
     */
    public function show(string $id): View
    {
        return view('articles.show', ['articles' => Article::findOrFail($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return \view('articles.edit', ['article' => Article::findOrFail($id) ]);
    }

    /**
     * Update the specified resource in storage.
     * 
     * @param StoreArticleRequest $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update(StoreArticleRequest $request, string $id): RedirectResponse
    {
        $article = (new Article())->findOrFail($id);
        $validated = $request->validated();
        $article->fill($validated);
        $article->save();


        $request->session()->flash('status', 'Article was updated!');

        return redirect()->route('articles.show', ['article' => $article->id]);
    }

    /**
     * Remove the specified resource from storage.
     * 
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(string $id): RedirectResponse
    {
        $article = (new Article())->findOrFail($id);
        $article->delete();

        session()->flash('status', 'Article was deleted!');

        return redirect()->route('articles.index');
    }
}
