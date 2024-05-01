<?php $__env->startSection('title'); ?>
    Group-links
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Group-links
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <p>Working on this!</p>
    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Fellowship - Group Links</h1>
                        <div>
                            <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    <form action="">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('POST'); ?>
                        <div class="my-2">
                            <label class="form-label">Laravel</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">UI/UX</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Django</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Flask</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Frontend</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">MERN</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Flutter</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Data Engg</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Cyber Security</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">C# .NET</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Data Science</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">NLP</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">AWS</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Machine Learning/Deep Learning</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">DevOps</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Product Management</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Game Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">SEO</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">React/Next</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Android(Kotlin)</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Project Management</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Azure</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">iOS Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Blockchain</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="my-2">
                            <label class="form-label">Personal & Profession Dev</label>
                            <input class="form-control" type="text" name="link">
                        </div>
                        <div class="mt-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <!-- apexcharts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="<?php echo e(URL::asset('assets/libs/apexcharts/apexcharts.min.js')); ?>"></script>

    <!-- Vector map-->
    <script src="<?php echo e(URL::asset('assets/libs/jsvectormap/jsvectormap.min.js')); ?>"></script>

    <!-- Widget init -->
    <script src="<?php echo e(URL::asset('assets/js/pages/widgets.init.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>

    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Bytewise\interactive\resources\views/menu/group_links/group-link.blade.php ENDPATH**/ ?>