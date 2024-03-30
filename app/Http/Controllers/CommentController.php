<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Comment;
use App\Models\Blogs;



class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input data from the form
        $validator = Validator::make($request->all(), [
            'content' => 'required',
            'blog_id' => 'required'
            // Adjust validation as per your requirements
        ]);

        // Checking if the validator fails
        if ($validator->fails()) {
            return redirect()->route('blog')->with('error', 'Failed to add Comment.');
        }

        // Save the comment to the database
        $comment = new Comment();
        $comment->content = $request->content; // Use $request->content instead of $validatedData['content']
        $comment->blog_id = $request->blog_id; // Adjust based on how you store the blog post ID
        $comment->user_id = auth()->user()->id; // If there's an authentication system, get the current user's ID
        $comment->save();

        // Redirect or go back to the previous page with a success message
        return redirect()->back()->with('success', 'Comment added successfully!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blog = Blogs::findOrFail($id); // Retrieve the blog post
        $comments = Comment::where('blog_id', $id)->get(); // Retrieve comments associated with the blog post
        return view('blog.comments', compact('blog', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
