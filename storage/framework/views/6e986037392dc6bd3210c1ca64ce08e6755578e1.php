<?php $__env->startSection('content'); ?>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-6  column col-sm-offset-0 col-md-offset-2 col-lg-offset-3">
            <form class="form-horizontal" method="post" action="<?php echo e(route('taskstore')); ?>">
                <?php echo csrf_field(); ?>
                <fieldset>

                    <!-- Form Name -->
                    <legend><?php echo e($data['FormName']); ?></legend>
                    <!-- Select Basic -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="selectUser">Assign To: </label>
                        <div class="col-md-9">
                            <select id="selectUser" name="selectUser" class="form-control">
                                <?php $__currentLoopData = $data['UsersList']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>


                    <!-- Text input-->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textinput">Text Input</label>
                        <div class="col-md-9">
                            <input id="textinput" name="task_title" type="text" placeholder="placeholder" class="form-control input-md">
                        </div>


                    </div>


                    <!-- Textarea -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="textarea">Text Area</label>
                        <div class="col-md-9">
                            <textarea class="form-control" id="textarea" name="task_description">default text</textarea>
                        </div>
                    </div>

                    <!-- Button (Double) -->
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="button1id"></label>
                        <div class="col-md-8">
                            <button id="button1id" type="submit" name="button1id" class="btn btn-success">Assign Task</button>
                            <a href="/dashboard" id="button2id" name="button2id" class="btn btn-danger">Cancel</a>
                        </div>
                    </div>

                </fieldset>
            </form>
        </div>

    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/html/L-TaskManagement/resources/views/Task/task_Create.blade.php ENDPATH**/ ?>