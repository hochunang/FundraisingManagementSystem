<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::all();
        return view('committee.events', compact($events));
    }

    public function allEvents()
    {
        $events = Event::all();
        return response()->json($events);
    }

    public function store(Request $request)
    {
        $event = new Event([
            'eventId' => $request->input('eventId'),
            'eventName' => $request->input('eventName'),
            'location' => $request->input('location'),
            'startTime' => $request->input('startTime'),
            'endTime' => $request->input('endTime'),
            'donationReceived' => $request->input('donationReceived'),
            'organizer' => $request->input('organizer'),
            'status' => 'Pending'
        ]);
        //$event = Event::create($request->all());
        $event->save();

        return response()->json('The event successfully added');

    }

    public function edit($id)
    {
        $event = Event::find($id);
        return response()->json($event);
    }

    public function update($id, Request $request)
    {
        $event = Event::find($id);
        $event->update($request->all());
        return response()->json('The event successfully updated');
    }

    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();

        return response()->json('The event successfully deleted');
    }
}
