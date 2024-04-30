<?php $__env->startSection('title'); ?>
    Fellows
<?php $__env->stopSection(); ?>
<?php $__env->startSection('css'); ?>
    <!--datatable css-->
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css" rel="stylesheet" type="text/css" />
    <!--datatable responsive css-->
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
            Fellows
        <?php $__env->endSlot(); ?>
    <?php echo $__env->renderComponent(); ?>
    <?php echo $__env->make('partials.session', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Fellows</h5>
                </div>
                <div class="card-body">
                    <table id="scroll-horizontal" class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                                <th>Sr No.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Resume</th>
                                <th>Track</th>
                                <th>Shortlisted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $fellows; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $fellow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><?php echo e($loop->iteration); ?></td>
                                    <td><?php echo e($fellow->name); ?></td>
                                    <td><?php echo e($fellow->email); ?></td>
                                    <td><?php echo e($fellow->phone); ?></td>
                                    <td>
                                        <a href="<?php echo e(route('viewResume', $fellow->id)); ?>" target="_blank">View</a>
                                    </td>
                                    <td><?php echo e($fellow->track->name); ?></td>
                                    <td>
                                        <div
                                            class="form-check
                                            <?php echo e($fellow->shortlisted == 1 ? 'form-switch' : ''); ?>">
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
                                        </div>
                                    </td>
                                    <td>
                                        <div>
                                            <a class="btn btn-primary btn-sm"
                                                href="<?php echo e(route('applied-fellow-details', $fellow->id)); ?>">
                                                <i class="ri-eye-fill"></i>
                                            </a>
                                            <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                                data-bs-target="#delete<?php echo e($key); ?>">
                                                <i class="ri-delete-bin-line"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                <div class="modal fade
                                <?php echo e($fellow->shortlisted == 1 ? 'text-success' : 'text-danger'); ?>"
                                    id="delete<?php echo e($key); ?>" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Delete Fellow</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div
                                                class="modal-body
                                            <?php echo e($fellow->shortlisted == 1 ? 'text-success' : 'text-danger'); ?>">
                                                Are you sure you want to delete this fellow?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <form action="<?php echo e(route('delete-fellow', $fellow->id)); ?>" method="POST">
                                                    <?php echo csrf_field(); ?>
                                                    <?php echo method_field('DELETE'); ?>
                                                    <button type="submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </tbody>
                    </table>
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

    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

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

<?php echo $__env->make('layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH Z:\Bytewise\interactive\resources\views/menu/fellows/applied/view.blade.php ENDPATH**/ ?>