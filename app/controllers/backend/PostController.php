<?php

namespace App\Controllers\Backend;

use BaseController,
    Input,
    Redirect,
    Response,
    Validator,
    View;
use App\Services\PostService;
use Illuminate\Database\QueryException;
use App\Exceptions\GeneralException;
use App\Models\Post;

/**
 * Class PostController
 * @package App\Controllers\Backend
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class PostController extends BaseController
{

    /**
     * @var $postService
     */
    protected $postService;

    /**
     * @param PostService $postService

     */
    public function __construct(PostService $postService)
    {

        $this->postService = $postService;
    }

    /**
     * Display the post page
     * @return View
     */
    public function index()
    {
        return View::make('backend.post.post')->with(
                        'posts', $this->postService->getAllPosts()
        );
    }

    /**
     * Display the post add page
     * @return View
     */
    public function add()
    {
        return View::make('backend.post.post-add');
    }

    /**
     * Display the post edit page
     * @return View
     */
    public function edit($id)
    {
        try {
            return View::make('backend.post.post-edit')->with(
                            'post', $this->postService->findById($id)
            );
        } catch (GeneralException $e) {
            return Redirect::to('post');
        }
    }

    /**
     * Used to store post information
     * @return array $response
     */
    public function store()
    {

        try {
            $validator = Validator::make(Input::all(), Post::$rules);
            if ($validator->fails()) {
                $response['status'] = \Config::get('constants.ERROR');
                $response['message'] = 'Please fill the required field.';
            } else {
                $this->postService->save(Input::all());
                $response['status'] = \Config::get('constants.SUCCESS');
                $response['message'] = 'Post saved successfully.';
            }
        } catch (QueryException $e) {
            $response['status'] = \Config::get('constants.ERROR');
            $response['message'] = 'There was a problem due to duplicate post. Please try again.';
        }
        return Response::json($response);
    }

    /**
     * Used to update post information
     * @return array $response
     */
    public function update()
    {
        try {
            $validator = Validator::make(Input::all(), Post::$rules);
            if ($validator->fails()) {
                $response['status'] = \Config::get('constants.ERROR');
                $response['message'] = 'Please fill the required field.';
            } else {
                $this->postService->update(Input::all());
                $response['status'] = \Config::get('constants.SUCCESS');
                $response['message'] = 'Post updated successfully.';
            }
        } catch (QueryException $e) {
            $response['status'] = \Config::get('constants.ERROR');
            $response['message'] = 'There was a problem due to duplicate post. Please try again.';
        } catch (GeneralException $e) {
            $response['status'] = \Config::get('constants.ERROR');
            $response['message'] = $e->getMessage();
        }
        return Response::json($response);
    }

    /**
     * Used to delete post information
     * @param $id
     * @return array $response
     */
    public function destroy($id)
    {
        try {
            $this->postService->destroy($id);
            $response['status'] = \Config::get('constants.SUCCESS');
            $response['message'] = 'Post deleted successfully.';
        } catch (GeneralException $e) {
            $response['status'] = \Config::get('constants.ERROR');
            $response['message'] = 'There was a problem deleting this post. Please try again.';
        }
        return Response::json($response);
    }

}
