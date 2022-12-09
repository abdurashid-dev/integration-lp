<?php

namespace App\Http\Services;

use App\Models\Technology;

class TechnologyService
{
    protected $model = Technology::class;

    public function create()
    {
        return new $this->model;
    }

    public function store(array $data)
    {
        $this->model::create($data);
    }

    public function edit($id)
    {
        return $this->model::findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $technology = self::edit($id);
        $technology->update($data);
    }

    public function destroy($id)
    {
        $technology = $this->edit($id);
        $technology->delete();
    }
}
