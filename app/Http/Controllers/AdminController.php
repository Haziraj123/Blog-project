<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post;  // Add this if you are using the Post model
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
   public function index()
   {
     if(Auth::id())
     {
      $posts=Post::where('post_status','=', 'active')->get();
        $usertype = Auth()->user()->usertype;
        if($usertype == 'user')
        {
            return view('home.homepage',compact('posts'));
        }
        else if($usertype == 'admin')
        {
            return view('admin.index');
        }
        else
        {
            return redirect()->back();
        }
     }
   }

   public function post_page()
   {
      return view('admin.post_page');  // Render the post page form
   }

   public function storePost(Request $request)
   {
      $user=Auth::user();
      
      // Validate incoming request data
      $request->validate([
         'title' => 'required|string|max:255',
         'content' => 'required|string',
         'category' => 'required|string',
         'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
      ]);

      // Handle the image file if uploaded
      $imagePath = null;
      if ($request->hasFile('image')) {
         $imagePath = $request->file('image')->store('posts', 'public');
      }
        

      // Save the post data
      Post::create([
         'title' => $request->title,
         'content' => $request->content,
         'category' => $request->category,
         'image' => $imagePath,
         'user_id' => $user->id, // Set the user ID
         'name' => $user->name,   // Set the user's name
         'usertype' => $user->usertype, // Set the user type
         'post_status' => 'active', // Set post_status based on user type
      ]);

      Alert::success('success', 'Post created successfully!');
      return redirect()->back();
   }


   public function view_post()
   {
      $posts = Post::all(); // Fetch all posts
      return view('admin.view_post', compact('posts'));
   }
   public function show($id)
{
    // Fetch the post by ID
    $post = Post::findOrFail($id);  // Returns the post or 404 if not found

    // Return the view and pass the post data to it
    return view('admin.show', compact('post'));
}
         public function destroy($id)
         {
            $post = Post::findOrFail($id);
            $post->delete();

            return redirect()->back()->with('success', 'Post deleted successfully');
         }

         public function edit($id)
         {
            $post = Post::find($id); // Find the post by its ID
            return view('admin.edit', compact('post')); // Pass the post data to the edit view
         }

            public function update(Request $request, $id)
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
                return redirect()->route('admin.view_post');

            }
             
            public function accept_post($id)
            {
                $data = Post::find($id);
                $data->post_status = 'active';
                $data->save();
               Alert::success('Posts made active successfully');
               return redirect()->back();
            
            }
            public function reject_post($id)
            {
                $data = Post::find($id);
                $data->post_status = 'rejected';
                $data->save();
               Alert::success('Posts made rejected!');
               return redirect()->back();
            
            }

}
