<div class="sidebar px-4 py-4 py-md-4 me-0 gradient">
    <div class="d-flex flex-column h-100">
        <a href="<?php echo e(route('admin.dashboard')); ?>" class="mb-0 brand-icon">
            <span>Admin Panel</span>
            
        </a>
        <!-- Menu: main ul -->
        <ul class="menu-list flex-grow-1 mt-3">
            <li><a class="m-link active" href="<?php echo e(route('admin.dashboard')); ?>"><i class="icofont-home fs-5"></i> <span>Dashboard</span></a></li>
            <li><a class="m-link" href="<?php echo e(route('contacts.index')); ?>"><i class="icofont-sale-discount fs-5"></i> <span>Contacts</span></a></li>
            

        </ul>
        <!-- Menu: menu collepce btn -->
        <button type="button" class="btn btn-link sidebar-mini-btn text-light">
            <span class="ms-2"><i class="icofont-bubble-right"></i></span>
        </button>
    </div>
</div>
<?php /**PATH I:\putul\p_web\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>