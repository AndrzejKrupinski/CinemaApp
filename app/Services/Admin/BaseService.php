<?php

namespace App\Services\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class BaseService
{
    /** @var Model */
    private $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function store(Request $request)
    {
        $this->model->fill($request->all());

        return $this->model->save();
    }

    public function update(Request $request)
    {
        $cinema = $this->model->find($request->get('id'));

        return $cinema->update($request->all());
    }

    public function destroy(int $id)
    {
        return $this->model->destroy($id);
    }
}
