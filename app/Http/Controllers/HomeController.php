<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
 use RealRashid\SweetAlert\Facades\Alert;  
class HomeController extends Controller
{
   public function home()
   {
      $posts = Post::where('post_status','=', 'active')->get(); // Fetching the latest 5 posts
      return view('home.homepage', compact('posts'));

   }
   public function show_post($id)
   {
       // Fetch the post by ID
    $post = Post::findOrFail($id);  // Returns the post or 404 if not found

    // Return the view and pass the post data to it
    return view('home.show_post', compact('post'));
   }

    public function create_post()
    {
       // Return the view for creating a new post
       return view('home.create_post');
    }


    public function user_post(Request $request)
{
     
    $user = Auth::user();
   $user_id = $user->id;
   $name = $user->name;
   $usertype = $user->usertype;

    // Validate the form data
    $request->validate([
        'title' => 'required|max:255',
        'content' => 'required',
        'category' => 'nullable|string|max:100',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

     
    // Create a new post instance
    $post = new Post;
    $post->title = $request->title;
    $post->content = $request->content;
    $post->category = $request->category ?? 'Uncategorized';
    $post->user_id = $user_id; 
    $post->name = $name; 
    $post->usertype = $usertype; 
    $post->post_status = 'pending'; 

    // Handle the image file if uploaded
    if ($request->hasFile('image')) {
        $post->image = $request->file('image')->store('posts', 'public');
    }
    
    // Save the post to the database
    $post->save();

    Alert::success('Congrats','Post created successfully');
    return redirect()->back();
}

    public function my_post()
    {
       // Get the authenticated user
    $user = Auth::user();

   //  // Fetch the posts that belong to the logged-in user
    $posts = Post::where('user_id', $user->id)->get();  

      return view('home.my_post', compact('posts'));
    }
    public function delete($id)
    {
      $post = Post::findOrFail($id);
      $post->delete();
     Alert::success('Success', 'Post deleted successfully');
      return redirect()->back();
    }
    public function edit_post($id)
    {
      $post = Post::find($id);
      return View('home.edit', compact('post'));
    }
    public function update_post(Request $request, $id)
    {
       $request->validate([
          'title' => 'required',
          'content' => 'required',
          'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
       ]);

       $post = Post::find($id);
       $post->title = $request->input('title');
       $post->content = $request->input('content');

       if ($request->hasFile('image')) {
          // Handle the image upload if a new one is provided
          $imagePath = $request->file('image')->store('posts', 'public');
          $post->image = $imagePath;
       }

       $post->save(); // Save the updated post details
           Alert::success('Post updated successfully');
        return redirect()->route('my_post');

    }
    public function about_us()
    {
       return view('home.about_us');
    }
    public function blogs()
    {
      $posts=Post::where('post_status','=', 'active')->get();
      return view('home.blog',compact('posts'));
    }

}
