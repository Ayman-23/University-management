<?php $__env->startSection('title'); ?>
Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<?php if(!$error): ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container-fluid">
    <section class="panel">
        <div class="panel-body bio-graph-info" style="overflow-y: auto;">
            <h1 class="text-muted"> Edit Info</h1>
            <hr>
            <form class="form-horizontal" role="form" method="POST" action="/saveprofile/<?php echo e($d->id); ?>">
                <?php echo e(csrf_field()); ?>

                <div class="form-group">
                    <label class="col-lg-2 control-label">Name</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="name" placeholder=<?php echo e($d->name); ?> value=<?php echo e(old('name')); ?>>
                        <?php if($errors->has('name')): ?><p style="color:red">Fill Up Name Correctly</p> <?php endif; ?>
                    </div>
                </div>
                
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Birthday</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="bdate" placeholder=<?php echo e($d->bdate); ?> value=<?php echo e(old('bdate')); ?>>
                        <?php if($errors->has('bdate')): ?><p style="color:red">Not a valid Birthday</p> <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Email</label>
                    <div class="col-lg-6">
                        <input type="email" class="form-control" name="email" placeholder=<?php echo e($d->email); ?> value=<?php echo e(old('email')); ?>>
                        <?php if($errors->has('email')): ?><p style="color:red">Not a valid email</p> <?php endif; ?>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-lg-2 control-label">Mobile</label>
                    <div class="col-lg-6">
                        <input type="text" class="form-control" name="mobile" placeholder=<?php echo e($d->phoneno); ?> value=<?php echo e(old('mobile')); ?>>
                        <?php if($errors->has('mobile')): ?><p style="color:red">'Phone No.' required</p> <?php endif; ?>
                    </div>
                </div>
                
                <div class="form-group">
                    <label class="col-lg-2 control-label">Gender</label>
                    <div class="col-lg-6">
                        <select name="gender" class="form-control form-control-sm">
                            <option value="M">MALE</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                        <button type="submit" class="btn btn-primary">Save</button>
                        
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>