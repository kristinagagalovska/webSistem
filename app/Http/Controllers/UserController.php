<?php

namespace App\Http\Controllers;


use App\Commands\UpdateUserCommand;
use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use App\Repositories\UsersRepositoryInterface;
use App\User;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\RedirectResponse;

class UserController extends Controller
{
    public function __construct(
        Dispatcher $dispatcher,
        AdvertisementsRepositoryInterface $advertisements,
        ImagesRepositoryInterface $images,
        CommentsRepositoryInterface $comments,
        UsersRepositoryInterface $users
    )
    {
        $this->dispatcher = $dispatcher;
        $this->advertisements = $advertisements;
        $this->images = $images;
        $this->comments = $comments;
        $this->users = $users;
    }
    
    public function edit($id)
    {
        $user = $this->users->find($id);
        return view('users.edit')->with('user', $user);
    }

    public function update(Request $reguest, $id)
    {
//        $user = User::find($id);
//        $user->name = $reguest->get('name');
//        $user->number = $reguest->get('number');
//        $user->isadmin = $reguest->get('isadmin');
//        $user->email = $reguest->get('email');
//        $user->password = bcrypt($reguest->get('password'));
//        $user->save();
        
        $user = new UpdateUserCommand(
            $id,
            $reguest->get('name'),
            $reguest->get('number'),
            (bool)$reguest->get('isadmin'),
            $reguest->get('email'),
            bcrypt($reguest->get('password'))            
        );
        
        $this->dispatcher->dispatch($user);

        return redirect('/home');
    }

    public function delete($id) : RedirectResponse
    {
        $id = (int)$id;
        $this->users->delete($id);
        
        if(Auth::user()->isadmin == 1) {
            return redirect('/admin');
        } else {
            return redirect('/home');            
        }     
    }

    public function setAdmin($id)
    {
        $id = (int)$id;
        $user = User::find($id);

        if( $user->isadmin){

            $user->isadmin = 0;
        }else{
            $user->isadmin = 1;
        }
        $user->save();

        return redirect()->route('admin.users');
    }
    
    public function myAdvertisements()
    {
        $id = Auth::user()->id;
        $advertisements = $this->advertisements->findMy($id);

        return view('home')->with('advertisements', $advertisements);
    }
}