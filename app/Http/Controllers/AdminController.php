<?php

namespace App\Http\Controllers;

use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use Illuminate\Contracts\Bus\Dispatcher;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
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
    
    public function index()
    {
        return view('admin.index');
    }

    public function advertisements()
    {
        $advertisements = $this->advertisements->all();
    
        return view('admin.advertisements', ['advertisements'=>$advertisements]);
    }

}