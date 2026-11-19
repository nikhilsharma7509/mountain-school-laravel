<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\NewsEventResource;
use App\Models\NewsEvent;
use Illuminate\Http\Request;

class NewsEventApiController extends Controller
{
    public function index(Request $request)
    {
        $category = $request->query('category');

        $items = NewsEvent::published()
            ->when(in_array($category, ['News', 'Event', 'Achievement']), fn($q) => $q->where('category', $category))
            ->orderByDesc('event_date')
            ->orderByDesc('id')
            ->paginate($request->integer('per_page', 10));

        return NewsEventResource::collection($items);
    }

    public function show(string $slug)
    {
        $item = NewsEvent::published()->where('slug', $slug)->firstOrFail();

        return new NewsEventResource($item);
    }
}
