<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Packages\Infrastructure\Request;
use App\Packages\Infrastructure\View;
use App\Packages\UseCases\Validator;
use JetBrains\PhpStorm\NoReturn;

class AuthenticatedSessionController
{
    private Validator $validator;

    public function __construct()
    {
        $this->validator = new Validator();
    }

    public function create(): View
    {
        return new View('login');
    }

    // @TODO: Сделать обработчик ошибок
    public function store(): View|string
    {
        $request = new Request();

        $data = $this->validator->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], $request->all());

        User::authenticate();

        session_regenerate_id();

        return json_encode($data);
    }

    public function destroy()
    {}
}
