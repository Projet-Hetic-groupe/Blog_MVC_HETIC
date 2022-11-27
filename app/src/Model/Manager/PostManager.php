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

    public function addPost($title,$content,$authorId,$image,$created_at,$updated_at):void
    {


        if($image === NULL){
            $sql = "INSERT INTO `Post` (`title`,`content`,`authorId`,`created_at`,`updated_at`) VALUES (:title, :content, :authorId, :created_at,:updated_at)";
            $query = $this->pdo->prepare($sql);

            $query->bindValue(':title', $title, \PDO::PARAM_STR);

            $query->bindValue(':content', $content, \PDO::PARAM_STR);
            $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR);
            $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
            $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);
        }else{
            $sql = "INSERT INTO `Post` (`title`,`content`,`authorId`,`image`,`created_at`,`updated_at`) VALUES (:title, :content, :authorId,:image,:created_at,:updated_at)";
            $query = $this->pdo->prepare($sql);

            $query->bindValue(':title', $title, \PDO::PARAM_STR);

            $query->bindValue(':content', $content, \PDO::PARAM_STR);
            $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR);
            $query->bindValue(':password', $image, \PDO::PARAM_STR);
            $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
            $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);
        }

        $query->execute();

    }

    public function editPost($id,$title,$content,$updated_at){

        $sql = "update `Post` set `title` = :title ,`content` = :content,`updated_at` = :updated_at where `id` = $id";
        $query = $this->pdo->prepare($sql);
        $query->bindValue(':title', $title, \PDO::PARAM_STR);
        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);
        $query->execute();
    }

    public function deletePost($id){

        $sql = "DELETE FROM `Post` WHERE `id` = $id";

        $query = $this->pdo->query($sql);

        $query->execute();
    }
}
