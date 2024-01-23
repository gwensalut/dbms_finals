<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageController extends Controller
{
    public function viewHomePage()
    {
        $listOfevents = Event::all();
        return view('pages.home', ['events' => $listOfevents]);
    }

    public function viewLoginPage()
    {
        return view('authentication.login');
    }

    public function viewRegisterPage()
    {
        return view('authentication.register');
    }

    public function viewManageEvents()
    {
        $userListOfEvents = Event::where('event_by', Auth::user()->username)->get();
        return view('pages.manage_events', ['events' => $userListOfEvents]);
    }

    public function viewEventPage()
    {
        return view('pages.view_event');
    }

    public function viewEditEventPage()
    {
        return view('pages.edit_event');
    }
}
