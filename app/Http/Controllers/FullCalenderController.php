<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class FullCalenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
             $data = Event::whereDate('start', '>=', $request->start)
                       ->whereDate('end',   '<=', $request->end)
                       ->get(['id', 'title', 'start', 'end']);
             return response()->json($data);
        }
        return view('fullcalender');
    }

    /**
     * Rest if the plugin stuff.
     */
    public function ajax(Request $request)
    {
        switch ($request->type) {

        case 'add':
            $event = Event::create([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            return response()->json($event);
            break;

        case 'update':
            $event = Event::find($request->id)->update([
                'title' => $request->title,
                'start' => $request->start,
                'end' => $request->end,
            ]);

            return response()->json($event);
            break;

        case 'delete':

            $event = Event::find($request->id)->delete();

            return response()->json($event);
            break;

        default:

            # code...

            break;
        }
    }
}
