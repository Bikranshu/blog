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
     * @return mixed
     */
    public function findOrThrowException($id);

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAllPosts($orderBy = 'id', $sort = 'desc');

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getPublishPosts($orderBy = 'created_at', $sort = 'desc');

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAllPublishPosts($orderBy = 'created_at', $sort = 'desc');

    /**
     * 
     * @return mixed
     */
    public function getPublishPostCount();

    /**
     * 
     * @return mixed
     */
    public function getDraftPostCount();

    /**
     * @param $account
     * @return mixed
     */
    public function create($account);

    /**
     * @param $id
     * @param $account
     * @return mixed
     */
    public function update($id, $account);

    /**
     * @param $id
     * @return mixed
     */
    public function destroy($id);
}
