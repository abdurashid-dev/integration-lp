<?php

namespace App\Http\Services;

use Illuminate\Support\Facades\Validator;

class AbstractService
{
    protected $model;

    public function show($id)
    {
        return $this->model::findOrFail($id);
    }

    public function create()
    {
        return new $this->model;
    }

    public function store(array $data)
    {
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            dd($validator->errors());
        }
        $data = $validator->validated();
        $object = new $this->model;
        foreach ($fields as $field) {
            $field->fill($object, $data);
        }
        $object->save();
    }

    public function edit($id)
    {
        return $this->show($id);
    }

    public function update(array $data, $id)
    {
        $item = $this->show($id);
        $fields = $this->getFields();
        $rules = [];
        foreach ($fields as $field) {
            $rules[$field->getName()] = $field->getRules();
        }
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            dd($validator->errors());
        }
        $data = $validator->validated();
        foreach ($fields as $field) {
            $field->fill($item, $data);
        }
        $item->update();
    }

    public function destroy($id)
    {
        $item = $this->show($id);
        $item->delete();
    }

    public function getFields()
    {
        return [];
    }
}
