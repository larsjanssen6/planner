<?php

namespace App\Repositories;

interface RepoInterface
{
    /**
     * Get all.
     *
     * @return mixed
     */
    public function getAll();

    /**
     * Get one.
     *
     * @param $id
     *
     * @return mixed
     */
    public function find($id);

    /**
     * @param $column
     * @param $value
     *
     * @return mixed
     */
    public function findBy($column, $value);

    /**
     * @param $column
     * @param $value
     * @param $with
     *
     * @return mixed
     */
    public function findAll($column, $value, $with = []);

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function exists($column, $value);

    /**
     * Create.
     *
     * @param array $attributes
     *
     * @return mixed
     */
    public function create(array $attributes);

    /**
     * Update.
     *
     * @param $id
     * @param array $attributes
     *
     * @return mixed
     */
    public function update($id, array $attributes);

    /**
     * Delete.
     *
     * @param $id
     *
     * @return mixed
     */
    public function delete($id);

    /**
     * @return mixed
     */
    public function count();

    /**
     * @return mixed
     */
    public function latest();

    /**
     * @param array $with
     * @return mixed
     */
    public function make(array $with = []);

    /**
     * @param $relation
     * @param array $with
     * @return mixed
     */
    public function has($relation, array $with = []);

    /**
     * @param array $with
     * @param int $pages
     * @return mixed
     */
    public function paginate($with = [], $pages = 10);
}
