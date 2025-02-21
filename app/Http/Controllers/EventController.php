<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{

     public function index()
     {
         $events = Event::all();
         return view('admin', compact('events'));
     }

    public function create(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'adresse' => 'required',
                'date_time' => 'required',
                'category' => 'required',
                'max_participation' => 'required|integer|min:1',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('event-images', 'public');
            }

            Event::create([
                'title' => $request->title,
                'description' => $request->description,
                'adresse' => $request->adresse,
                'date_time' => $request->date_time,
                'category' => $request->category,
                'max_participation' => $request->max_participation,
                'image_path' => $imagePath,
                'user_id' => Auth::id(),
            ]);

            return redirect()->back()->with([
                'success' => 'Événement ajouté avec succès !',
                'action' => 'create'
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->with([
                'error' => 'Une erreur est survenue lors de la création de l\'événement.',
                'action' => 'error'
            ])->withInput();
        }
    }

    public function myEvents()
    {
        $events = Event::all()->where('user_id', auth()->id());
        return view('events', compact('events'));
    }

    public function update(Request $request, Event $event)
    {
        $newData = $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'adresse' => 'required',
            'date_time' => 'required',
            'category' => 'required',
            'max_participation' => 'required|integer|min:1',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('image')) {
            if ($event->image_path) {
                Storage::disk('public')->delete($event->image_path);
            }
            $newData['image_path'] = $request->file('image')->store('event-images', 'public');
        }

        $event->update($newData);

        return redirect()->route('admin.events')->with([
            'success' => 'Événement modifié avec succès !',
            'action' => 'update'
        ]);
    }

    public function destroy(Event $event)
    {

        $event->delete();

        return redirect()->route('admin.events')->with([
            'success' => 'Événement supprimé avec succès !',
            'action' => 'delete'
        ]);
    }

}
