<?php

namespace App\Http\Controllers;


use App\Models\User;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function post_page()
    {
        return view("admin.post_page");
    }

    public function add_post(Request $request)
    {

        $user = Auth()->user();
        $user_id = $user->id;
        $name = $user->name;
        $usertype = $user->usertype;

        //upload image
        $imagename = null;
        if ($request->hasFile('image')) {
            $image = $request->file("image");
            $imagename = time() . '.' . $request->image->extension();
            $image->move(public_path('images'), $imagename);
        }

        $post = new Posts();
        $post->title = $request->title;
        $post->description = $request->description;
        $post->image = $imagename;
        $post->post_status = 'Active';
        $post->name = $name;
        $post->user_id = $user_id;
        $post->usertype = $usertype;

        $post->save();


        flash()->success('Post Added Successfully.');
        return redirect()->route('showPosts');
    }

    public function showPosts()
    {
        $posts = Posts::all();
        return view('admin.showPosts', ['posts' => $posts]);
    }

    public function editPost($id)
    {
        $post = Posts::findOrFail($id); // Find post by id
        return view('admin.editpost', ['post' => $post]);
    }

    public function updatePost(Request $request, $id)
    {

        // Find the post by its ID
        $post = Posts::findOrFail($id);



        // Update post fields
        $post->title = $request->title;
        $post->description = $request->description;
        $image = $request->image;


        if ($request->hasFile('image')) {
            $image = $request->file("image");
            $imagename = time() . '.' . $request->image->extension();
            $image->move(public_path('images'), $imagename);
            $post->image = $imagename;
        }

        // Save the updated post
        $post->save();


        flash()->success('Post updated successfully');
        return redirect()->route('showPosts', ['post' => $post]);

    }


    public function deletePost($id)
    {
        $post = Posts::findOrFail($id);
        $post->delete();

        flash()->success('Post deleted successfully');
        return redirect()->back();


    }

}
