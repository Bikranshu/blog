<?php

namespace App\Services;

use App\Repositories\Post\PostContract;
use App\Exceptions\GeneralException;

/**
 * Class PostService
 * @package App\Services
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class PostService
{

    /**
     * @var PostContract
     */
    protected $posts;

    /**
     * @param PostContract $posts
     * 
     */
    public function __construct(PostContract $posts)
    {
        $this->posts = $posts;
    }

    /**
     * get all posts
     * @return array
     */
    public function getAllPosts()
    {
        return $this->posts->getAllPosts();
    }

    /**
     * get only 5 publish posts
     * @return array
     */
    public function getPublishPosts()
    {
        return $this->posts->getPublishPosts();
    }

    /**
     * get all publish posts
     * @return array
     */
    public function getAllPublishPosts()
    {
        return $this->posts->getAllPublishPosts();
    }

    /**
     * get count publish posts
     * @return int
     */
    public function getPublishPostCount()
    {
        return $this->posts->getPublishPostCount();
    }

    /**
     * get count draft posts
     * @return int
     */
    public function getDraftPostCount()
    {
        return $this->posts->getDraftPostCount();
    }

    /**
     * get post by id
     * @param integer $id
     * @return array
     */
    public function findById($id)
    {
        return $this->posts->findOrThrowException($id);
    }

    /**
     *
     * @param array $post
     */
    public function save($post)
    {
        $this->posts->create($post);
    }

    /**
     * @param array $post
     * @throws GeneralException
     */
    public function update($post)
    {
        try {
            $this->posts->update($post['id'], $post);
        } catch (GeneralException $e) {
            throw new GeneralException($e->getMessage());
        }
    }

    /**
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id)
    {
        return $this->posts->destroy($id);
    }

}
