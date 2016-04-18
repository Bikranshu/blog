<?php

namespace App\Repositories\Post;

use App\Models\Post;
use Auth;
use App\Exceptions\GeneralException;
/**
 * Class EloquentPostRepository
 * @package App\Repositories\Post
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class EloquentPostRepository implements PostContract
{

    /**
     * @param $id
     * @return \Illuminate\Support\Collection|null|static
     * @throws GeneralException
     */
    public function findOrThrowException($id)
    {
        $post = Post::find($id);

        if (!is_null($post)) {
            return $post;
        }
        throw new GeneralException('That post does not exist.');
    }

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAllPosts($orderBy = 'created_at', $sort = 'desc')
    {
        return Post::orderBy($orderBy, $sort)->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getPublishPosts($orderBy = 'created_at', $sort = 'desc')
    {
        return Post::where('active', \Config::get('constants.PUBLISH_STATUS'))->orderBy($orderBy, $sort)->take(5)->get();
    }

    /**
     * @param string $orderBy
     * @param string $sort
     * @return mixed
     */
    public function getAllPublishPosts($orderBy = 'created_at', $sort = 'desc')
    {
        return Post::where('active', \Config::get('constants.PUBLISH_STATUS'))->orderBy($orderBy, $sort)->get();
    }

    /**
     * 
     * @return mixed
     */
    public function getPublishPostCount()
    {
        return Post::where('active', \Config::get('constants.PUBLISH_STATUS'))->get()->count();
    }

    /**
     * 
     * @return mixed
     */
    public function getDraftPostCount()
    {
        return Post::where('active', \Config::get('constants.DRAFT_STATUS'))->get()->count();
    }

    /**
     * @param $input
     */
    public function create($input)
    {
        $post = new Post;
        $post->author_id = Auth::user()->id;
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->slug = $input['slug'];
        $post->active = $input['active'];
        if ($post->save()) {
            \Log::info('Post saved succefully.', ['post_id' => $post->id]);
        }
    }

    /**
     * @param $id
     * @param $input
     */
    public function update($id, $input)
    {
        $post = $this->findOrThrowException($id);
        $post->author_id = Auth::user()->id;
        $post->title = $input['title'];
        $post->body = $input['body'];
        $post->slug = $input['slug'];
        $post->active = $input['active'];
        if ($post->update()) {
            \Log::info('Post updated succefully.', ['post_id' => $post->id]);
        }
    }

    /**
     * @param $id
     * @return bool
     * @throws GeneralException
     */
    public function destroy($id)
    {
        $post = $this->findOrThrowException($id);
        if ($post->delete()) {
            return true;
        }
        throw new GeneralException("There was a problem deleting this post. Please try again.");
    }

}
