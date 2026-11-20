<?php

declare(strict_types=1);

namespace App\Controller;

final class AuthController extends AppController
{
    private const TEST_EMAIL = '123@123.com';
    private const TEST_PASSWORD = '123';
    private const MODERATOR_EMAIL = 'moderator@radarciszy.pl';
    private const MODERATOR_PASSWORD = 'moderator123';

    public function login(): void
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/');
        }

        $error = null;

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');

            $registeredUsers = $_SESSION['registered_users'] ?? [];
            $storedPassword = is_array($registeredUsers[$email] ?? null)
                ? (string) $registeredUsers[$email]['password']
                : null;

            if ($email === '' && $password === '') {
                $error = null;
            } elseif (
                (hash_equals(self::TEST_EMAIL, $email)
                    && hash_equals(self::TEST_PASSWORD, $password))
                || (hash_equals(self::MODERATOR_EMAIL, $email)
                    && hash_equals(self::MODERATOR_PASSWORD, $password))
                || ($storedPassword !== null && password_verify($password, $storedPassword))
            ) {
                session_regenerate_id(true);
                $_SESSION['authenticated'] = true;
                $_SESSION['role'] = hash_equals(self::TEST_EMAIL, $email)
                    || hash_equals(self::MODERATOR_EMAIL, $email)
                        ? 'moderator'
                        : (string)($registeredUsers[$email]['role'] ?? 'user');
                $this->redirect('/');
            } else {
                $error = 'Nieprawidłowy adres e-mail lub hasło.';
            }
        }

        $this->render('login', [
            'pageTitle' => 'Logowanie — Radar Ciszy',
            'error' => $error,
        ]);
    }

    public function register(): void
    {
        if ($this->isAuthenticated()) {
            $this->redirect('/');
        }

        $error = null;
        $email = '';

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim((string) ($_POST['email'] ?? ''));
            $password = (string) ($_POST['password'] ?? '');
            $passwordConfirmation = (string) ($_POST['password_confirmation'] ?? '');
            $registeredUsers = $_SESSION['registered_users'] ?? [];

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'Podaj poprawny adres e-mail.';
            }
            // Walidacja długości hasła jest tymczasowo wyłączona dla testów.
            // elseif (strlen($password) < 6) {
            //    $error = 'Hasło musi mieć co najmniej 6 znaków.';
            // }
            elseif ($password !== $passwordConfirmation) {
                $error = 'Hasła muszą być identyczne.';
            } elseif (isset($registeredUsers[$email])) {
                $error = 'Konto z tym adresem e-mail już istnieje.';
            } else {
                $registeredUsers[$email] = [
                    'password' => password_hash($password, PASSWORD_DEFAULT),
                    'role' => 'user',
                ];
                $_SESSION['registered_users'] = $registeredUsers;
                session_regenerate_id(true);
                $_SESSION['authenticated'] = true;
                $_SESSION['role'] = 'user';
                $this->redirect('/');
            }
        }

        $this->render('register', [
            'pageTitle' => 'Rejestracja - Radar Ciszy',
            'error' => $error,
            'email' => $email,
        ]);
    }

    public function logout(): void
    {
        $_SESSION = [];
        session_destroy();
        $this->redirect('/');
    }
}
