<?php

namespace App\Repository\Classes;

use App\Repository\Interfaces\StudentRepositoryInterface;
use App\Models\Student;

/**
 * Class StudentRepositoryClass
 * Implements StudentRepositoryInterface for managing Student
 */
class StudentRepositoryClass implements StudentRepositoryInterface
{
    /**
     * Constructor to inject the model dependency
     * 
     * @param Student $model
     */
    public function __construct(
        public Student $model
    ) {
    }

    /**
     * Retrieve the first Student matching the given criteria.
     *
     * @param array $where Conditions to filter the query.
     * @param array $with  Relationships to load with the query.
     * @return mixed       The first Student that matches the criteria.
     */
    public function first(array $where = [], array $with = [])
    {
        return $this->model
               ->where($where)
               ->with($with)
               ->first();
    }

    /**
     * Retrieve all Student matching the given criteria.
     *
     * @param array $where Conditions to filter the query.
     * @param array $with  Relationships to load with the query.
     * @return mixed       A collection of Student that match the criteria.
     */
    public function get(array $where = [], array $with = [])
    {
        return $this->model
               ->where($where)
               ->with($with)
               ->get();
    }

    /**
     * Create a new Student with the given data.
     *
     * @param array $data Data to create a new Student.
     * @return mixed      The created Student.
     */
    public function create(array $data = [])
    {
        return $this->model->create($data);
    }

    /**
     * Update Student matching the given criteria with the provided data.
     *
     * @param array $where Conditions to filter the query.
     * @param array $data  Data to update the Student(s).
     * @return mixed       The result of the update operation.
     */
    public function update(array $where = [], array $data = [])
    {
        return $this->model
               ->where($where)
               ->update($data);
    }

    /**
     * Delete Student matching the given criteria.
     *
     * @param array $where Conditions to filter the query.
     * @return mixed       The result of the delete operation.
     */
    public function delete(array $where = [])
    {
        return $this->model
               ->where($where)
               ->delete();
    }
    
    public function updateOrCreate(array $where = [],array $data = [])
    {
        return $this->model->updateOrCreate($where,$data);
    }
    
}
