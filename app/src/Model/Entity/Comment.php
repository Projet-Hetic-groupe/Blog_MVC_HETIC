<?php

namespace App\Model\Entity;

use App\Base\BaseEntity;

final class Comment extends BaseEntity
{
    private int $id;
    private string $content;
    private string $authorId;
    private string $image;
    private \DateTime $created_at;
    private \DateTime $updated_at;
    private int $postId;
    private ?int $commentId;

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
    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @param string $image
     * @return Comment
     */
    public function setImage(string $image): Comment
    {
        $this->image = $image;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedAt(): \DateTime
    {
        return $this->created_at;
    }

    /**
     * @param \DateTime $created_at
     * @return Comment
     */
    public function setCreatedAt(\DateTime $created_at): Comment
    {
        $this->created_at = $created_at;
        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getUpdatedAt(): \DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param \DateTime $updated_at
     * @return Comment
     */
    public function setUpdatedAt(\DateTime $updated_at): Comment
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