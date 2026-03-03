<?php
namespace App\Models;

class PostModel extends BaseModel {

    /**
     * Get posts
     */
    public function get($filter = [], $limit = NULL, $offset = NULL) {

        // Prepare where
        $where = [];
        $like = [];

        // Filter: id
        if (!empty($filter['id'])) {
            $where['id'] = $filter['id'];
        }

        // Filter: user_id
        if (!empty($filter['creator_user_id'])) {
            $where['creator_user_id'] = $filter['creator_user_id'];
        }

        // Filter: search
        if (!empty($filter['search'])) {
            $like['message'] = '%'.$filter['search'].'%';
        }

        // Build query
        $query = "SELECT * FROM posts WHERE 1 = 1";

        // Check for where
        if (!empty($where)) {
            $where_fields = [];
            foreach ($where as $key => $value) {
                $where_fields[] = $key.' = "'.$value.'"';
            }
            $where_fields = implode(' AND ', $where_fields);
            $query .= ' AND ' . $where_fields;
        }

        // Check for like
        if (!empty($like)) {
            $like_fields = [];
            foreach ($like as $key => $value) {
                $like_fields[] = $key.' LIKE "'.$value.'"';
            }
            $like_fields = implode(' AND ', $like_fields);
            $query .= ' AND ' . $like_fields;
        }

        // Check for limit and offset
        if (!empty($offset) && !empty($limit)) {
            $query .= " LIMIT $limit OFFSET $offset";
        }

        // Run $query
        $query .= ';';
        return $this->db->query($query);
    }

    /**
     * Create new post
     */
    public function create($post = []) {
        $post['created_at'] = date('Y-m-d H:i:s');
        $post['modified_at'] = date('Y-m-d H:i:s');

        return $this->db->insert('posts', $post);
    }
}