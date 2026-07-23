<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::latest()->get();

        return view('Admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('Admin.news.create');
    }

    public function store(Request $request)
    {
        $imageName = null;

        if ($request->hasFile('image')) {

            $imageName = time().'.'.$request->image->extension();

            $request->image->move(
                public_path('News'),
                $imageName
            );
        }

        News::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'image' => $imageName,
        ]);

        return redirect()
            ->route('latest-news.index');
    }

public function edit($id)
{
    $news = News::findOrFail($id);

    return view(
        'Admin.news.edit',
        compact('news')
    );
}

public function update(Request $request, $id)
{
    $news = News::findOrFail($id);

    $imageName = $news->image;

    if ($request->hasFile('image')) {

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(
            public_path('News'),
            $imageName
        );
    }

    $news->update([
        'title' => $request->title,
        'category' => $request->category,
        'description' => $request->description,
        'image' => $imageName,
    ]);

    return redirect()
        ->route('latest-news.index');
}

public function destroy($id)
{
    $news = News::findOrFail($id);

    $news->delete();

    return redirect()
        ->route('latest-news.index');
}
}
