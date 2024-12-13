<?php $__env->startSection('page-title','Book List'); ?>
<?php $__env->startSection('content'); ?>
<div class="body d-flex py-3">
    <div class="container-xxl">
        <div class="row align-items-center">
            <div class="border-0 mb-4">
                <?php if(isset($response['message'])): ?>
                    <div class="alert alert-success">
                        <?php echo e($response['message']); ?>

                    </div>
                <?php endif; ?>
                <div class="card-header py-3 no-bg bg-transparent d-flex align-items-center px-0 justify-content-between border-bottom flex-wrap">
                    <h3 class="fw-bold mb-0">Book List</h3>
                </div>
            </div>
        </div> <!-- Row end  -->
        <div class="row g-3 mb-3">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table id="myDataTable" class="table table-hover align-middle mb-0" style="width: 100%;">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Picture</th>
                                    <th>Book Name</th>
                                    <th>Price</th>
                                    <th>Instock</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $__currentLoopData = $books; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <tr>
                                    <td><strong><?php echo e(++$key); ?></strong></td>
                                    <td><img src="<?php echo e(asset($value->picture)); ?>" alt="" width="60" class="img img-thumbnail"></td>
                                    <td><?php echo e($value->title); ?></td>
                                    <td><?php echo e($value->price); ?></td>
                                    <td><?php echo e($value->instock); ?></td>
                                    <td class="text-center">
                                        <div class="btn-group">
                                          <button type="button" class="btn btn-sm btn-primary  dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                            Action
                                          </button>
                                          <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="<?php echo e(route('books.edit', encrypt($value->id))); ?>" onclick="return confirm('Are you sure to edit this Book?')">Edit</a>
                                            </li>
                                            <li><a class="dropdown-item" href="<?php echo e(route('books.delete', encrypt($value->id))); ?>" onclick="return confirm('Are you sure to delete this Book?')">Delete</a>
                                            </li>
                                          </ul>
                                        </div>
                                    </td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#myDataTable')
    .addClass( 'nowrap' )
    .dataTable( {
        responsive: true,
        columnDefs: [
            { targets: [-1, -3], className: 'dt-body-right' }
        ]
    });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH I:\putul\p_web\resources\views/admin/book/index.blade.php ENDPATH**/ ?>