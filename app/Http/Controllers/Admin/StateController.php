<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Repo\Admin\State\StateRepo;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\State\StateCreateRequest;
use App\Http\Requests\Admin\State\StateUpdateRequest;
use App\Models\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    
    public function index(Request $request)
    {
        return StateRepo::get($request->get('query_string') ?? -1);
    }

    public function create()
    {
        return StateRepo::create();
    }

    public function store(StateCreateRequest $request)
    {
        return StateRepo::store($request);
    }

    public function edit(State $state)
    {
        return StateRepo::edit($state);
    }

    public function update(StateUpdateRequest $request, State $state)
    {
        return StateRepo::update($request, $state);
    }

    public function destroy(State $state)
    {
        return StateRepo::destroy($state);
    }

    public function destroyMany($ids)
    {
        return StateRepo::destroyMany($ids);
    }

}
