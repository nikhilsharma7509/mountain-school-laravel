<?php

namespace App\Http\Controllers;

use App\Models\NewsEvent;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        $latestNewsEvents = NewsEvent::published()
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->take(3)
            ->get();

        return view('home', compact('latestNewsEvents'));
    }

    public function index(Request $request)
    {
        $category = $request->query('category');

        $newsEvents = NewsEvent::published()
            ->when(in_array($category, ['News', 'Event', 'Achievement']), fn($q) => $q->where('category', $category))
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->paginate(6)
            ->withQueryString();

        return view('news-events.index', compact('newsEvents', 'category'));
    }

    public function show(string $slug)
    {
        $item = NewsEvent::published()->where('slug', $slug)->firstOrFail();

        $relatedItems = NewsEvent::published()
            ->where('id', '!=', $item->id)
            ->orderByDesc('event_date')
            ->take(3)
            ->get();

        return view('news-events.show', compact('item', 'relatedItems'));
    }
}
