<?php

namespace App\Controllers;

use View,
    Redirect,
    BaseController;
use App\Services\PostService;
use App\Exceptions\GeneralException;

/**
 * Class HomeController
 * @package App\Controllers
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class HomeController extends BaseController
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
     * Display the blog list
     * @return View
     */
    public function index()
    {
        return View::make('frontend.blog')->with('posts', $this->postService->getPublishPosts());
    }

    /**
     * Display the post detail
     * @return View
     */
    public function detail($id)
    {
        try {
            return View::make('frontend.blog-detail')->with('post', $this->postService->findById($id));
        } catch (GeneralException $e) {
            return Redirect::to('/');
        }
    }

    /**
     * Display the all post
     * @return View
     */
    public function all()
    {
        return View::make('frontend.blog-all')->with('posts', $this->postService->getAllPublishPosts());
    }

}
