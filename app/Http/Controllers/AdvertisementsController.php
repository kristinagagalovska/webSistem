<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Commands\CreateAdvertisementCommand;
use App\Commands\CreateImageCommand;
use App\Commands\UpdateAdvertisementCommand;
use App\Commands\UpdateImageCommand;
use App\Providers\ImageRepositoryServiceProvider;
use App\Repositories\AdvertisementsRepositoryInterface;
use App\Repositories\CommentsRepositoryInterface;
use App\Repositories\ImagesRepositoryInterface;
use App\Services\ImagesResolver;
use Collective\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;

class AdvertisementsController extends Controller
{
    private $advertisements;
    private $dispatcher;

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

    public function create() : View
    {
        if(Auth::check()) {
            return view('advertisements.create');            
        }
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $title = $request->get('title');
        $description = $request->get('description');
        $type = $request->get('type');
        $category = $request->get('category');
        $address = $request->get('address');
        $town = $request->get('town');
        $price = $request->get('price');

        $garage = $request->get('garage');
        if($garage == 'FALSE/') {
            $garage = true;
        } else {
            $garage = false;
        }

        $renovated = $request->get('renovated');
        if($renovated == 'FALSE/') {
            $renovated = true;
        } else {
            $renovated = false;
        }

        $new = $request->get('new');
        if($new == 'FALSE/') {
            $new = true;
        } else {
            $new = false;
        }

        $namesten = $request->get('namestem');
        if($namesten == 'FALSE/') {
            $namesten = true;
        } else {
            $namesten = false;
        }

        $userId = Auth::user()->id;

        $advertisement = new CreateAdvertisementCommand(
            $title,
            $description,
            $type,
            $category,
            $address,
            $town,
            $price,
            $garage,
            $renovated,
            $new,
            $namesten,
            $userId
            );
        $this->dispatcher->dispatch($advertisement);

        $files = $request->file('file');

        $lastAdvertisement = $this->advertisements->lastAdvertisement();
        $id = $lastAdvertisement->id;

        if (!empty($files)) {
            foreach ($files as $file) {
                $command = new CreateImageCommand($file, $id);
                $this->dispatcher->dispatch($command);
            }
        }

        $loggedUserId = Auth::user()->id;
        $advertisements = $this->advertisements->all();

        return view('advertisements.index', ['loggedUserId'=>$loggedUserId, 'advertisements'=>$advertisements]);
    }

    public function index() : View
    {
        $advertisements = $this->advertisements->all();
        if(Auth::check()) {
            $loggedUserId = Auth::user()->id;
            return view('advertisements.index', ['advertisements'=>$advertisements, 'loggedUserId'=>$loggedUserId]);
        }
        $loggedUserId = 0;

        return view('advertisements.index', ['advertisements'=>$advertisements, 'loggedUserId'=>$loggedUserId]);
    }

    public function view($id) : View
    {
        $advertisement = $this->advertisements->find($id);
        $images = $this->images->find($id);
        $comments = $this->comments->find($id);
        
        if(Auth::check()) { 
            $loggedUserId=Auth::user()->id;
        }   else {
            $loggedUserId=0;
        }    
                
        return view('advertisements.show', [
            'advertisement' => $advertisement, 
            'images' => $images,
            'comments' => $comments,
            'loggedUserId' => $loggedUserId,
        ]);
    }

    public function edit($id) : View
    {
        $advertisement =  $this->advertisements->find($id);
        $images = $this->images->find($id);

        return view('advertisements.edit', ['advertisement'=>$advertisement, 'images' => $images]);
    }

    public function update(Request $request, $id)
    {
        $id = (int)$id;
        $title = $request->get('title');
        $description = $request->get('description');
        $type = $request->get('type');
        $category = $request->get('category');
        $address = $request->get('address');
        $town = $request->get('town');
        $price = $request->get('price');

        $garage = $request->get('garage');
        if($garage == 'FALSE/') {
            $garage = true;
        } else {
            $garage = false;
        }

        $renovated = $request->get('renovated');
        if($renovated == 'FALSE/') {
            $renovated = true;
        } else {
            $renovated = false;
        }

        $new = $request->get('new');
        if($new == 'FALSE/') {
            $new = true;
        } else {
            $new = false;
        }

        $namesten = $request->get('namestem');
        if($namesten == 'FALSE/') {
            $namesten = true;
        } else {
            $namesten = false;
        }

        $advertisement = new UpdateAdvertisementCommand(
            $id,
            $title,
            $description,
            $type,
            $category,
            $address,
            $town,
            $price,
            $garage,
            $renovated,
            $new,
            $namesten
        );
        $this->dispatcher->dispatch($advertisement);
        
        $images = $this->images->find($id);
        foreach ($images as $image) {
            $this->images->delete($image->id);
        }

        $files = $request->file('file');

        if (!empty($files)) {
            foreach ($files as $file) {
                $command = new CreateImageCommand($file, $id);
                $this->dispatcher->dispatch($command);
            }
        }

        return redirect()->route('advertisement.view', $id);
    }

    public function delete($id) : RedirectResponse
    {
        $this->advertisements->delete($id);
        return redirect()->route('index');
    }

    public function search(Request $request)
    {
        $type = $request->get('type');
        $category = $request->get('category');
        $town = $request->get('town');

        $advertisements = $this->advertisements->search($type, $category, $town);
        
        if(Auth::check()) {
            $loggedUserId=Auth::user()->id;
        }   else {
            $loggedUserId=0;
        }

        dd($advertisements);
        
        return view('advertisements.index', ['advertisements'=>$advertisements, 'loggedUserId'=>$loggedUserId]);
    }
}