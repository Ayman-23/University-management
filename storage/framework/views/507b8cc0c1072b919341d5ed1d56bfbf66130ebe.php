<?php $__env->startSection('title'); ?>
Admin | Block
<?php $__env->stopSection(); ?>
<?php $__env->startSection('rightcontent'); ?>
<div class="container">
    <button class="btn btn-primary float-right" disabled>Add Block Item</button>
    <br>
    <br>
    <br>
    <div class="container">
        <table class="table table-sm table-hover table-responsive-sm " id="tableblock">
            <thead>
            </thead>
            <tbody id="blocklist">
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $d): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td ><h4><b><?php echo e($d->option_name); ?></b></h4></td>
                        <td class=" text-muted"><h6><?php echo e($d->description); ?></h5></td>
                        <?php if($d->active == 1): ?>
                        <td><button class="btn btn-danger" onclick="window  .location='/block_toggle/<?php echo e($d->id); ?>'">Block</button></td>
                        <?php else: ?>
                            <td><button class="btn btn-success" onclick="window .location='/block_toggle/<?php echo e($d->id); ?>'">Unblock</button></td>
                        <?php endif; ?>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>

</div>
<?php $__env->stopSection(); ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut"
crossorigin="anonymous"></script>
<!-- Latest compiled JavaScript -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 
<?php echo $__env->make('mainlayout', \Illuminate\Support\Arr::except(get_defined_vars(), array('__data', '__path')))->render(); ?>