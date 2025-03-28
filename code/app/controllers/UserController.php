<?php

require_once __DIR__.'/../models/UserModel.php';
require_once __DIR__.'/../authentication/AuthService.php';

class UserController {
    private $userModel;

    public function __construct(PDO $db) {
        $this->userModel = new UserModel($db);
    }

    public function register() {
        // If form is not submitted, just display the page:
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $isLoggedIn = AuthService::isLoggedIn();
            $isAdmin = AuthService::isAdmin();

            // this view uses: $isLoggedIn, $isAdmin
            require __DIR__.'/../views/register-view.php';
        }
        else {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $userExists = $this->userModel->checkUserExists($username, $email);

            if (!$userExists) {
                $this->userModel->createUser([
                    'username'  => $_POST['username'],
                    'email'     => $_POST['email'],
                    'password'  => $_POST['password'],
                    'image'     => $_FILES['profile-picture'],
                    'bio'       => 'This user has not added a bio yet.'
                ]);
        
                //redirect to another page
                header('Location: /login');
                exit;
            } else {
                $_SESSION['invalid_registration'] = 'Username or email is already registered.';
                header('Location: /register');
                exit;
            }
        }
    }

    public function login() {
        // If form is not submitted, display the page:
        if ($_SERVER['REQUEST_METHOD'] != 'POST') {
            $isLoggedIn = AuthService::isLoggedIn();
            $isAdmin = AuthService::isAdmin();

            // this view uses: $isLoggedIn, $isAdmin
            require __DIR__.'/../views/login-view.php';
        }
        // Otherwise, handle the submission:
        else {
            if (!isset($_POST['email']) || empty($_POST['email'])) {
                header('Location: /login');
            }
            if (!isset($_POST['password']) || empty($_POST['password'])) {
                header('Location: /login');
            }

            $email = $_POST['email'];
            $password = $_POST['password'];
            $user = $this->userModel->validateUserLogin($email, $password);

            if ($user) {
                // Store user session data
                $_SESSION['username'] = $user['username'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['profile-picture'] = $user['profile-picture'];
                $_SESSION['role'] = $user['role'];

                if ($_SESSION['role'] === 'admin') {
                    header('Location: /admin');
                    exit;
                } else {
                    header('Location: /home');
                    exit;
                }
            }
            else {
                $_SESSION['invalid_login'] = 'Email or password is invalid.';
                header('Location: /login');
                exit;
            }
        }
    }

    public function logout() {
        // Remove all session variables and destroy the session
        session_unset();
        session_destroy();
        header('Location: /login');
        exit;
    }

    public function updateSettings() {
        //TODO
    }

}

?>