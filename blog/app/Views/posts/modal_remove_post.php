<!-- Modal remove post -->
<div class="modal fade" id="modal_remove_post" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Remove post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="<?= site_url().'posts/remove' ?>" method="POST">
                <input type="hidden" name="exc_cod_post" id="exc_cod_post" value="">
                <div class="modal-body">
                    <p>Do you really want to remove the post below?</p>
                    <p><strong><span id="title"></span></strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="fa fa-times"></i>&nbsp;&nbsp;Cancel</button>
                    <button type="submit" class="btn btn-outline-success"><i class="fa fa-check"></i>&nbsp;&nbsp;Confirm</button>
                </div>
            </form>
        </div>
    </div>
</div>