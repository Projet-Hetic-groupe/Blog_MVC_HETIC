<?php

namespace App\Model\Manager;

use App\Base\BaseManager;
use App\Model\Entity\Comment;

class CommentManager extends BaseManager
{
    public function getAllComments():array
    {
        $query = $this->pdo->query("select * from `Comment`");

        $comments = [];

        while ($data = $query->fetch(\PDO::FETCH_ASSOC)) {

            $comments[] = new Comment($data);

        }
        return $comments;
    }

    public function addComment($content,$authorId,$postId,$created_at,$updated_at):void
    {
        $sql = "INSERT INTO `Comment` (`content`,`authorId`,`postId`,`created_at`,`updated_at`) VALUES (:content, :authorId,:postId, :created_at,:updated_at)";
        $query = $this->pdo->prepare($sql);

        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':authorId', $authorId, \PDO::PARAM_STR);
        $query->bindValue(':postId', $postId , \PDO::PARAM_STR);
        $query->bindValue(':created_at', $created_at, \PDO::PARAM_STR);
        $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);

        $query->execute();
    }

    public function editComment($id,$content,$updated_at)
    {

        $sql = "update `Comment` set `content` = :content ,`updated_at` = :updated_at where `id` = $id";

        $query = $this->pdo->prepare($sql);

        $query->bindValue(':content', $content, \PDO::PARAM_STR);
        $query->bindValue(':updated_at', $updated_at, \PDO::PARAM_STR);

        $query->execute();
    }

    public function deleteComment($id){

        $sql = "DELETE FROM `Comment` WHERE `id` = $id";

        $query = $this->pdo->query($sql);

        $query->execute();
    }

}