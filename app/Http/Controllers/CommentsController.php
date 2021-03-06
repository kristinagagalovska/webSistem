<?php

namespace App\Http\Controllers;

use App\Commands\AddCommentCommand;
use App\Repositories\CommentsRepositoryInterface;
use Illuminate\Http\Request;
use Collective\Bus\Dispatcher;
use Illuminate\Support\Facades\Auth;

/**
 * @property  dispatcher
 */
class CommentsController extends Controller
{
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    public function store(Request $request, int $id)
    {
        $content = $request->get('content');
        $advertisementId = $id;
        $author =  Auth::user();
        
        $comment = new AddCommentCommand($author, $advertisementId, $content);
        $this->dispatcher->dispatch($comment);
        
        return redirect()->route('advertisement.view', $id);
    }
}