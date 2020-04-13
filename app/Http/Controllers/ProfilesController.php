<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ProfilesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(\App\User $user)
    {
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        dd($follows);
        return view('profile')->with('follows',$follows);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(\App\User $user)
    {
        //$user = User::findOrFail($id);
        $follows=(auth()->user()) ? auth()->user()->following->contains($user->id) : false;
        // dd($follows);
        return view('profile.index',compact('user','follows'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(\App\User $user)
    {
        $this->authorize('update',$user->profile);
        return view('profile.edit')->with('user',$user); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, \App\User $user)
    {
        // $this->authorize('update',$user->profile);
        $data = request()->validate([
            'title' => 'required',
            'description' => 'required',
            'url'=>'url',
            'image'=>'',
        ]);
            if(request('image')){
                $imagePath = request('image')->store('profile','public');
                $image = Image::make(public_path("storage/{$imagePath}"))->fit(1000,1000);
                $image->save();
                $imageArray =['image'=>$imagePath];
            }
        // dd(array_merge(
        //     $data,
        //     ['image'=>$imagePath]
        // ));
        $data = array_merge(
            $data,
            $imageArray ?? []
        );
        $user->profile->update($data);

        return redirect("/profile/{$user->id}");
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
