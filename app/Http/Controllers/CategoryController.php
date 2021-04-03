<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'قائمة الأصناف';
        $categories = Category::all();
        return view('dashboard/categories/index', compact('title', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'صنف جديد';
        return view('dashboard/categories/create', ['title' => $title]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rurles = [
            'title' => 'required|string|max:255|unique:categories,title',
            'slug' => 'required|string|unique:categories,slug',
            'meta_tag' => 'nullable|max:128|min:5',
        ];

        $niceNames=[
            "title"=>'الصنف',
            'slug'=>'معرف الصنف',
            'meta_tag'=>'الكلمات الدلالية'
        ];

        $data = $this->Validate($request, $rurles,[],$niceNames);

        $record = new Category();
        $record->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم اضافة الصنف بنجاح');
        return redirect(adminUrl('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        $title = 'تعديل صنف';
        return view('dashboard/categories/edit', ['category' => $category, 'title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $rurles = [
            'title' => 'required|string|max:255|unique:categories,title,'.$category->title,
            'slug' => 'required|string|unique:categories,slug,'.$category->slug,
            'meta_tag' => 'nullable|max:128|min:10',
        ];

        $niceNames=[
            "title"=>'الصنف',
            'slug'=>'معرف الصنف',
            'meta_tag'=>'الكلمات الدلالية'
        ];

        $data = $this->Validate($request, $rurles,[],$niceNames);

        $category->fill($data)->save();

        $request->session()->flash('msgSuccess', 'تم تعديل الصنف بنجاح');
        return redirect(adminUrl('categories'));
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();

        request()->session()->flash('msgSuccess', 'تم حذف الصنف بنجاح');
        return redirect(adminUrl('categories'));
    }
}
