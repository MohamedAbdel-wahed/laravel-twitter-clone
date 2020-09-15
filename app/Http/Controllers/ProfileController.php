<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Intervention\Image\Facades\Image;
use App\Profile;



class ProfileController extends Controller
{
    public function show(User $user)
    {
        $tweets=$user->tweets()->latest()->get();
        $follow_status=auth()->user()->isFollowing($user);
        return view('profile.show', compact('tweets','user','follow_status'));
    }


    public function edit(User $user)
    {
        abort_unless( $user->is(auth()->user()), 403 );

       return view('profile.edit', compact('user'));
    }


    public function update(User $user)
    {
        if(request('photo')){
            if($user->photo){
                // delete the old photo if the user has updated the photo
                $public_path=public_path('storage/'.$user->photo);
                unlink($public_path);
            }

            $imgPath=request('photo')->store('profile','public');
            $newImage=['photo'=>$imgPath];
            $image=Image::make(public_path('storage/'.$imgPath))->fit(300,300);
            $image->save();
        }

        $user->update(array_merge(
            $this->validatedData(),
            $newImage ?? []
        ));

        return redirect(route('profile',$user->id));
    }


    public function follow(User $user)
    {
        if($user->is(auth()->user())){
            return redirect('/profile'.$user->id);
        }

        auth()->user()->toggleFollow($user);

        return back();
    }


    private function validatedData()
    {
        return request()->validate([
                'fName' => ['required', 'string','min:1', 'max:30'],
                'lName' => ['required', 'string','min:1', 'max:30'],
                'description'=>['nullable','sometimes','string','max:120'],
                'photo'=>['nullable','sometimes','file','image','mimes:jpg,jpeg','max:800'],
             ]);
    }


    public function explore(User $user)
    {
        $users=User::all();
        $tweets=$user->tweets;

        return view('explore',compact('users','tweets'));
    }
   

}
