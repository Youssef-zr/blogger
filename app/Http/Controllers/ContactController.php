<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'قائمة الرسائل';
        $messages = Contact::all();
        return view('dashboard/messages/index', compact('title', 'messages'));
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

        $rules = [
            "name" => 'required|string|max:40',
            'email' => 'required|email',
            'subject' => 'required|string|max:100|min:10',
            'msg' => 'required|string|max:300|min:10',
        ];

        $niceNames = [
            'name' => "حقل الاسم",
            'email' => "حقل البريد الالكتروني",
            'subject' => "حقل الموضوع",
            'msg' => "حقل الرسالة",
        ];

        $data = $this->validate($request, $rules, [], $niceNames);

        $new = new Contact();

        $new->fill($data)->save();

        update_messages();

        $request->session()->flash('msgSuccess', 'تم ارسال الرسالة بنجاح');
        return redirect(url('/'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function show(Contact $contact)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact $contact)
    {
        $contact->fill(['status' => 1])->save();
        update_messages();

        $title = 'الرسالة';
        return view('dashboard/messages/edit', compact('title', 'contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact $contact)
    {
        $rules = [
            "name" => 'required|string|max:40',
            'email' => 'required|email',
            'subject' => 'required|string|max:100',
            'msg' => 'required|string|max:300',
            'status' => 'required',
        ];

        $niceNames = [
            'name' => "حقل الاسم",
            'email' => "حقل البريد الالكتروني",
            'subject' => "حقل الموضوع",
            'msg' => "حقل الرسالة",
            'status' => 'حالة الرسالة',
        ];

        $data = $this->Validate($request, $rules, [], $niceNames);

        $contact->fill($data)->save();

        update_messages();

        $request->session()->flash('msgSuccess', 'تم تعديل الرسالة بنجاح');
        return redirect(adminUrl('contact'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact $contact)
    {
        $contact->delete();
        update_messages();

        request()->session()->flash('msgSuccess', 'تم حذف العنصر بنجاح');
        return redirect(adminUrl('/contact'));
    }
}
