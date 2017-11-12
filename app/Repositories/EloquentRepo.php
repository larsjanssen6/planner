<?php

namespace App\Repositories;

abstract class EloquentRepo implements RepoInterface
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model.
     *
     * @return string
     */
    abstract protected function getModel();

    /**
     * Set model.
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get all.
     *
     * @param array $with
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll($with = [])
    {
        return $this->_model->with($with)->get();
    }

    /**
     * Find.
     *
     * @param $id
     *
     * @param array $with
     * @return mixed
     */
    public function find($id, $with = [])
    {
        return $this->findBy('id', $id, $with);
    }

    /**
     * Find first by column and value.
     *
     * @param $column
     * @param $value
     * @param array $with
     *
     * @return mixed
     */
    public function findBy($column, $value, $with = [])
    {
        return $this->_model->where($column, $value)->with($with)->first();
    }

    /**
     * Find all by column and value.
     *
     * @param $column
     * @param $value
     * @param array $with
     *
     * @return mixed
     */
    public function findAll($column, $value, $with = [])
    {
        return $this->_model->where($column, $value)->with($with)->get();
    }

    /**
     * Check if value exists.
     *
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function exists($column, $value)
    {
        return $this->_model->where($column, $value)->exists();
    }

    /**
     * Create.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes)
    {
        return $this->_model->create($attributes);
    }

    /**
     * Update.
     *
     * @param $id
     * @param array $attributes
     *
     * @return bool|mixed
     */
    public function update($id, array $attributes)
    {
        $result = $this->find($id);

        if ($result) {
            $result->update($attributes);

            return $result;
        }

        return false;
    }

    /**
     * Delete.
     *
     * @param $id
     *
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->find($id);

        if ($result) {
            $result->delete();

            return true;
        }

        return false;
    }

    /**
     * Count total records.
     *
     * @return mixed
     */
    public function count()
    {
        return $this->_model->count();
    }

    /**
     * Return latest record.
     *
     * @return mixed
     */
    public function latest()
    {
        return $this->_model->latest()->first();
    }

    /**
     * Make a new instance of the entity to query on.
     *
     * @param array $with
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function make(array $with = [])
    {
        return $this->_model->with($with);
    }

    /**
     * Return all results that have a required relationship.
     *
     * @param string $relation
     * @param array  $with
     *
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function has($relation, array $with = [])
    {
        $entity = $this->make($with);

        return $entity->has($relation)->get();
    }

    /**
     * Get results by page.
     *
     * @param array $with
     * @param int $pages
     * @return mixed
     */
    public function paginate($with = [], $pages = 10)
    {
        return $this->_model
            ->latest()
            ->with($with)
            ->paginate($pages);
    }
}
