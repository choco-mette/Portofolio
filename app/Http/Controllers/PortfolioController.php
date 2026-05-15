<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Cache;
use Carbon\Carbon;

use App\Models\Skill;
use App\Models\Experience;
use App\Models\Project;

class PortfolioController extends Controller
{
    public function index()
    {
        $skills = Skill::where('is_highlighted', true)->orderBy('sort_order')->get();
        $experiences = Experience::with('skills')->where('is_active', true)->orderBy('start_year', 'desc')->get();
        $projects = Project::with('skills')->orderBy('sort_order')->get();

        $mediumPosts = Cache::remember('medium_posts', 43200, function () {
            try {
                $response = Http::get("https://medium.com/feed/@choco_mette");
                
                if (!$response->successful()) {
                    return collect();
                }

                $xml = simplexml_load_string($response->body(), 'SimpleXMLElement', LIBXML_NOCDATA);
                if ($xml === false) {
                    return collect();
                }
                
                $arrayData = json_decode(json_encode($xml), true);
                
                if (!isset($arrayData['channel']['item'])) {
                    return collect();
                }

                $items = $arrayData['channel']['item'];
                
                if (!empty($items) && !isset($items[0])) {
                    $items = [$items];
                }

                $items = array_slice($items, 0, 5);
                
                return collect($items)->map(function ($item) {
                    return [
                        'title' => trim($item['title']),
                        'link'  => explode('?', $item['link'])[0],
                        'date'  => Carbon::parse($item['pubDate'])->format('d M Y'),
                    ];
                });
            } catch (\Exception $e) {
                return collect();
            }
        });

        return view('landing', compact('mediumPosts', 'skills', 'experiences', 'projects'));
    }
}
