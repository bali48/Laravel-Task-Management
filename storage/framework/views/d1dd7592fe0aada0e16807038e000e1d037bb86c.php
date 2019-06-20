<?php $__env->startSection('content'); ?>
    <style>
        .col-sm-6 {
            background: #ccc;
        }

        .other {
            background: #a4a4a4;
        }


    </style>
    <div class="row">
        <div class="col-sm-6">
            <h3>Task Name: </h3>
            <h3>Detail: </h3>
            <h3>Assign To: </h3>
            <h3>Creation Date:</h3>
        </div>
        <div class="col-sm-6 other">
            <h4><?php echo e($task->name); ?></h4>
            <h4><?php echo e($task->description); ?></h4>
            <h4><?php echo e($task->user->name); ?></h4>
            <h4><?php echo e(date('d-m-Y', strtotime($task->created_at))); ?></h4>
        </div>
    </div>
    <hr>

    <div class="row bootstrap snippets">
        <div class="col-md-6 col-md-offset-2 col-sm-12">
            <div class="comment-wrapper">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        Comment panel
                    </div>
                    <div class="panel-body">
                        <form id="form">
                            <?php echo csrf_field(); ?>
                        <textarea class="form-control" id="comment" name="comment" placeholder="write a comment..." rows="3"></textarea>
                            <input id="taskid" name="taskid" type="hidden" value="<?php echo e($task->id); ?>">
                        <br>
                        <button type="button" id="postcomment" class="btn btn-info pull-right">Post</button>
                        </form>
                        <div class="clearfix"></div>
                        <hr>
                        <h5>Comments</h5>
                        <ul class="media-list">
                            <?php $__currentLoopData = $task->comments; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="media">
                                <a href="#" class="pull-left">
                                    <img src="<?php echo e($comment->user->image_path); ?>" alt="" class="img-circle">
                                </a>
                                <div class="media-body">
                                <span class="text-muted pull-right">
                                    <small class="text-muted"><?php echo e(date('d-m-Y', strtotime($comment->created_at))); ?></small>
                                </span>
                                    <strong class="text-success"><?php echo e($comment->user->name); ?>-<small>(<?php echo e($comment->user->role->name); ?>)</small></strong>
                                    <p>
                                        <?php echo e($comment->comment); ?> </a>.
                                    </p>
                                </div>
                            </li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
<script>
    jQuery(document).ready(function(){
        jQuery('#postcomment').click(function(e){
            alert('click');
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                }
            });
            jQuery.ajax({
                url: "<?php echo e(route('addcomments')); ?>",
                method: 'post',
                data : $('#form').serialize(),
                success: function(result){
                    $('#comment').val('');
                }});
        });
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/L-TaskManagement/resources/views/Task/task_show.blade.php ENDPATH**/ ?>