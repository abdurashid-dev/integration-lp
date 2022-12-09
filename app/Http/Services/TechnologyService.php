<?php

namespace App\Http\Services;

use App\Fields\TextField;
use App\Models\Technology;

class TechnologyService extends AbstractService
{
    protected $model = Technology::class;

    public function getFields()
    {
        return [
            TextField::make('name')->setRules('required'),
            TextField::make('link')->setRules('required'),
        ];
    }
//
//    public function create()
//    {
//        return new $this->model;
//    }
//
//    public function store(array $data)
//    {
//        $this->model::create($data);
//    }
//
//    public function edit($id)
//    {
//        return $this->model::findOrFail($id);
//    }
//
//    public function update(array $data, $id)
//    {
//        $technology = self::edit($id);
//        $technology->update($data);
//    }
//
//    public function destroy($id)
//    {
//        $technology = $this->edit($id);
//        $technology->delete();
//    }
}
