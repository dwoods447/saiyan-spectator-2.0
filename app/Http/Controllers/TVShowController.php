<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode as Episode;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;
class TVShowController extends Controller
{

    public function getEpisodesBySeries(Request $request,$series)
    {   
       // Get all episodes for a series
        $episodes = Episode::select(['series_id', 'episode_number', 'episode_title', 'episode_synopsis', 'url'])
        ->groupBy(['series_id', 'episode_number', 'episode_title','episode_synopsis','url'])
        ->having('series_id', '=', $series)
        ->orderBy('series_id', 'asc')
        ->orderBy('episode_number', 'asc')
        ->get();
        return response()->json($episodes);
        /*
         return Inertia::render('Users/Profile', [
            'user' => User::findOrFail($id)
        ]);
        
        */

    }
    
    public function getEpisodesBySeason(Request $request,$season, $series)
    {   
        // Get all episodes for a season
        $episodes = Episode::select(['series_id', 'season_id', 'episode_number', 'episode_title', 'episode_synopsis', 'url'])
        ->groupBy(['series_id','season_id', 'episode_number', 'episode_title','episode_synopsis','url'])
        ->having('series_id', '=', $series)
        ->having('season_id', '=', $season)
        ->orderBy('series_id', 'asc')
        ->orderBy('episode_number', 'asc')
        ->get();
        return response()->json($episodes);

    }

    public function getSpecificEpisode(Request $request, $show, $season, $series, $episode)
    {   
        // Get episode by id
        $episodes = Episode::where('season_id', $season)->where('series_id', $series)->where($episode, 'id')->get();
        return response()->json($episodes);
    }
    
}
