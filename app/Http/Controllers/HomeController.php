<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $query = Event::query();

        if ($request->filled('search')) {
         $query->where('title', 'like', '%' . $request->search . '%');
        }
    
        elseif ($request->filled('category')) {
            $query->where('category', $request->category);
        }

        $events = $query->orderBy('date_time', 'asc')->paginate(6);
        
        return view("home", compact('events'));
    }
    
}
