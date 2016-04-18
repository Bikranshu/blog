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
     * 
     * @return mixed
     */
    public function getAllPosts()
    {
        return $this->posts->getAllPosts();
    }

    /**
     * 
     * @return mixed
     */
    public function getPublishPosts()
    {
        return $this->posts->getPublishPosts();
    }

    /**
     * @return mixed
     */
    public function getAllPublishPosts()
    {
        return $this->posts->getAllPublishPosts();
    }

    /**
     * 
     * @return mixed
     */
    public function getPublishPostCount()
    {
        return $this->posts->getPublishPostCount();
    }

    /**
     * 
     * @return mixed
     */
    public function getDraftPostCount()
    {
        return $this->posts->getDraftPostCount();
    }

    /**
     * @param integer $id
     * @return mixed
     */
    public function findById($id)
    {
        return $account = $this->posts->findOrThrowException($id);
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
