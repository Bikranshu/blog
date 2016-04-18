<?php

namespace App\Controllers\Backend;

use Auth,
    BaseController,
    Form,
    Input,
    Redirect,
    View;
use App\Services\PostService;

/**
 * Class DashboardController
 * @package App\Controllers\Backend
 * @author Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 */
class DashboardController extends BaseController
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
     * Display the dashboard page
     * @return View
     */
    public function index()
    {
        return View::make('backend.dashboard.dashboard')->with([
                        'totalCount'=> count($this->postService->getAllPosts()),
                        'publishCount'=> $this->postService->getPublishPostCount(), 
                        'draftCount'=> $this->postService->getDraftPostCount()
        ]);
    }

}
