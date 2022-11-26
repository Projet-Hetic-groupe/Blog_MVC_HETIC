<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Comment;

class CommentManager extends BaseManager
{
    public function getAllComments(): array
    {
        $query = $this->pdo->query("select * from `Comment`");
        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }


    public function addComment($content,$authorId,$created_at,$updated_at,$postId):void
    {
      
            $sql = "INSERT INTO `Comment` (`content`,`authorId`,`created_at`,`updated_at`,'postId') VALUES (:content, :authorId, :created_at,:updated_at,:postId)";
            $query = $this->pdo->prepare($sql);

            $query->bindValue(':content', $content, \PDO::PARAM_STR);
            $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR);
            $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
            $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);
            $query->bindValue(':postId', $postId, \PDO::PARAM_STR);
       
        $query->execute();

    }

    public function editComment($id,$content,$authorId,$postId): void
    {
        $sql = "update `Comment` set `content` = :content ,`authorId` = :authorId  where `id` = $id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR); 
        $query->execute();
    }

    public function deleteComments($id): void
    {

        $sql = "DELETE FROM `Comment` WHERE `id` = $id";

        $query = $this->pdo->query($sql);

        $query->execute();
    }

}