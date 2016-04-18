<?php

namespace App\Repositories\Post;

/**
 * Interface PostContract
 * @package App\Repositories\Post
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
interface PostContract
{

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     * @throws GeneralException
     */
    public function findOrThrowException($id);

    /**
     * get all posts
     * @param string $orderBy
     * @param string $sort
     * @return array
     */
    public function getAllPosts($orderBy = 'id', $sort = 'desc');

    /**
     * get only 5 publish posts
     * @param string $orderBy
     * @param string $sort
     * @return array
     */
    public function getPublishPosts($orderBy = 'created_at', $sort = 'desc');

    /**
     * get all publish posts
     * @param string $orderBy
     * @param string $sort
     * @return array
     */
    public function getAllPublishPosts($orderBy = 'created_at', $sort = 'desc');

    /**
     * get count publish posts
     * @return int
     */
    public function getPublishPostCount();

    /**
     * get count draft posts
     * @return int
     */
    public function getDraftPostCount();

    /**
     * create post
     * @param $input
     */
    public function create($input);

    /**
     * update post
     * @param $id
     * @param $input
     */
    public function update($id, $input);

    /**
     * delete post
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id);
}
