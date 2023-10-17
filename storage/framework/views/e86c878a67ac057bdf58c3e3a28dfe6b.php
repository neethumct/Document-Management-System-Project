<table style='width:100%;border:1px solid black'>
    <thead>
    <tr style='border:1px solid black'>
        <th>Id</th>
        <th>Title</th>
        <th>Description</th>
        <th>Document</th>
    </tr>
    </thead>
    <tbody>
    <?php if(count($document)): ?>
        <?php $__currentLoopData = $document; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr style='border:1px solid black'>
                <td style='border:1px solid black;text-align:center;'><?php echo e($document->id); ?></td>
                <td style='border:1px solid black;text-align:center;'> <?php echo e($document->title); ?> </td>
                <td style='border:1px solid black;text-align:center;'> <?php echo e($document->description); ?> </td>
                <td style='border:1px solid black;text-align:center;'> <?php echo e($document->document); ?> </td>

                <td style='border:1px solid black;text-align:center;'><?php echo e($document->users->fname); ?>

                    <?php echo e($document->users->lname); ?></td>

            </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <h4>Record Not Found</h4>
    <?php endif; ?>

    </tbody>
</table>
<?php /**PATH C:\Users\USER\LaravelProject\DocumentManagementSystem\resources\views/livewire/components/documentExportEXCEL.blade.php ENDPATH**/ ?>