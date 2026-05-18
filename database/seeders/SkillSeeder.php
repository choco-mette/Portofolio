<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Skill;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skills = [
            ['name' => 'PHP', 'bg_color' => '#777BB4', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 1],
            ['name' => 'Laravel', 'bg_color' => '#FF2D20', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 2],
            ['name' => 'FastAPI', 'bg_color' => '#009688', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 3],
            ['name' => 'Python', 'bg_color' => '#FFD43B', 'text_color' => '#1A1A1A', 'is_highlighted' => true, 'sort_order' => 4],
            ['name' => 'PostgreSQL', 'bg_color' => '#336791', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 5],
            ['name' => 'MySQL', 'bg_color' => '#4479A1', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 6],
            ['name' => 'Docker', 'bg_color' => '#2496ED', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 7],
            ['name' => 'Nginx', 'bg_color' => '#009639', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 8],
            ['name' => 'Grafana', 'bg_color' => '#F46800', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 9],
            ['name' => 'Prometheus', 'bg_color' => '#E6522C', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 10],
            ['name' => 'Linux / Bash', 'bg_color' => '#1A1A1A', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 11],
            ['name' => 'Redis', 'bg_color' => '#DC382D', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 12],
            ['name' => 'Git', 'bg_color' => '#F05032', 'text_color' => '#FFFFFF', 'is_highlighted' => true, 'sort_order' => 13],
        ];

        foreach ($skills as $skill) {
            Skill::updateOrCreate(['name' => $skill['name']], $skill);
        }
    }
}
