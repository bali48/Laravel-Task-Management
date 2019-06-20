<?php $__env->startSection('content'); ?>
    <table class="table table-hover">

        <thead>

        <th>Task Title</th>

        <th>Task Description</th>

        <th>Creation Date</th>

        <?php if($Assignee): ?>
        <th>AssignTo</th>
        <?php endif; ?>
        </thead>

        <tbody>
        <?php $__currentLoopData = $tasks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

            <tr>

                <td><?php echo e($task->name); ?> </td>

                <td><?php echo e($task->description); ?> </td>

                <td><?php echo e(date('d-m-Y', strtotime($task->created_at))); ?></td>

                <?php if($Assignee): ?>
                    <td><?php echo e($task->user->name); ?> </td>
                <?php endif; ?>
            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </tbody>

    </table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/L-TaskManagement/resources/views/Task/tasks.blade.php ENDPATH**/ ?>