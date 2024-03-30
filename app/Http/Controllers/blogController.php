<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
use App\Models\Blogs;


use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $posts = Blogs::all();
        $posts = Blogs::paginate(10);
         return view('blog.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input if needed
        $request->validate([
            'title' => 'required|string',
            'content' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
   
        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/images', $imageName);
        } else {
            // Handle case where no image is uploaded
            $imageName = null;
        }
        // Store the new blog post data in the database
        Blogs::create([
            'title' => $request->title,
            'content' => $request->content,
            'image' => $imageName, // Save the image name to the database
            'user_id' => auth()->user()->id,
        ]);
    
        // Redirect to the home page with a success message
        return redirect()->route('blog')->with('success', 'Blog has been created successfully!');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
        $post = Blogs::findOrFail($id);
        return view('blog.edit', compact('post'));
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
        $post = Blogs::findOrFail($id);
        $post->update($request->all());
        return redirect()->route('blog')->with('success', 'Post updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Blogs::findOrFail($id);
        $post->delete();
    
        return redirect()->route('blog')->with('success', 'Post deleted successfully!');
    }
}
