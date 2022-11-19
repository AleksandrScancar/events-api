<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventResource;
use App\Models\Event;
use App\Http\Requests\EventRequest;
use Illuminate\Support\Facades\Validator;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::all();
        return response(['events' => EventResource::collection($events), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\EventRequest $eventRequest
     * @return \Illuminate\Http\Response
     */
    public function store(EventRequest $eventRequest)
    {
        $data = $eventRequest->all();


        $data["user_id"] = auth()->user()->id;

        $event = Event::create($data);

        return response(['event' => new EventResource($event), 'message' => 'Created successfully'], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return response(['event' => new EventResource($event), 'message' => 'Retrieved successfully'], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\EventRequest $eventRequest
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function update(EventRequest $eventRequest, Event $event)
    {
        $eventRequest->authorize('update', $event);
        $event->update($eventRequest->all());
        return response(['event' => new EventResource($event), 'message' => 'Updated successfully'], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Event $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();
        return response(['message' => 'Deleted'], 200);
    }
}
