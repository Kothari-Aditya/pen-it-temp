<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['C', 'C++', 'Java', 'PHP', 'Laravel', 'Framework', 'Programming', 'Cricket', 'F1', 'Football', 'Coding']);
        $tags->each(function($tagName) {
            Tag::create(['name' => $tagName]);
        });
    }
}
