<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Episode as Episode;

class TVShowController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getEpisodesBySeries(Request $request, $show, $season, $series_id, $episode)
    {   
        // DragonBall - db - season_id = 21 - season
        // DragonBall Z
        $episodes = Episode::where('season_id', $season)->where()->where('series_id', $series)->orderBy('episode_number', 'asc');
        return response()->json($episodes);

    }
    
    public function getEpisodesBySeason(Request $request, $show, $season, $series_id, $episode)
    {   
        // DragonBall - db - season_id = 21 - season
        // DragonBall Z
        $episodes = Episode::where('season_id', $season)->where()->where('series_id', $series)->orderBy('episode_number', 'asc');
        return response()->json($episodes);

    }

    public function getEpisodeById(Request $request, $show, $season, $series_id, $episode)
    {   
        // DragonBall - db - season_id = 21 - season
        // DragonBall Z
        $episodes = Episode::where('season_id', $season)->where()->where('series_id', $series)->orderBy('episode_number', 'asc');
        return response()->json($episodes);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
