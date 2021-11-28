<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PushController extends Controller
{
    /**
     * Store the PushSubscription.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'endpoint'    => 'required|unique:users',
            'keys.auth'   => 'required',
            'keys.p256dh' => 'required'
        ]);

        $endpoint = $request->endpoint;
        $token = $request->keys['auth'];
        $key = $request->keys['p256dh'];
        $user = User::find(Auth::user()->id);
        $user->endpoint = $endpoint;
        $user->save();
        $user->updatePushSubscription($endpoint, $key, $token);

        return response()->json(['success' => true], 200);
    }

    /**
     * Send Push Notifications to all users.
     *
     * @return \Illuminate\Http\Response
     */
    public function push()
    {
        Notification::send(User::all(), new PushDemo);
        return redirect()->back();
    }
}
