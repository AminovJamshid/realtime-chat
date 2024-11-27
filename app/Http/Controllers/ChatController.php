<?php

namespace App\Http\Controllers;

use App\Events\GotMessage;
use App\Jobs\SendMessage;
use App\Models\Message;
use App\Models\User;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(): Application|Factory|View
    {
        return view('chat');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'message'     => ['required', 'string'],
            'sender_id'   => ['required', 'integer', 'in:' . Auth::id()],
            'receiver_id' => ['required', 'integer', 'exists:' . User::class . ',id'],
        ]);

        Message::create($validate);

        return $this->show($request->receiver_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::query()->find($id);

        $auth    = Auth::id();
        $partner = $user->id;

        $messages = Message::query()->where(function ($query) use ($auth, $partner) {
            $query->where('sender_id', $auth)
                ->where('receiver_id', $partner);
        })->orWhere(function ($query) use ($auth, $partner) {
            $query->where('sender_id', $partner)
                ->where('receiver_id', $auth);
        })->get();

        return view('chat', ['user' => $user, 'messages' => $messages]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getMessages($id): JsonResponse
    {
        $user = User::query()->find($id);

        $auth    = Auth::id();
        $partner = $user->id;

        $messages = Message::query()
            ->where(function ($query) use ($auth, $partner) {
                $query->where('sender_id', $auth)
                    ->where('receiver_id', $partner);
            })->orWhere(function ($query) use ($auth, $partner) {
                $query->where('sender_id', $partner)
                    ->where('receiver_id', $auth);
            })->with(['sender', 'receiver'])->get();

        return response()->json($messages);
    }

    public function storeMessages(): JsonResponse
    {
        $message = Message::query()->create([
            'sender_id' => request('sender'),
            'receiver_id' => request('receiver'),
            'message' => request('text'),
        ]);

        SendMessage::dispatch($message);

        return response()->json($message);
    }
}
