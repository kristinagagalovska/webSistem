<?php

namespace App\Http\Controllers;


use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use App\User;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        Dispatcher $dispatcher,
        AdvertisementsRepositoryInterface $advertisements,
        ImagesRepositoryInterface $images,
        CommentsRepositoryInterface $comments
    )
    {
        $this->dispatcher = $dispatcher;
        $this->advertisements = $advertisements;
        $this->images = $images;
        $this->comments = $comments;
    }
    
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $reguest, $id)
    {
        $user = User::find($id);
        $user->name = $reguest->get('name');
        $user->number = $reguest->get('number');
        $user->isadmin = $reguest->get('isadmin');
        $user->email = $reguest->get('email');
        $user->password = bcrypt($reguest->get('password'));
        $user->save();

        return redirect('/home');
    }
    
    public function myAdvertisements($id)
    {
        $advertisements = $this->advertisements->findMy($id);
        return view('users.advertisements')->with('advertisements', $advertisements);
    }
}