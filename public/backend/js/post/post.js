/* post.js
 * ================
 * Post module jquery code.
 *
 * @author  Krishna Prasad Timilsina <bikranshu.t@gmail.com>
 * @version 1.0
 */
var blog = blog || {};

;(function ($post, $common) {
    "use strict";

    var baseUrl = $common.getBaseUrl();

    /**
     * Validation initializer
     * @param {string} formId
     */
    $post.validation = function (formId) {
        $(formId).validate({
            rules: {
                title: {
                    required: true
                },
                body: {
                    required: true
                },
                slug: {
                    required: true
                },
                active: {
                    required: true
                }
            },
            messages: {
                title: {
                    required: "(This field is required.)"
                },
                body: {
                    required: "(This field is required.)"
                },
                slug: {
                    required: "(This field is required.)"
                },
                active: {
                    required: "(This field is required.)"
                }
            },
            highlight: function (element) {
                if ($(element).parent().parent().parent('.checkbox-group').length) {
                    $(element).parent().parent().parent('.checkbox-group').addClass('has-error');
                } else {
                    $(element).closest('.form-group').addClass('has-error');
                }
            },
            unhighlight: function (element) {
                if ($(element).parent().parent().parent('.checkbox-group').length) {
                    $(element).parent().parent().parent('.checkbox-group').removeClass('has-error');
                } else {
                    $(element).closest('.form-group').removeClass('has-error');
                }
            },
            errorElement: 'span',
            errorClass: 'help-block',
            errorPlacement: function (error, element) {
                if (element.parent('.input-group').length) {
                    error.insertAfter(element.parent());
                } else if (element.is(':checkbox')) {
                    error.insertAfter($('#fake-' + element.attr('id')));
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function (form) {
                var postFormData = $(formId).serialize();
                var addModelForm = '#post-add-form';
                if (formId === addModelForm) {
                    $post.save(postFormData, function (response) {
                        if (response.status === 'success') {
                            $('.post-success-message').html(response.message).show();
                            setTimeout(function () {
                                location.href = baseUrl + 'post';
                            }, 1000);
                        } else {
                            $('.post-success-message').hide();
                            $('.post-error-message').html(response.message).show();
                            $('.post-error-message').delay(5000).fadeOut("slow");
                        }
                    }, function (error) {
                        if (error) {
                            console.log(error);
                        }

                    });
                } else {
                    $post.update(postFormData, function (response) {
                        if (response.status === 'success') {
                            $('.post-success-message').html(response.message).show();
                            setTimeout(function () {
                                location.href = baseUrl + 'post';
                            }, 800);

                        } else {
                            $('.post-success-message').hide();
                            $('.post-error-message').html(response.message).show();
                            $('.post-error-message').delay(5000).fadeOut("slow");
                        }
                    }, function (error) {
                        if (error) {
                            console.log(error);
                        }
                    });
                }
            }

        });

    };


    /**
     * delete click event
     */
    $('.post-delete-btn').on('click', function () {
        // Get the record's id via attribute
        var id = $(this).attr('data-id');
        var modelId = $('#post-confirm-modal');
        modelId.find('#post-id').val(id);
    });
    /**
     * delete yes click event
     */
    $('.post-delete-yes-btn').on('click', function () {
        var modelId = $('#post-confirm-modal');
        var id = modelId.find('#post-id').val();
        $post.delete(id, function (data) {
            $('#post-confirm-modal').modal('hide');
            $('.post-list-success-message').html(data.message).show();
            setTimeout(function () {
                window.location.reload();
            }, 800);

        }, function (error) {
            if (error) {
                console.log(error);
            }
        });
    });

    /**
     * ajax call for store post information
     * @param {array} postFormData
     * @param {function} successCallBack
     * @param {function} errorCallBack
     */
    $post.save = function (postFormData, successCallBack, errorCallBack) {
        var postUrl = baseUrl + "post/store";
        $.ajax({
            url: postUrl,
            method: "POST",
            data: postFormData,
            success: function (response) {
                if (successCallBack)
                    successCallBack(response);
            },
            error: function (error) {
                if (errorCallBack)
                    errorCallBack(error);
            },
            dataType: "json"
        });
    };

    /**
     * ajax call for update post information
     * @param {array} postFormData
     * @param {function} successCallBack
     * @param {function} errorCallBack
     */
    $post.update = function (postFormData, successCallBack, errorCallBack) {
        var postUrl = baseUrl + "post/update";
        $.ajax({
            url: postUrl,
            method: "PUT",
            data: postFormData,
            success: function (response) {
                if (successCallBack)
                    successCallBack(response);
            },
            error: function (error) {
                if (errorCallBack)
                    errorCallBack(error);
            },
            dataType: "json"
        });
    };

    /**
     * ajax call for delete post information
     * @param {integer} id
     * @param {function} successCallBack
     * @param {function} errorCallBack
     */
    $post.delete = function (id, successCallBack, errorCallBack) {
        var postUrl = baseUrl + "post/destroy/" + id;
        $.ajax({
            url: postUrl,
            method: "GET",
            success: function (response) {
                if (successCallBack)
                    successCallBack(response);
            },
            error: function (error) {
                if (errorCallBack)
                    errorCallBack(error);
            },
            dataType: "json"
        });
    };

    $post.validation("#post-add-form");
    $post.validation("#post-edit-form");


})(blog.post = blog.post || {}, blog.common);