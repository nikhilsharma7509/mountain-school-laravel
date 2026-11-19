<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreNewsEventRequest;
use App\Http\Requests\UpdateNewsEventRequest;
use App\Models\NewsEvent;
use Illuminate\Support\Facades\Storage;

class NewsEventController extends Controller
{
    public function index()
    {
        $items = NewsEvent::orderByDesc('event_date')->orderByDesc('id')->paginate(10);
        return view('admin.news-events.index', compact('items'));
    }

    public function create()
    {
        return view('admin.news-events.create');
    }

    public function store(StoreNewsEventRequest $request)
    {
        $data = $request->validated();
        $data['slug'] = NewsEvent::generateUniqueSlug($data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news-events', 'public');
        }

        NewsEvent::create($data);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event item created successfully.');
    }

    public function edit(NewsEvent $newsEvent)
    {
        return view('admin.news-events.edit', compact('newsEvent'));
    }

    public function update(UpdateNewsEventRequest $request, NewsEvent $newsEvent)
    {
        $data = $request->validated();
        $data['slug'] = NewsEvent::generateUniqueSlug($data['title'], $newsEvent->id);

        if ($request->hasFile('image')) {
            if ($newsEvent->image) {
                Storage::disk('public')->delete($newsEvent->image);
            }
            $data['image'] = $request->file('image')->store('news-events', 'public');
        }

        $newsEvent->update($data);

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event item updated successfully.');
    }

    public function destroy(NewsEvent $newsEvent)
    {
        if ($newsEvent->image) {
            Storage::disk('public')->delete($newsEvent->image);
        }
        $newsEvent->delete();

        return redirect()->route('admin.news-events.index')
            ->with('success', 'News/Event item deleted successfully.');
    }
}
