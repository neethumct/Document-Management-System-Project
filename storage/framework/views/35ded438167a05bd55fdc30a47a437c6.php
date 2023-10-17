
<div>
     <?php $__env->slot('title', null, []); ?> User - Document <?php $__env->endSlot(); ?>
    <div class="container my-3">
        <!--[if BLOCK]><![endif]--><?php if(session()->has('success')): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?php echo e(session('success')); ?>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
        <!--[if BLOCK]><![endif]--><?php if($showTable == true): ?>
            <div class="card my-2">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <h3>Document ( <?php echo e($totalDocuments); ?> )</h3>
                        <button class="btn btn-success" wire:click='showForm'>
                            <span wire:loading.remove wire:target='showForm'>New</span>
                            <span wire:loading wire:target='showForm'>New....</span>
                        </button>
                    </div>
                </div>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->


        <!--[if BLOCK]><![endif]--><?php if($showTable == true): ?>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Document</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                            </thead>
                            <tbody>
                            <!--[if BLOCK]><![endif]--><?php $__empty_1 = true; $__currentLoopData = $documents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                                <tr>
                                    <td><?php echo e($document->id); ?></td>
                                    <td><?php echo e($document->title); ?></td>
                                    <td><?php echo e($document->description); ?></td>
                                    <td><a href="<?php echo e(route('user.view', $document->id )); ?>">View Document</a>




                                    </td>

                                    <td><button wire:click='edit(<?php echo e($document->id); ?>)'
                                                class="btn btn-primary">Edit</button></td>
                                    <td><button wire:click='delete(<?php echo e($document->id); ?>)'
                                                class="btn btn-danger">Delete</button></td>
                                </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                                <h4>Document Not Found</h4>
                            <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php echo e($documents->links('custom-pagination-links-view')); ?>

                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($createForm == true): ?>
            <div class="container">
                <button class="btn btn-success" wire:click='goback'>
                    <span wire:loading.remove wire:target='goback'>GoBack</span>
                    <span wire:loading wire:target='goback'>GoBack....</span>
                </button>
                <form wire:submit.prevent='create' enctype="multipart/form-data">
                    <div class="form-group my-1">
                        <label for="">Enter Title</label>
                        <input type="text"  wire:model='title' class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>



                    <div  class="form-group my-1">
                                <label for="">Description:</label>
                                <textarea  id="description" wire:model='description' class="form-control"></textarea>
                            </div>




                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='document' class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <button type='submit' class="btn btn-success">Save</button>
                </form>



            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->

        <!--[if BLOCK]><![endif]--><?php if($updateForm == true): ?>
            <div class="container">
                <button class="btn btn-success" wire:click='goback'>
                    <span wire:loading.remove wire:target='goback'>GoBack</span>
                    <span wire:loading wire:target='goback'>GoBack....</span>
                </button>
                <form wire:submit.prevent='update(<?php echo e($edit_id); ?>)'>
                    <div class="form-group my-1">
                        <label for="">Enter Title</label>
                        <input type="text" wire:model='edit_title' class="form-control">
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="form-group my-1">
                        <label for="">Description</label>
                        <textarea class=" ckeditor form-control" id="description" name="description" wire:model='edit_description' class="form-control"></textarea>

                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <div class="form-group my-1">
                        <label for="">Upload Document</label>
                        <input type="file" wire:model='new_document' class="form-control">
                        <input type="hidden" wire:model='old_document' class="form-control">
                        <!--[if BLOCK]><![endif]--><?php if($new_document): ?>
                            <span><?php echo e($new_document); ?></span>
                        <?php else: ?>
                            <span><?php echo e($old_document); ?></span>
                        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
                        <!--[if BLOCK]><![endif]--><?php $__errorArgs = ['document'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <span class="text-danger"><?php echo e($message); ?></span>
                        <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?> <!--[if ENDBLOCK]><![endif]-->
                    </div>
                    <button type='submit' class="btn btn-success">Save</button>
                </form>
            </div>
        <?php endif; ?> <!--[if ENDBLOCK]><![endif]-->
    </div>
    <div class="card">
        <div class="card-body">
            <a href="<?php echo e(route('user.documentexportPDF')); ?>">
                <button class="btn btn-secondary">Export PDF</button>

            </a>
            <a href="<?php echo e(route('user.export')); ?>">
                <button class="btn btn-secondary">Export EXCEL</button>

            </a>
        </div>
    </div>
</div>



<script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<?php /**PATH C:\Users\USER\LaravelProject\DocumentManagementSystem\resources\views/livewire/user/document.blade.php ENDPATH**/ ?>