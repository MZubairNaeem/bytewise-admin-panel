<?php $__env->startSection('title'); ?>
    Apply
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Bytewise Limited - Fellowship - Batch 3</h1>
                        <div class="row">
                            <img src="<?php echo e(URL::asset('images/header-white.png')); ?>" alt="">
                        </div>
                        <div>
                            <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="<?php echo e(route('submitform')); ?>" method="POST">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>

                        <div class="my-2">
                            <label class="form-label">Email<span class="text-danger"> *</span></label>
                            <input class="form-control" required type="text" name="email">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Full Name<span class="text-danger"> *</span></label>
                            <input class="form-control" required type="text" name="name">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Phone Number(WhatsApp)<span class="text-danger"> *</span></label>
                            <input required class="form-control" type="text" name="phone">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Resume<span class="text-danger"> *</span></label>
                            <input required class="form-control" type="file" name="resume">
                        </div>
                        <div class="my-2">
                            <label class="form-label"><?php echo e($questions[0]->question); ?><span class="text-danger">
                                    *</span></label>
                            <div class="col-12">
                                <textarea required name="q<?php echo e($questions[0]->id); ?>" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="my-2">
                            <label class="form-label"><?php echo e($questions[1]->question); ?><span class="text-danger">
                                    *</span></label>
                            <div class="col-12">
                                <textarea required name="q<?php echo e($questions[1]->id); ?>" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                        <div class="my-2">
                            <label class="form-label"><?php echo e($questions[2]->question); ?></label>
                            <textarea name="q<?php echo e($questions[2]->id); ?>" class="form-control" rows="2"></textarea>

                        </div>
                        <div class="my-2">
                            <label class="form-label"><?php echo e($questions[3]->question); ?><span class="text-danger">
                                    *</span></label>
                            <?php $__currentLoopData = $tracks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $track): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="track-row">
                                    <input required type="radio" id="track_<?php echo e($track->id); ?>"
                                        name="q<?php echo e($questions[3]->id); ?>" value="<?php echo e($track->name); ?><?php echo e($track->id); ?>">
                                    <label for="track_<?php echo e($track->id); ?>"><?php echo e($track->name); ?></label>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                        <div class="my-2">
                            <label class="form-label"><?php echo e($questions[4]->question); ?></label>
                            <textarea name="q<?php echo e($questions[4]->id); ?>" class="form-control" rows="2"></textarea>

                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('assets/libs/particles.js/particles.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/particles.app.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/password-addon.init.js')); ?>"></script>
    <script src="//unpkg.com/alpinejs" defer></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master-without-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Bytewise\interactive\resources\views/menu/forms/apply-form.blade.php ENDPATH**/ ?>