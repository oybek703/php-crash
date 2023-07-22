<?php

class Posts extends Controller
{
    private Post $postModel;
    private User $userModel;

    public function __construct()
    {
        if (!isUserLoggedIn()) {
            redirect('/users/login');
        }
        $this->postModel = $this->model('Post');
        $this->userModel = $this->model('User');
    }

    public function index()
    {
        $posts = $this->postModel->getPosts();
        $data = ['posts' => $posts];
        $this->view('posts/index', $data);
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, $_POST, FILTER_SANITIZE_STRING);
            $data = [
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => ''
            ];
            // Validate data
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body';
            }
            if (empty($data['title_error']) && empty($data['body_error'])) {
                if ($this->postModel->addPost($data)) {
                    flash('post_message', 'Post added!');
                    redirect('/posts');
                } else {
                    die('Something went wrong!');
                }
            } else {
                $this->view('posts/add', $data);
            }
        } else {
            $data = ['title' => '', 'body' => ''];
            $this->view('posts/add', $data);
        }

    }

    public function show($id)
    {
        $post = $this->postModel->getPostById($id);
        $user = $this->userModel->getUserById($post->user_id);
        $data = [
            'post' => $post,
            'user' => $user
        ];
        $this->view('posts/show', $data);
    }

    public function edit($id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $_POST = filter_input_array(INPUT_POST, $_POST, FILTER_SANITIZE_STRING);
            $data = [
                'id' => $id,
                'title' => trim($_POST['title']),
                'body' => trim($_POST['body']),
                'user_id' => $_SESSION['user_id'],
                'title_error' => '',
                'body_error' => ''
            ];
            // Validate data
            if (empty($data['title'])) {
                $data['title_error'] = 'Please enter title';
            }
            if (empty($data['body'])) {
                $data['body_error'] = 'Please enter body';
            }
            if (empty($data['title_error']) && empty($data['body_error'])) {
                if ($this->postModel->updatePost($data)) {
                    flash('post_message', 'Post updated!');
                    redirect('/posts');
                } else {
                    die('Something went wrong!');
                }
            } else {
                $this->view('posts/edit', $data);
            }
        } else {
            $post = $this->postModel->getPostById($id);
            if ($post->user_id != $_SESSION['user_id']) {
                redirect('/posts');
            }
            $data = ['id' => $id, 'title' => $post->title, 'body' => $post->body];
            $this->view('posts/edit', $data);
        }

    }

    public function delete($post_id)
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $post = $this->postModel->getPostById($post_id);
            if ($post->user_id !== $_SESSION['user_id']) {
                redirect('/posts');
            }
            if ($this->postModel->deletePost($post_id)) {
                flash('post_message', 'Post deleted!');
                redirect('/posts');
            } else {
                die('Something went wrong!');
            }
        } else {
            redirect('/posts');
        }


    }

}