<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Comment;

class CommentManager extends BaseManager
{
    public function getAllComments(): array
    {
        $query = $this->pdo->query("select * from `Comments`");
        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {
            $comments[] = new Comment($data);
        }

        return $comments;
    }

    public function editComment($id,$content,$authorId,$postId): void
    {
        $sql = "update `Comments` set `content` = :content ,`authorId` = :authorId,`postId` = :postId  where `id` = $id";

        $query = $this->pdo->prepare($sql);
        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR);
        $query->bindValue(':postId', $postId, \PDO::PARAM_STR);
        $query->execute();
    }

    public function deleteComment($id): void
    {

        $sql = "DELETE FROM `Comments` WHERE `id` = $id";

        $query = $this->pdo->query($sql);

        $query->execute();
    }

}