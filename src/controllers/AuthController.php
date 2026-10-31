<?php

declare(strict_types=1);

namespace App\Controller;

final class AuthController extends AppController
{
    private const TEST_EMAIL = '123@123.com';
    private const TEST_PASSWORD = '123';

    public function login(): void
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/places/add');
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');

            if (
                hash_equals(self::TEST_EMAIL, $email)
                && hash_equals(self::TEST_PASSWORD, $password)
            ) {
                session_regenerate_id(true);
                $_SESSION['authenticated'] = true;
                $this->redirect('/places/add');
            }

            $error = 'Nieprawidłowy adres e-mail lub hasło.';
        }

        $this->render('login', [
            'pageTitle' => 'Logowanie — Radar Ciszy',
            'error' => $error,
        ]);
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }
}
