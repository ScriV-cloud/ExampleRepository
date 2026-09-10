<?php

namespace App\Http\Controllers;

use App\Models\Example;
use App\Http\Requests\StoreExampleRequest;
use App\Http\Requests\UpdateExampleRequest;
use App\Jobs\ExampleJob;

class ExampleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Example::paginate();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreExampleRequest $request)
    {
        $note = json_encode($request->all());
        ExampleJob::dispatch($note);
        return $note;
    }

    /**
     * Display the specified resource.
     */
    public function show(int $user_id)
    {
        return Example::where('user_id', '=', $user_id)
                    ->orderBy('listen_at', 'asc')
                    ->paginate();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExampleRequest $request, Example $example)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Example $example)
    {
        //
    }
}
