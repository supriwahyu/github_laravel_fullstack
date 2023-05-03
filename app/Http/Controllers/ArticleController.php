<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::all();
        return view('admin.article.index', compact('articles'));
    }
    
    public function show($id)
    {
        $articles = Article::find($id);
        return view('admin.article.show', compact('articles'));
    }

    public function create()
    {
        return view('admin.article.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
                                    'title' => 'required',
                                    'header' => 'required',
                                    'body' => 'required',
                                    'footer' => 'required',
                                    'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                    ]);
                    
        if($validator->fails()){
            return back()->with('error', 'Ada Beberapa form yang terlewat');
        }

        $title = $request->title;
        $header = $request->header;
        $body = $request->body;
        $footer = $request->footer;
        // $tag = $request->tag;
        // $slug = $this->slugify($title);

        // $article_selected = Article::where('slug', $slug)->first();
        // if($article_selected){
        //     return back()->with('error', 'Sudah ada artikel dengan slug yang sama');
        //     die();
        // }

        $imageName = $request->image->getClientOriginalName();               
        $request->image->move(public_path('img/article'), $imageName);
        
        if ($user = Auth::guard('admin')->user()) {
            $article_new = new Article;
            $article_new->title = $title;
            $article_new->header = $header;
            $article_new->body = $body;
            $article_new->footer = $footer;
            // $article_new->tag = $tag;
            // $article_new->slug = $slug;
            $article_new->writer = $user->name;
            $article_new->image_url = $imageName;
            $article_new->save();
            return redirect()->route('article')->with('success', 'Artikel berhasil terbuat');

        } else if($user = Auth::guard('user')->user()) {
            $article_new = new Article;
            $article_new->title = $title;
            $article_new->header = $header;
            $article_new->body = $body;
            $article_new->footer = $footer;
            // $article_new->tag = $tag;
            // $article_new->slug = $slug;
            $article_new->writer = $user->name;
            $article_new->image_url = $imageName;
            $article_new->save();
            return redirect()->route('article')->with('success', 'Artikel berhasil terbuat');
        }
        

        // $user = Auth::guard('admin')->user();

        // $article_new = new Article;
        // $article_new->title = $title;
        // $article_new->header = $header;
        // $article_new->body = $body;
        // $article_new->footer = $footer;
        // // $article_new->tag = $tag;
        // // $article_new->slug = $slug;
        // $article_new->writer = $user->name;
        // $article_new->image_url = $imageName;
        // $article_new->save();
        // return redirect()->route('article')->with('success', 'Artikel berhasil terbuat');
    }
    public function edit($id)
    {
        $article = Article::findOrFail($id);

        return view('admin.article.edit', [
            'article' => $article
        ]);
    }
    public function update(Request $request,Article $article, $id)
    {
        $article = Article::find($id)->update($request->all());
        
        $article = Article::where('id',$id)->first();
        // unlink('img/article/'.$article['image_url']);
        
        // $image = $request->file('image');
        // $imageName = $image->getClientOriginalName();
        // $image->move(public_path('images/artikel'), $imageName);

        $data = [
            'image' => $request->image,
        ];

        if($request->hasFile('image_url')){
            $image = $request->file('image_url');
            $image_name = $image->getClientOriginalName();
            $image->move('img/article',$image_name);
            $data = array_merge($data, ['image' => $image_name]); // here you merge the image name on the data
        } else if ($request->hasFile('image')) {
            unlink('img/article/'.$article['image_url']);
            $image = $request->image;
            $image_name = $image->getClientOriginalName();
            $image->move('img/article',$image_name);
            $article->image_url = $image_name;
            $article->save();
        }

        // $imageName = $request->image->getClientOriginalName();               
        // $request->image->move(public_path('img/article'), $imageName);
        // unlink('img/article/'.$article['image_url']);
        // $article->image = $image_name;
        // $article->save();

        return redirect()->route('article')->with('success',' Data telah diperbaharui!');
    }

    public function destroy(Request $request, $id)
    {
        $article_selected = Article::find($id);
        $article_selected->delete();
        return redirect('article')->with('success', 'Artikel berhasil terhapus');
    }
}
