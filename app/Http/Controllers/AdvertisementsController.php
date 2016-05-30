<?php

declare (strict_types=1);

namespace App\Http\Controllers;

use App\Commands\CreateAdvertisementCommand;
use App\Repositories\AdvertisementsRepositoryInterface;
use Collective\Bus\Dispatcher;
use Illuminate\Http\Request;
use Illuminate\View\View;


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

        return redirect()->route('advertisement.create');


    }

}