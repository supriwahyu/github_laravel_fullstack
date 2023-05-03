<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();
        return view('admin.book.index', compact('books'));
    }
    
    public function show($id)
    {
        $books = Book::find($id);
        return view('admin.book.show', compact('books'));
    }

    public function create()
    {
        return view('admin.book.create');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
                                    'name' => 'required',
                                    'detail' => 'required',
                                    'price' => 'required',
                                    'stock' => 'required',
                                    'discount' => 'required',
                    ]);
                    
        if($validator->fails()){
            return back()->with('error', 'Ada Beberapa form yang terlewat');
        }

        $name = $request->name;
        $detail = $request->detail;
        $price = $request->price;
        $stock = $request->stock;
        $discount = $request->discount;
        // $tag = $request->tag;
        // $slug = $this->slugify($title);

        // $article_selected = Article::where('slug', $slug)->first();
        // if($article_selected){
        //     return back()->with('error', 'Sudah ada artikel dengan slug yang sama');
        //     die();
        // }

        // $imageName = $request->image->getClientOriginalName();               
        // $request->image->move(public_path('img/portfolio'), $imageName);
        
        $user = Auth::guard('admin')->user();
            $portfolio_new = new Book;
            $portfolio_new->name = $name;
            $portfolio_new->detail = $detail;
            $portfolio_new->price = $price;
            $portfolio_new->stock = $stock;
            $portfolio_new->discount = $discount;
            // $article_new->tag = $tag;
            // $article_new->slug = $slug;
            // $portfolio_new->writer = $user->name;
            // $portfolio_new->image_url = $imageName;
            $portfolio_new->save();
            return redirect()->route('book')->with('success', 'book berhasil terbuat');

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
    
    public function edit($id)
    {
        $book = book::findOrFail($id);

        return view('admin.book.edit', [
            'book' => $book
        ]);
    }
    public function update(Request $request,Book $book, $id)
    {
        $book = book::find($id)->update($request->all());
        
        $book = book::where('id',$id)->first();
        // unlink('img/article/'.$article['image_url']);
        
        // $image = $request->file('image');
        // $imageName = $image->getClientOriginalName();
        // $image->move(public_path('images/artikel'), $imageName);

        // $data = [
        //     'image' => $request->image,
        // ];

        // if($request->hasFile('image_url')){
        //     $image = $request->file('image_url');
        //     $image_name = $image->getClientOriginalName();
        //     $image->move('img/portfolio',$image_name);
        //     $data = array_merge($data, ['image' => $image_name]); // here you merge the image name on the data
        // } else if ($request->hasFile('image')) {
        //     unlink('img/portfolio/'.$portfolio['image_url']);
        //     $image = $request->image;
        //     $image_name = $image->getClientOriginalName();
        //     $image->move('img/portfolio',$image_name);
        //     $portfolio->image_url = $image_name;
        //     $portfolio->save();
        // }

        // $imageName = $request->image->getClientOriginalName();               
        // $request->image->move(public_path('img/article'), $imageName);
        // unlink('img/article/'.$article['image_url']);
        // $article->image = $image_name;
        // $article->save();

        return redirect()->route('book')->with('success',' Data telah diperbaharui!');
    }

    public function destroy(Request $request, $id)
    {
        $book_selected = Book::find($id);
        $book_selected->delete();
        return redirect('book')->with('success', 'book berhasil terhapus');
    }
}
