<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NewsEventResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'slug' => $this->slug,
            'category' => $this->category,
            'date' => $this->event_date->format('Y-m-d'),
            'formatted_date' => $this->event_date->format('d M Y'),
            'image_url' => $this->image_url,
            'short_description' => $this->short_description,
            'content' => $this->content,
            'url' => route('news-events.show', $this->slug),
        ];
    }
}
