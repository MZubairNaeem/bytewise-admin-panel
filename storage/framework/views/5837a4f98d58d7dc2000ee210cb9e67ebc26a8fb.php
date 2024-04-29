<?php $__env->startSection('title'); ?>
    Fellow
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.bootstrap.min.css" rel="stylesheet"
        type="text/css" />
    <link href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <?php $__env->startComponent('components.breadcrumb'); ?>
        <?php $__env->slot('li_1'); ?>
            Dashboard
        <?php $__env->endSlot(); ?>
        <?php $__env->slot('title'); ?>
            Fellow
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

    <div class="container my-5 d-flex justify-content-center align-items-center">
        <div class="col-8">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <div class="col">
                        <h1 class="">Bytewise Limited - Fellowship - Batch 3</h1>
                        <div>
                            <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="my-2">
                        <h5 class="form-label">Email</h5>
                        <p><?php echo e($fellow->email); ?></p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Full Name</h5>
                        <p><?php echo e($fellow->name); ?></p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Phone Number(WhatsApp)</h5>
                        <p><?php echo e($fellow->phone); ?></p>

                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label">Resume</h5>
                        <a href="<?php echo e(asset('storage/' . $fellow->resume)); ?>" target="_blank">View Resume</a>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label"><?php echo e($questions[0]->question); ?></h5>

                        <p><?php echo e($answer1); ?></p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label"><?php echo e($questions[1]->question); ?></h5>
                        <p><?php echo e($answer2); ?></p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label"><?php echo e($questions[2]->question); ?></h5>

                        <p><?php echo e($answer3); ?></p>

                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label"><?php echo e($questions[3]->question); ?></h5>

                        <p><?php echo e($answer4); ?></p>
                    </div>
                    <hr>
                    <div class="my-2">
                        <h5 class="form-label"><?php echo e($questions[4]->question); ?></h5>

                        <p><?php echo e($answer5); ?></p>

                    </div>
                    <hr>
                    <div class="mt-3">
                        <div>
                            <button
                                class="btn 
                                                <?php echo e($fellow->shortlisted == 1 ? 'btn-success' : 'btn-danger'); ?>

                                             btn-sm"
                                id="shortlist"
                                onclick="
                                                <?php echo e($fellow->shortlisted == 1 ? 'notShortlist(' . $fellow->id . ')' : 'shortlist(' . $fellow->id . ')'); ?>

                                                ">
                                <?php echo e($fellow->shortlisted == 1 ? 'Shortlisted' : 'Not Shortlisted'); ?>

                            </button>

                            <button
                                class="btn 
                                                <?php echo e($fellow->selected == 1 ? 'btn-success' : 'btn-danger'); ?>

                                             btn-sm"
                                id="shortlist"
                                onclick="
                                                <?php echo e($fellow->selected == 1 ? 'notSelect(' . $fellow->id . ')' : 'select(' . $fellow->id . ')'); ?>

                                                ">
                                <?php echo e($fellow->selected == 1 ? 'Selected' : 'Not Selected'); ?>

                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(URL::asset('/assets/libs/prismjs/prismjs.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('/assets/js/app.min.js')); ?>"></script>
    <script src="https://cdn.lordicon.com/libs/mssddfmo/lord-icon-2.1.0.js"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/modal.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.js/list.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/list.pagination.js/list.pagination.js.min.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/listjs.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/libs/sweetalert2/sweetalert2.min.js')); ?>"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/select2.init.js')); ?>"></script>
    <script src="<?php echo e(URL::asset('assets/js/pages/datatables.init.js')); ?>"></script>

    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
<?php $__env->stopSection(); ?>

<script>
    function shortlist(id) {
        console.log(id);
        axios.get(`/fellows/shortlist/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function notShortlist(id) {
        axios.get(`/fellows/not-shortlist/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function select(id) {
        axios.get(`/fellows/selected/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }

    function notSelect(id) {
        axios.get(`/fellows/not-selected/${id}`)
            .then(response => {
                console.log(response.data);
                location.reload();
            })
            .catch(error => {
                console.log(error);
            });
    }
</script>

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Bytewise\interactive\resources\views/menu/fellows/detail.blade.php ENDPATH**/ ?>