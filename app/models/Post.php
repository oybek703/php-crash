<?php

class Post
{
    private Database $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getPosts()
    {
        $this->db->query('
        SELECT 
            posts.id as postId, 
            title as postTitle,
            posts.body as body,
            users.name as user,
            posts.created_at as postCreatedDate
        FROM posts 
        INNER JOIN users ON posts.user_id=users.id
        ORDER BY posts.created_at DESC
       ');
        return $this->db->resultSet();
    }

    public function addPost($data): bool
    {
        $this->db->query('INSERT INTO posts(title, body, user_id) VALUES(:title, :body, :user_id)');
        // Bind values
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':user_id', $data['user_id']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }

    }

    public function updatePost($data): bool
    {
        $this->db->query('UPDATE posts SET title=:title, body=:body  WHERE id=:id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':title', $data['title']);
        $this->db->bind(':body', $data['body']);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function deletePost($post_id) {
        $this->db->query('DELETE FROM posts WHERE id=:id');
        // Bind post id
        $this->db->bind(':id', $post_id);

        // Execute
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getPostById($id) {
        $this->db->query('SELECT * FROM posts where id=:id');
        // Bind id
        $this->db->bind(':id', $id);

        return $this->db->singleSet();
    }

}