<?php $__env->startSection('title'); ?>
 Profile
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<?php if(!$error): ?>
<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="container-fluid">
    
    <div class="row">
        <div class="col-md-4">
        <img src="http://127.0.0.1:8000/images/<?php echo e($d->image); ?>" alt="#" height="250" width="250">
            <h2><?php echo e($d->name); ?></h2>
            <h6><?php echo e($d->user_id); ?></h4>
            <button class="btn btn-secondary"><i class="fab fa-facebook-square"></i></button>
            <button class="btn btn-secondary"><i class="fab fa-twitter-square"></i></button>
            <button class="btn btn-secondary"><i class="fab fa-instagram"></i></button>
            <button class="btn btn-secondary"><i class="fab fa-google-plus-square"></i></button>
            <br>
            <br>
            <button class="btn btn-dark" onclick="window.location.href='/profile/edit'"><i class="fas fa-user-edit"></i>&nbsp; Edit Profile</button>
        </div>
        <div class="col-md-8">
            <h4 class="text-muted">About Me</h4>
            <hr>
            <p style="color: black">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                <h2 class="text-muted">Info</h2>
                <hr>
            <div class="container">
                <div class="row">
                    <div class="col" style="background: #eeeeee">
                        <p><span> Name </span>: <?php echo e($d->name); ?> </p>
                        <p><span>Birthday</span>: <?php echo e($d->bdate); ?> <span></span></p>
                        <p><span>Email </span>:<span> <?php echo e($d->email); ?></span></p>
                    </div>
                    <div class="col" style="background: #eeeeee">
                        <p><span>Mobile </span>: <span> <?php echo e($d->phoneno); ?></span></p>
                        <p><span>Gender </span>: <?php if($d->gender == "M"): ?> MALE <?php else: ?> FEMALE <?php endif; ?></span></p>
                    </div>
                </div> <!-- ROW -->
            </div> <!-- CONTAINER -->
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php else: ?>

<?php endif; ?>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
    crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
    crossorigin="anonymous"></script>

<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>