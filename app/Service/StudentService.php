<?php

namespace App\Service;

use App\Repository\Interfaces\StudentRepositoryInterface;

/**
 * Service class for handling Student related operations.
 */
class StudentService
{
    /**
     * Constructor method.
     *
     * @param StudentRepositoryInterface $studentRepository The repository instance.
     */
    public function __construct(
        public StudentRepositoryInterface $studentRepository
    ) {
    }

    /**
     * Retrieve the first Student record matching the criteria.
     *
     * @param array $where Conditions to match.
     * @param array $with  Relationships to load.
     * @return mixed The first matching record.
     */
    public function firstStudent(array $where = [], array $with = [])
    {
        return $this->studentRepository->first(
            where: $where,
            with: $with
        );
    }

    /**
     * Retrieve all Student records matching the criteria.
     *
     * @param array $where Conditions to match.
     * @param array $with  Relationships to load.
     * @return mixed The collection of matching records.
     */
    public function getStudent(array $where = [], array $with = [])
    {
        return $this->studentRepository->get(
            where: $where,
            with: $with
        );
    }

    /**
     * Create a new Student record.
     *
     * @param array $data Data for the new record.
     * @return mixed The created record.
     */
    public function createStudent(array $data = [])
    {
        return $this->studentRepository->create(
            data: $data
        );
    }

    /**
     * Update existing Student records matching the criteria.
     *
     * @param array $where Conditions to match.
     * @param array $data  Data to update.
     * @return mixed The result of the update operation.
     */
    public function updateStudent(array $where = [], array $data = [])
    {
        return $this->studentRepository->update(
            where: $where,
            data: $data
        );
    }

    /**
     * Delete Student records matching the criteria.
     *
     * @param array $where Conditions to match.
     * @return mixed The result of the delete operation.
     */
    public function deleteStudent(array $where = [])
    {
        return $this->studentRepository->delete(
            where: $where
        );
    }
}
