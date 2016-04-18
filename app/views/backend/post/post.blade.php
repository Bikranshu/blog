@extends('backend.layouts.master')

@section('page-header')
<h1>
    Post
</h1>
@endsection

@section('breadcrumbs')
<li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
<li class="active">Post</li>
@endsection

@section('content')

<div class="row">
    <div class="col-xs-12">
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Post List:</h3>
                <div class="pull-right box-tools">
                    <a href="post/add" class="btn btn-info" role="button" title="Add Post"><i class="glyphicon glyphicon-plus"></i>&nbsp;Add Post</a>
                </div>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-success post-list-success-message" style="display: none">
                </div>
                <table id="post" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th style="padding-right: 5px">SN</th>
                            <th>Author Name</th>
                            <th>Title</th>
                            <th>Created At</th>
                            <th>Status</th>
                            <th style="text-align: center;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($posts))
                        <?php $i = 1; ?>
                        @foreach ($posts as $post)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $post->author->name }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td>{{ $post->active_label }}</td>
                            <td style="text-align: center; ">
                                <a href="/post/edit/{{ $post->id }}" title="Edit"><i class="glyphicon glyphicon-pencil"></i></a>
                                <a href="javascript:void(0)" title="Remove" class="post-delete-btn" data-toggle='modal' data-target='#post-confirm-modal'  data-id='{{ $post->id }}'><i class="glyphicon glyphicon-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
@include('backend.post.post-conform-model')
@endsection
