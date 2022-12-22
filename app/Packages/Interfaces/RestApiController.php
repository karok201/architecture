<?php

namespace App\Packages\Interfaces;

interface RestApiController
{
    public function index();

    public function show(int $id);

    public function store();

    public function update(int $id);

    public function destroy(int $id);
}
