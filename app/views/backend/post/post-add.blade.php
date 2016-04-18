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
            <div class="box-header with-border">
                <h3 class="box-title">Add Post:</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
                <div class="alert alert-success post-success-message" style="display: none"></div>
                <div class="alert alert-error post-error-message" style="display: none"></div>
                <div class="row">
                    <div class="col-xs-10">
                        {{ Form::open(['class' => 'form-horizontal','id' => 'post-add-form', 'role' => 'form', 'method' => 'POST']) }}
                        <div class="form-group">
                            <label for="title" class="control-label col-xs-3">Title</label>
                            <div class="col-xs-9">
                                <?php echo Form::text('title', '', array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Title')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="body" class="control-label col-xs-3">Content</label>
                            <div class="col-xs-9">
                                {{ Form::textarea('body', '', array('id' => 'body', 'class' => 'form-control tinymce')) }}
                            </div>
                        </div>  
                        <div class="form-group">
                            <label for="slug" class="control-label col-xs-3">Slug</label>
                            <div class="col-xs-9">
                                <?php echo Form::text('slug', '', array('id' => 'slug', 'class' => 'form-control', 'placeholder' => 'Slug')); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="active" class="control-label col-xs-3">Status</label>
                            <div class="col-xs-9">
                                <select class="form-control" name="active" id="active">
                                    <option value="">Select Status</option>
                                    <option value="1">Publish</option>
                                    <option value="0">Draft</option>
                                </select>
                            </div>
                        </div> 

                        <div class="form-group">
                            <label class="control-label col-xs-3"></label>
                            <div class="col-xs-9">
                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                        {{ Form::close() }} 
                    </div>
                </div>
            </div><!-- /.box-body --> 
        </div><!-- /.box -->
    </div><!-- /.col -->
</div><!-- /.row -->
@endsection
