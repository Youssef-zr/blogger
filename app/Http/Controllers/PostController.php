<?php

namespace App\Http\Controllers;

use App\Post;
use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Arr;

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
        return view('dashboard.posts.create', compact('title','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        $rules = [
            'title' => 'required|string|min:5|max:15|unique:posts,title',
            'slug' => 'required|string|min:5|max:15|unique:posts,slug',
            'summary' => 'required|string|min:10|max:255',
            'meta_title' => 'required|string|min:10|max:128',
            'ckeditor' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,gif,jpeg',
            "published" => 'nullable|numeric',
            'categories'=>'nullable'
        ];

        $niceNames = [
            'title' => 'العنوان',
            'slug' => 'معرف المقال',
            'summary' => 'الملخص',
            'meta_title' => 'وصف محرك البحث',
            'ckeditor' => 'الوصف',
            'image' => 'صورة المقال',
            'published' => 'الحالة',
            'categories' => 'الصنف',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        $data['content'] = $request->ckeditor;
        $data['user'] = auth()->user()->name;

        $new = new Post();
        $new->fill(Arr::except($data,["ckeditor",'categories']))->save();

        $new->categories()->sync($request->categories);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('website/posts/'.$new->id);
            $new->fill(['image'=>$data['image']])->save();
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
        return view('dashboard.posts.edit', compact('title', 'post','categories'));
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
        // dd($request->all());
        $rules = [
            'title' => 'required|string|min:5|max:15|unique:posts,slug,'.$post->title,
            'slug' => 'required|string|min:5|max:15|unique:posts,slug,'.$post->slug,
            'summary' => 'required|string|min:10|max:255',
            'meta_title' => 'required|string|min:10|max:128',
            'ckeditor' => 'required',
            'image' => 'nullable|image|mimes:png,jpg,gif,jpeg',
            "published" => 'required',
            'categories'=>'nullable'
        ];

        $niceNames = [
            'title' => 'العنوان',
            'slug' => 'معرف المقال',
            'summary' => 'الملخص',
            'meta_title' => 'وصف محرك البحث',
            'ckeditor' => 'المقال',
            'image' => 'صورة المقال',
            'published' => 'الحالة',
            'categories' => 'الصنف',
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        $data['content'] = $request->ckeditor;
        // $data['user'] = auth()->user()->name;

        if ($request->hasFile('image')) {
            if (Storage::has($post->image) and $post->image != 'website/posts/default.png') {
                Storage::delete($post->image);
            }

            $data['image'] = $request->file('image')->store('website/posts/'.$post->id);
        }

        $post->categories()->sync($request->categories);

        $post->fill(Arr::except($data,["ckeditor",'categories']))->save();

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
        if (Storage::has('website/posts/'.$post->id)) {

            Storage::delete($post->image);

            rmdir(public_path('storage/website/posts/' . $post->id)); // delete the folder id of post
        }

        $post->delete();

        request()->session()->flash('msgSuccess', 'تم حذف المقال بنجاح');
        return redirect(adminUrl('posts'));
    }
}
