<div>
     <?php $__env->slot('title', null, []); ?> 
        User - Dashboard
     <?php $__env->endSlot(); ?>
    <div class="container-fluid">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">
                        <span>Total Document</span>
                        <span><?php echo e($totalDocument); ?></span>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="<?php echo e(route('user.documents')); ?>">View Details</a>

                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>




                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH C:\Users\USER\LaravelProject\DocumentManagementSystem\resources\views/livewire/user/dashboard.blade.php ENDPATH**/ ?>