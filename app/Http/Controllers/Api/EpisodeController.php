<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEpisodeRequest;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $episodes = Episode::all();
        $episodes = Episode::paginate(20);
        // return $episodes;
        return response()->json([
            'status' => true,
            'results' => $episodes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEpisodeRequest $request)
    {
        //
        $episode = Episode::create($request->all());

        return response()->json([
            'status' => true,
            'message' => "Episode Created successfully!",
            'episode' => $episode
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function show(Episode $episode)
    {
        //
        return $episode;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function edit(Episode $episode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEpisodeRequest $request, Episode $episode)
    {
        //
        $success = $episode->update($request->all());

        return response()->json([
            'status' => $success,
            'message' => "Episode Updated successfully!",
            'episode' => $episode
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Episode  $episode
     * @return \Illuminate\Http\Response
     */
    public function destroy(Episode $episode)
    {
        //
        $success = $episode->delete();
        return response()->json([
            'status' => $success,
            'message' => "Episode Deleted successfully!",
            'episode' => $episode
        ], 200);
    }
}
