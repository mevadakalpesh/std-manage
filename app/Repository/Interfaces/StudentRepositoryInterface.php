<?php

namespace App\Repository\Interfaces;

interface StudentRepositoryInterface 
{
    public function first(array $where = [], array $with = []);
    public function get(array $where = [], array $with = []);
    public function create(array $data = []);
    public function update(array $where = [], array $data = []);
    public function delete(array $where = []);
    public function updateOrCreate(array $where = [],array $data = []);
}
