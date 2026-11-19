<?php

namespace Database\Seeders;

use App\Models\NewsEvent;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsEventSeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title' => 'Annual Sports Day & Little Champions Meet 2026',
                'category' => 'Event',
                'event_date' => '2026-11-12',
                'short_description' => 'A joyful morning of relay races, obstacle courses, and parent-child teamwork on the turf.',
                'content' => '<p>Our young learners showcased incredible enthusiasm, sportsmanship, and motor coordination during the Annual Sports Day 2026. Parents cheered from the stands as Playgroup through Senior KG students participated in age-appropriate track events.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Admissions Open for Academic Session 2026–27',
                'category' => 'News',
                'event_date' => '2026-11-05',
                'short_description' => 'Applications are now open for Playgroup, Nursery, Junior KG, and Senior KG.',
                'content' => '<p>The Mountain School invites parents to book a guided campus tour and interact with our early childhood educators. Limited seats are available across all stages for the upcoming session.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'National Early Childhood Innovation Award 2026',
                'category' => 'Achievement',
                'event_date' => '2026-10-24',
                'short_description' => 'Honored for excellence in experiential STEM and Reggio-inspired classroom environments.',
                'content' => '<p>We are proud to share that The Mountain School has been recognized at the National Education Summit for our Little Explorers STEM Lab and child-safe campus architecture.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Festival of Lights & Cultural Heritage Week',
                'category' => 'Event',
                'event_date' => '2026-10-18',
                'short_description' => 'Traditional attire, eco-friendly diya painting, and storytelling celebrating Indian culture.',
                'content' => '<p>Children explored colors, music, and traditions through hands-on craft workshops and classroom celebrations designed to nurture cultural appreciation and empathy.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'Young Artists & Clay Sculpting Exhibition',
                'category' => 'Achievement',
                'event_date' => '2026-09-29',
                'short_description' => 'Over 120 original artworks and clay creations displayed by Nursery and Kindergarten learners.',
                'content' => '<p>Parents walked through our campus gallery to admire expressive paintings, recycled art installations, and imaginative clay models created entirely by our students.</p>',
                'is_published' => true,
            ],
            [
                'title' => 'New GPS-Enabled Eco-Bus Fleet Launched',
                'category' => 'News',
                'event_date' => '2026-09-14',
                'short_description' => 'Upgraded air-conditioned school transport with live parent tracking and female attendants.',
                'content' => '<p>Reinforcing our commitment to child safety, we have inducted new GPS-monitored buses equipped with speed governors, CCTV cameras, and real-time mobile alerts.</p>',
                'is_published' => true,
            ],
        ];

        foreach ($items as $item) {
            NewsEvent::updateOrCreate(
                ['slug' => Str::slug($item['title'])],
                array_merge($item, ['slug' => Str::slug($item['title'])])
            );
        }
    }
}
