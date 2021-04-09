<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'قائمة المقالات';
        $posts = Post::all();

        return view('dashboard.posts.index', compact('title', 'posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'اضافة مقال';
        $categories = Category::all();
        return view('dashboard.posts.create', compact('title', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'title' => 'required|string|min:5|max:150|unique:posts,title',
            'slug' => 'required|string|min:5|max:15|unique:posts,slug',
            'summary' => 'required|string|min:10|max:255',
            'meta_title' => 'required|string|min:10|max:128',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,gif,jpeg',
            "published" => 'nullable|numeric',
            'categories' => 'nullable',
        ];

        $niceNames = [
            'title' => 'العنوان',
            'slug' => 'معرف المقال',
            'summary' => 'الملخص',
            'meta_title' => 'وصف محرك البحث',
            'content' => 'الوصف',
            'image' => 'صورة المقال',
            'published' => 'الحالة',
            'categories' => 'الصنف',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        $data['user'] = auth()->user()->name;

        $new = new Post();
        $new->fill(Arr::except($data, ["ckeditor", 'categories']))->save();

        $new->categories()->sync($request->categories);

        if ($request->hasFile('image')) {
            // get the extension of image
            $ext = $request->File('image')->getClientOriginalExtension();

            $image = 'storage/website/posts/' . $new->id . '/' . time() . '.' . $ext;

            // create new folder with the name of video id

            mkdir(public_path('storage/website/posts/' . $new->id));

            Image::make($request->image)->resize(480,330)->save(public_path($image));

            $new->fill(['image' => $image])->save();
        }

        $request->session()->flash('msgSuccess', 'تم اضافة المقال بنجاح');
        return redirect(adminUrl('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $title = 'تعديل مقال';
     
        $categories = Category::all();
        return view('dashboard.posts.edit', compact('title', 'post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {

        $rules = [
            'title' => 'required|string|min:5|max:150|unique:posts,title,' . $post->id,
            'slug' => 'required|string|min:5|max:15|unique:posts,slug,' . $post->id,
            'summary' => 'required|string|min:10|max:255',
            'meta_title' => 'required|string|min:10|max:128',
            'content' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,gif,jpeg',
            "published" => 'required',
            'categories' => 'nullable',
        ];

        $niceNames = [
            'title' => 'العنوان',
            'slug' => 'معرف المقال',
            'summary' => 'الملخص',
            'meta_title' => 'وصف محرك البحث',
            'content' => 'المقال',
            'image' => 'صورة المقال',
            'published' => 'الحالة',
            'categories' => 'الصنف',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        $data['user'] = auth()->user()->name;

        if ($request->hasFile('image')) {

            $oldImage = public_path($post->image);

            if (file_exists($oldImage) and $post->image != 'website/posts/default.png') { // remove old image
                @unlink($oldImage);
            }

            // get the extension of image
            $ext = $request->File('image')->getClientOriginalExtension();

            $data['image'] = 'storage/website/posts/' . $post->id . '/' . time() . '.' . $ext;

            if (!is_dir(public_path('storage/website/posts/' . $post->id))) {
                // create new folder with the name of video id
                mkdir(public_path('storage/website/posts/' . $post->id));
            }

            \Image::make($request->image)->resize(480,330)->save(public_path($data['image']));

        }

        $post->categories()->sync($request->categories);

        $post->fill(Arr::except($data, ["ckeditor", 'categories']))->save();

        $request->session()->flash('msgSuccess', 'تم تعديل المقال بنجاح');
        return redirect(adminUrl('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        if (Storage::has('website/posts/' . $post->id) and $post->image !="website/default.png") {

            Storage::delete(str_replace('storage','',$post->image));

            if (!is_dir(public_path('storage/website/posts/' . $post->id))) {
                rmdir(public_path('storage/website/posts/' . $post->id)); // delete the folder id of post
            }
        }

        $post->delete();

        request()->session()->flash('msgSuccess', 'تم حذف المقال بنجاح');
        return redirect(adminUrl('posts'));
    }
}
