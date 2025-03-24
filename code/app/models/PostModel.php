<?php
require_once __DIR__.'/../helpers/model-helpers.php';

class PostModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    /**
     * @param int $postId
     * @return array{post_id, username, post_title, post_body, post_image, post_date}
     * Array representing data of a single post, or null if no post with that id exists.
     */
    public function getPostById(int $postId): ?array {
        $statement = $this->db->prepare(<<<sql
            SELECT *
            FROM posts
            WHERE post_id = :postId
        sql);
        $statement->bindValue(":postId", $postId);

        $statement->execute();
        $result = $statement->fetch(PDO::FETCH_ASSOC);

        if (!empty($result)) {
            $result['post_image'] = addImageMimeType($result['post_image']);
        }

        return $result ? $result : null;
    }

    /**
     * @return array
     * Array of postData arrays, each with keys {post_id, username, post_title, post_body, post_image, post_date},
     * ordered by most recent post_date first.
     */
    public function getRecentPosts(): array {
        $statement = $this->db->query(<<<sql
            SELECT *
            FROM posts
            ORDER BY post_date DESC
        sql);

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as &$result) {
            $result['post_image'] = addImageMimeType($result['post_image']);
        }
        unset($result);
        return $results;
    }

    /**
     * @return array
     * Array of postData arrays, each with keys {post_id, username, post_title, post_body, post_image, post_date},
     * ordered by most liked first (but only includes posts from the last week)
     */
    public function getPopularPosts() {
        $statement = $this->db->query(<<<sql
            SELECT
                posts.post_id AS post_id,
                posts.username AS username,
                post_title,
                post_body,
                post_image,
                post_date
            FROM posts
                JOIN likes
                ON posts.post_id = likes.post_id
            WHERE
                post_date >= DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
            GROUP BY
                posts.post_id
            ORDER BY
                COUNT(likes.post_id) DESC, post_date DESC
        sql);

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as &$result) {
            $result['post_image'] = addImageMimeType($result['post_image']);
        }
        unset($result);
        return $results;
    }

    /**
     * @return array
     * Array of postData arrays for posts saved by this user,
     * each with keys {post_id, username, post_title, post_body, post_image, post_date},
     * ordered by most recent save_date first.
     */
    public function getSavedPosts($username): array {
        $statement = $this->db->prepare(<<<sql
            SELECT
                posts.post_id AS post_id,
                posts.username AS username,
                post_title,
                post_body,
                post_image,
                post_date
            FROM posts
                JOIN saves
                ON posts.post_id = saves.post_id
            WHERE
                saves.username = ?
            ORDER BY
                save_date DESC
        sql);
        $statement->execute([$username]);

        $results = $statement->fetchAll(PDO::FETCH_ASSOC);
        foreach ($results as &$result) {
            $result['post_image'] = addImageMimeType($result['post_image']);
        }
        unset($result);
        return $results;
    }

    public function createPost(array $postData) {
        //write out all details of the post
        $imageBlob = file_get_contents($postData['post_image']['tmp_name']);

        $statement = $this->db->prepare(<<<SQL
            INSERT INTO posts(username, post_title, post_body, post_image)
            VALUES (?, ?, ?, ?);
        SQL);

        $statement->bindValue(1, $postData['username']);    
        $statement->bindValue(2, $postData['post_title']);
        $statement->bindValue(3, $postData['post_body']);
        $statement->bindValue(4, $imageBlob);
        
        $statement->execute();
    }

    public function updatePost(array $postData) {
        //TODO
    }

    public function deletePost(int $postId) {
        //TODO
    }
}

?>