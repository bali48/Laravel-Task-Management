<?php $__env->startSection('content'); ?>
<table class="table table-hover">

    <thead>

    <th>User Name</th>

    <th>Email Address</th>

    <th>Creation Date</th>

    <th>Action</th>
    </thead>

    <tbody>
    <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

        <tr>

            <td><?php echo e($user->name); ?> </td>

            <td><?php echo e($user->email); ?> </td>

            <td><?php echo e(date('d-m-Y', strtotime($user->created_at))); ?></td>


        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

    </tbody>

</table>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/L-TaskManagement/resources/views/users/users.blade.php ENDPATH**/ ?>