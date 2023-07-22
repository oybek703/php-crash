<?php

class Users extends Controller
{
    private User $userModel;

    public function __construct()
    {
        $this->userModel = $this->model('User');
    }

    // Register user
    public function register(): void
    {
        // Check POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form

            // Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];

            // Validate name
            if (empty($data['name'])) {
                $data['name_error'] = 'Please enter a name!';
            }

            // Validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter a email!';
            } else {
                if ($this->userModel->checkIfEmailExists($data['email'])) {
                    $data['email_error'] = 'User with this email already exists!';
                }
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter a password!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password must be contain at least 6 characters!';
            }

            // Validate confirm_password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_error'] = 'Please confirm password!';
            } elseif ($data['confirm_password'] != $data['password']) {
                $data['confirm_password_error'] = 'Passwords should match!';
            }

            // Make sure errors are empty
            if (empty($data['name_error']) && empty($data['email_error']) && empty($data['password_error']) && empty($data['confirm_password_error'])) {
                // Validated
                // Hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);

                if ($this->userModel->register($data)) {
                    flash('register_success', 'You are now registered and can login!');
                    redirect('/users/login');
                } else {
                    die('Something went wrong!');
                }
            } else {
                $this->view('users/register', $data);
            }
        } else {
            if (isUserLoggedIn()) {
                redirect('/');
            }
            // Load view
            $data = [
                'name' => '',
                'email' => '',
                'password' => '',
                'confirm_password' => '',
                'name_error' => '',
                'email_error' => '',
                'password_error' => '',
                'confirm_password_error' => '',
            ];
            $this->view('users/register', $data);
        }
    }


    // Register user
    public function login(): void
    {
        // Check POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Process form

            // Sanitize data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'email' => trim($_POST['email']),
                'password' => trim($_POST['password']),
                'email_error' => '',
                'password_error' => '',
            ];

            // Validate email
            if (empty($data['email'])) {
                $data['email_error'] = 'Please enter a email!';
            }

            // Validate password
            if (empty($data['password'])) {
                $data['password_error'] = 'Please enter a password!';
            } elseif (strlen($data['password']) < 6) {
                $data['password_error'] = 'Password must be contain at least 6 characters!';
            }

            // Check for user/email
            if ($this->userModel->checkIfEmailExists($data['email'])) {
                // User found
                // Continue
            } else {
                $data['email_error'] = 'User not found!';
            }

            // Make sure errors are empty
            if (empty($data['email_error']) && empty($data['password_error'])) {
                // Validated
                // Check and set logged-in user
                $logged_in_user = $this->userModel->login($data['email'], $data['password']);
                if ($logged_in_user) {
                    // Create session
                    $this->createUserSession($logged_in_user);
                } else {
                    $data['password_error'] = 'Invalid password';
                    $this->view('users/login', $data);
                }
            } else {
                $this->view('users/login', $data);
            }
        } else {
            if (isUserLoggedIn()) {
                redirect('/');
            }
            // Load view
            $data = [
                'email' => '',
                'password' => '',
                'email_error' => '',
                'password_error' => '',
            ];
            $this->view('users/login', $data);
        }
    }

    public function createUserSession($user): void
    {
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_email'] = $user->email;
        $_SESSION['user_name'] = $user->name;
        redirect('/posts/index');
    }

    public function logout(): void
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_email']);
        unset($_SESSION['user_name']);
        session_destroy();
        redirect('/users/login');
    }

}