<!-- Item Modal -->
<div class="modal fade" id="post-confirm-modal" tabindex="1" role="dialog" aria-labelledby="confirm-modal-label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content confirm-modal-box-small">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Delete</h4>
            </div>

            <div class="modal-body">
                <input type="hidden" id="post-id" value=""/>
                <p>Are you sure you want to delete?</p>             
            </div>
            <div class="modal-footer">
                <button type="button" class="post-delete-yes-btn btn btn-primary"><span class="glyphicon glyphicon-ok-sign"></span>&nbsp;Yes</button>
                <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span>&nbsp;No</button>
            </div>

        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>