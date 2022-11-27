<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private string $authorId;
    private string $created_at;
    private string $updated_at;
    private int $postId;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     * @return Comment
     */
    public function setId(int $id): Comment
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent(): string
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Comment
     */
    public function setContent(string $content): Comment
    {
        $this->content = $content;
        return $this;
    }

    /**
     * @return string
     */
    public function getAuthorId(): string
    {
        return $this->authorId;
    }

    /**
     * @param string $authorId
     * @return Comment
     */
    public function setAuthorId(string $authorId): Comment
    {
        $this->authorId = $authorId;
        return $this;
    }

    /**
     * @return string
     */
    public function getCreated_at(): string
    {
        return $this->created_at;
    }

    /**
     * @param string $created_at
     * @return Comment
     */
    public function setCreated_at(string $created_at): Comment
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdated_at(): string
    {
        return $this->updated_at;
    }

    /**
     * @param string $updated_at
     * @return Comment
     */
    public function setUpdated_at(string $updated_at): Comment
    {
        $this->updated_at = $updated_at;
        return $this;
    }

    /**
     * @return int
     */
    public function getPostId(): int
    {
        return $this->postId;
    }

    /**
     * @param int $postId
     * @return Comment
     */
    public function setPostId(int $postId): Comment
    {
        $this->postId = $postId;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getCommentId(): ?int
    {
        return $this->commentId;
    }

    /**
     * @param int|null $commentId
     * @return Comment
     */
    public function setCommentId(?int $commentId): Comment
    {
        $this->commentId = $commentId;
        return $this;
    }
}