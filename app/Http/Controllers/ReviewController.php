<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Review;
use Validator;
use Illuminate\Support\Facades\Auth;
use App\Models\Book;

class ReviewController extends Controller
{
    public function index()
    {
        
        return view('admin.book.createReview');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(),[
                                    'customer' => 'required',
                                    'review' => 'required',
                                    'star' => 'required',
                    ]);
                    
        if($validator->fails()){
            return back()->with('error', 'Ada Beberapa form yang terlewat');
        }

        $customer = $request->customer;
        $review = $request->review;
        $star = $request->star;
        $book_id = Book::find(1)->id;
        
        $user = Auth::guard('admin')->user();
            $review_new = new Review;
            $review_new->book_id = $book_id;
            $review_new->customer = $customer;
            $review_new->review = $review;
            $review_new->star = $star;

            // $article_new->tag = $tag;
            // $article_new->slug = $slug;
            // $portfolio_new->writer = $user->name;
            // $portfolio_new->image_url = $imageName;
            $review_new->save();
            return redirect()->route('book')->with('success', 'book berhasil terbuat');

        }
        
}
