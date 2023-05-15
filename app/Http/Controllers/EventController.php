<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Event;
use Illuminate\Http\Request;


class EventController extends Controller
{
    // protected $rules = [
    //     'name' => 'required|string|max:255',
    //     'description' => 'nullable|string',
    //     'start_time' => 'nullable|date|after_or_equal:today',
    //     'end_time' => 'nullable|date|after_or_equal:start_time',
    // ];
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // if ($request->ajax()) {
        //     $start = $request->start;
        //     $end = $request->end;

        //     $data = Event::where(function ($query) use ($start, $end) {
        //         $query->where('start_time', '>=', $start)
        //             ->where('end_time', '<=', $end);
        //     })->get(['id', 'name', 'description', 'start_time', 'end_time']);

        //     return response()->json($data);
        // }

        return view('events');
    }

    // public function action(Request $request)
    // {
    //     if($request->ajax())
    //     {
    //         if($request->type == 'add')
    //         {
    //             // \Log::info('action method called');
    //             // dd($request->all());

    //             // DB::enableQueryLog();

    //             $event = Event::create([
    //                 'name'      =>  $request->name,
    //                 'description'   =>  $request->description,
    //                 'start_time'    =>  $request->start_time,
    //                 'end_time'      =>  $request->end_time
    //             ]);

    //             // $queryLog = DB::getQueryLog();
    //             // dd($queryLog);

    //             return response()->json($event);
    //         }
    //         // ----------------------------------------------------------------
    //         if($request->type == 'update')
    //         {
    //             $event = Event::find($request->id);
    //             if($event){
    //                 $event->update([
    //                     'name'      =>  $request->title,
    //                     'start_time'    =>  $request->start,
    //                     'end_time'      =>  $request->end
    //                 ]);
    //             }
    //             return response()->json($event);
    //         }

    //         if($request->type == 'delete')
    //         {
    //             $event = Event::find($request->id);
    //             if($event){
    //                 $event->delete();
    //             }
    //             return response()->json($event);
    //         }
    //     }
    // }
    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('components.events.create', compact('event'));

    // }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    // public function store(Request $request)
    // {
    //     $validatedData = $request->validate($this->rules);

    //     $event = new Event;
    //     $event->name = $validatedData['name'];
    //     $event->description = $validatedData['description'];
    //     $event->start_time = $validatedData['start_time'];
    //     $event->end_time = $validatedData['end_time'];
    //     $event->save();

    //     return redirect('/events');
    // }

    // /**
    //  * Display the specified resource.
    //  */
    // public function show(Event $event)
    // {
    //     return view('events.show', compact('event'));

    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  */
    // public function edit(Event $event)
    // {
    //     return view('events.edit', compact('event'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  */
    // public function update(Request $request, Event $event)
    // {
    //     $validatedData = $request->validate($this->rules);

    //     $event->name = $validatedData['name'];
    //     $event->description = $validatedData['description'];
    //     $event->start_time = $validatedData['start_time'];
    //     $event->end_time = $validatedData['end_time'];
    //     $event->save();

    //     return redirect('/events');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  */
    // public function destroy(Event $event)
    // {
    //     $event->delete();
    //     return redirect('/events');
    // }

    // public function getEventsJson()
    // {
    //     $events = Event::all();

    //     $fullCalendarEvents = $events->map(function($event) {
    //         return [
    //             'title' => $event->series,
    //             'start' => $event->start_date,
    //             'end' => $event->end_date,
    //         ];
    //     });

    //     return response()->json($fullCalendarEvents);
    // }
}
