<!--[if BLOCK]><![endif]--><?php if($paginator->hasPages()): ?>
    <div class="d-flex justify-content-center">
        <!--[if BLOCK]><![endif]--><?php if($paginator->onFirstPage()): ?>
            <button disabled="disabled" class='btn btn-success ml-1'>Prev</button>
        <?php else: ?>
            <button class="btn btn-success ml-1" wire:click='previousPage'>Prev</button>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <!--[if BLOCK]><![endif]--><?php if(is_array($element)): ?>
                <!--[if BLOCK]><![endif]--><?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--[if BLOCK]><![endif]--><?php if($page == $paginator->currentPage()): ?>
                        <buttton class="btn btn-secondary ml-1" wire:click='gotoPage(<?php echo e($page); ?>)'>
                            <?php echo e($page); ?></buttton>
                    <?php else: ?>
                        <buttton class="btn btn-success ml-1" wire:click='gotoPage(<?php echo e($page); ?>)'>
                            <?php echo e($page); ?></buttton>
                    <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> <!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($paginator->hasMorePages()): ?>
            <buttton class="btn btn-success ml-1" wire:click='nextPage'>Next</buttton>
        <?php else: ?>
            <buttton class="btn btn-success ml-1" disabled>Next</buttton>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
<?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
<?php /**PATH C:\Users\USER\LaravelProject\DocumentManagementSystem\resources\views/custom-pagination-links-view.blade.php ENDPATH**/ ?>