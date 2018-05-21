<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository.
 */
class BaseRepository
{
    /**
     * @return mixed
     */
    public function getAll()
    {
        return $this->query()->get();
    }

    /**
     * @return mixed
     */
    public function getCount()
    {
        return $this->query()->count();
    }

        /**
     * @param Model $model
     *
     * @return bool
     */
    public function save(Model $model)
    {
        $saved = $model->save();

        if ($saved) {
            app('cache')->flush();
        }

        return $saved;
    }

    /**
     * @param Model $model
     * @param array $input
     *
     * @return bool
     */
    public function update(Model $model, array $input)
    {
        $updated = $model->update($input);

        if ($updated) {
            app('cache')->flush();
        }

        return $updated;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function delete(Model $model)
    {
        $deleted = $model->delete();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function forceDelete(Model $model)
    {
        $deleted = $model->forceDelete();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @param Model $model
     *
     * @return bool|null
     */
    public function restore(Model $model)
    {
        $deleted = $model->restore();

        if ($deleted) {
            app('cache')->flush();
        }

        return $deleted;
    }

    /**
     * @param $id
     *
     * @return mixed
     */
    public function find($id)
    {
        return $this->query()->find($id);
    }

    /**
     * @return mixed
     */
    public function query()
    {
        return call_user_func(static::MODEL.'::query');
    }
}
