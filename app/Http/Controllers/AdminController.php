<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use App\Repositories\UsersRepositoryInterface;
use App\User;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
    
    public function index()
    {
        return view('admin.index');
    }

    public function advertisements()
    {
        $advertisements = $this->advertisements->all();
    
        return view('admin.advertisements', ['advertisements'=>$advertisements]);
    }

    public function users()
    {
        $users = $this->users->all() ;
        
        return view('admin.users', ['users' => $users]);
    }
}