<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Commands\CreateAdvertisementCommand;
use App\Commands\UpdateAdvertisementCommand;
use App\Repositories\AdvertisementsRepositoryInterface;
use Collective\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Symfony\Component\HttpFoundation\RedirectResponse;


class AdvertisementsController extends Controller
{
    private $advertisements;
    private $dispatcher;

    public function __construct(Dispatcher $dispatcher, AdvertisementsRepositoryInterface $advertisements)
    {
        $this->dispatcher = $dispatcher;
        $this->advertisements = $advertisements;
    }

    public function create() : View
    {
       return view('advertisements.create');
    }

    public function store(Request $request) : RedirectResponse
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

        $userId = 1; //momentalna difoltna vrednost

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

        return redirect()->route('index');
    }

    public function index() : View
    {
        $advertisements = $this->advertisements->all();
        return view('advertisements.index', ['advertisements'=>$advertisements]);
    }

    public function view($id) : View
    {
        $advertisement = $this->advertisements->find($id);
        return view('advertisements.show', ['advertisement' => $advertisement]);
    }

    public function edit($id) : View
    {
        $advertisement =  $this->advertisements->find($id);

        return view('advertisements.edit', ['advertisement'=>$advertisement]);
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

        return view('advertisements.index', ['advertisements'=>$advertisements]);
    }

}