<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function notifications()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;

        return view('admin.notifications', compact('unreadNotifications'));
    }

    public function readAll()
    {
        $unreadNotifications = auth()->user()->unreadNotifications;

        $unreadNotifications->each(function($notification) {
            $notification->markAsRead();
        });

        return redirect()->back()->with('success', 'Notificações lidas com Sucesso');
    }

    public function read($notification)
    {
        $notification = auth()->user()->notifications()->find($notification);
        $notification->markAsRead();

        return redirect()->back()->with('success', 'Notificação lida com Sucesso');
    }
}
