<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode as Episode;
use App\Models\Series as Series;
use App\Models\Season as Season;
use App\Models\Character as Character;
use Inertia\Inertia;
use Illuminate\Support\Facades\DB;


class TVShowController extends Controller
{

    public function getAllEpisodesForSeriesByShortCode(Request $request, $short_code)
    {   

        $series = Series::where('short_code', $short_code)->get();
        if(!isset($series[0])) return response()->json('No show with that code found!');
        $seriesId = $series[0]->id;
       // Get all episodes for a series
        $episodes = Episode::select(['series_id', 'episode_number', 'episode_title', 'episode_synopsis', 'url'])
        ->groupBy(['series_id', 'episode_number', 'episode_title','episode_synopsis','url'])
        ->having('series_id', '=', $seriesId)
        ->orderBy('series_id', 'asc')
        ->orderBy('episode_number', 'asc')
        ->get();
      
         return Inertia::render('SeasonList', [
            'seasonList' => $episodes
        ]);
        
    }
    public function getAllEpisodesGivenSeason(Request $request, $short_code, $seasonNumber){
        $page = $request->query('page');
        $series = Series::where('short_code', $short_code)->first();
        $season = Season::where('series_id', $series->series_id)->where('season_number', $seasonNumber)->first();
        $episodes = Episode::where('series_id', $series->series_id)->where('season_id', $season->season_id)->paginate(10);
        return response()->json($episodes);
    }
    public function getAllEpisodesForASeason(Request $request, $short_code, $seasonNumber){
       
        return Inertia::render('EpisodeList', [
        'show' => $short_code,
        'season' => $seasonNumber,
        ]); 

    }

    public function getAllSeasonsForSeriesByShortCode(Request $request, $short_code)
    {   

        $series = Series::where('short_code', $short_code)->first();
        if(!isset($series)) return response()->json('No show with that code found!');
       // Get all episodes for a series
         $seasonsList = $series->load(['seasons', 'episodes']);
        // $seasons = Season::select(['season_id', 'season_number', 'season_title', 'series_id'])
        // ->groupBy(['series_id','season_id', 'season_number', 'season_title', 'series_id'])
        // ->having('series_id', '=', $seriesId)
        // ->orderBy('series_id', 'asc')
        // ->orderBy('season_number', 'asc')
        // ->get();
        if(!isset($seasonsList)) return response()->json('No show with that code found!');
         return Inertia::render('SeasonList', [
            'seasonList' => $seasonsList->seasons,
            'episodeList' => $seasonsList->episodes,
            'show' => $short_code
        ]);

        // return response()->json($seasonsList[0]);
    }



    public function getEpisodesForSeriesById(Request $request,$series)
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
    
    public function getEpisodesForSeasonSeriesIdAndSeasonId(Request $request,$season, $series)
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
    
    public function getCharacters(Request $request,){
        $characters = Character::all();
        return response()->json($characters);
    }
}
