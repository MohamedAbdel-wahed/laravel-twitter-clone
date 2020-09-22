<?php

namespace App\Http\Controllers;

use App\User;
use App\Notifications\FollowNotification;



class ProfileController extends Controller
{
    public function show(User $user)
    {
        $tweets=$user->tweets()->latest()->get();
        $follow_status=auth()->user()->isFollowing($user);
        $newNotifications=auth()->user()->unreadNotifications;

        return view('profile.show', compact('tweets','user','follow_status','newNotifications'));
    }


    public function edit(User $user)
    {
        abort_unless( $user->is(auth()->user()), 403 );
        $newNotifications=auth()->user()->unreadNotifications;

       return view('profile.edit', compact('user','newNotifications'));
    }


    public function update(User $user)
    {
        $data=$this->validatedData();

        $newPersonalImg=$this->manageImage($user->photo,request('photo'),'photo','personal');
        $newProfileImg=$this->manageImage($user->profileImg,request('profileImg'),'profileImg','profile');

        $user->update(array_merge(
            $data,
            $newPersonalImg ?? [],
            $newProfileImg ?? []
        ));

        return redirect(route('profile',$user->id));
    }


    public function follow(User $user)
    {
        if($user->is(auth()->user())){
            return redirect('/profile'.$user->id);
        }

        auth()->user()->toggleFollow($user);

        if( auth()->user()->isFollowing($user) ){
            $user->notify(new FollowNotification(auth()->user()));
         }

        return back();
    }


    public function explore(User $user)
    {
        $users=User::all();
        $tweets=$user->tweets;
        $newNotifications=auth()->user()->unreadNotifications;

        return view('explore',compact('users','newNotifications'));
    }
   

    public function notifications(User $user)
    {
        $notifications=auth()->user()->notifications;
        auth()->user()->unreadNotifications->markAsRead();
        $newNotifications=[];

        return view('notifications',compact('notifications','newNotifications'));
    }


    private function validatedData()
    {
        return request()->validate([
                'fName' => ['required', 'string','min:1', 'max:30'],
                'lName' => ['required', 'string','min:1', 'max:30'],
                'description'=>['nullable','sometimes','string','max:120'],
                'photo'=>['nullable','sometimes','image','mimes:jpg,jpeg','max:800'],
                'profileImg'=>['nullable','sometimes','image','mimes:jpg,jpeg','max:800'],
             ]);
    }


    public function manageImage($user_image,$image,$imgName,$path)
    {
        // dd($user_image);
        if($image){
            if($user_image){
                // delete the old image if the user has updated the image
                $dest=public_path('uploads/'.$path.'/'.$user_image);
                unlink($dest);
            }

            
            $tmp_name=$_FILES[$imgName]['tmp_name'];
            $file_type=$_FILES[$imgName]['type'];
            $ext=explode('/',$file_type);
            $imgPath=uniqid($imgName,true).'.'.strtolower(end($ext));
            move_uploaded_file($tmp_name, public_path('uploads/'.$path.'/'.$imgPath));

            $newImage=[$imgName=>$imgPath];
            
          return  $newImage;
        }
    }


}
