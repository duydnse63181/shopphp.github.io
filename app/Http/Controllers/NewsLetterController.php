<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsLetter;
use Illuminate\Support\Facades\Mail;
use App\Mail\Success;
use App\Mail\Notification;

class NewsLetterController extends Controller
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
        return view('home','auth/contact');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);
        $newsletter = new NewsLetter();
        $newsletter->email = $request->input('email');
        if ($newsletter->save())
        {
            Mail::send('emails.success', ['email' => $newsletter->email], function ($message)
            {
                $message->from('zedhd98@gmail.com', 'Duy');
                $message->to('zedhd98@yahoo.com');
            });
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
    }
    public function autoMail(Request $request)
    {
        $this->validate($request, [
            'email'=>'required|distinct'
        ]);
        $newsletter = new NewsLetter();
        $newsletter->email = $request->input('email');
         if ($newsletter->save())
        {   
            Mail::to($newsletter->email)->send(new Success($newsletter));
            Mail::to('zedhd98@gmail.com')->send(new Notification($newsletter));
            return redirect()->back()->with('alert','You have successfully applied for our Newsletter');
        }else{
            return redirect()->back()->withErrors($validator);
        }
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
