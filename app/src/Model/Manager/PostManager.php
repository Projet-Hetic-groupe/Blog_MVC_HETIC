<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Post;
use App\Model\Entity\User;

class PostManager extends BaseManager
{

    /**
     * @return Post[]
     */
    public function getAllPosts(): array{

        $query = $this->pdo->query("select Users.login, Post.* from `Post` inner join `Users` on Post.authorId = Users.id;");
//        $query = $this->pdo->query("select * from Post");
        $posts = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {

            $posts[] = new Post($data);
        }


        return $posts;
    }
}
