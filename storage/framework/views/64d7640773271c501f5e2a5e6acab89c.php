<!DOCTYPE html>
<html>
<head>
<style>
.pagination { display: flex; gap: 5px; list-style: none; padding: 0; margin: 0; justify-content: center; }
.pagination li { margin: 0; }
.pagination a, .pagination span { 
    display: inline-block; 
    padding: 8px 12px; 
    background: #1a1f2e; 
    border: 1px solid #2a3142; 
    color: #8b9ab5; 
    text-decoration: none; 
    border-radius: 4px;
}
.pagination a:hover { border-color: #F7C52D; color: #F7C52D; }
.pagination .active span { background: #F7C52D; border-color: #F7C52D; color: #0a0e17; }
.pagination .disabled span { opacity: 0.5; cursor: default; }
</style>
</head>
<body>
<ul class="pagination">
<?php if($paginator->hasPages()): ?>
    <li class="<?php echo e($paginator->onFirstPage() ? 'disabled' : ''); ?>">
        <a href="<?php echo e($paginator->onFirstPage() ? '#' : $paginator->previousPageUrl()); ?>">&laquo;</a>
    </li>
    
    <?php $__currentLoopData = $elements; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(is_string($element)): ?>
            <li class="disabled"><span><?php echo e($element); ?></span></li>
        <?php endif; ?>
        
        <?php if(is_array($element)): ?>
            <?php $__currentLoopData = $element; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page => $url): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="<?php echo e($page == $paginator->currentPage() ? 'active' : ''); ?>">
                    <a href="<?php echo e($url); ?>"><?php echo e($page); ?></a>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    
    <li class="<?php echo e($paginator->hasMorePages() ? '' : 'disabled'); ?>">
        <a href="<?php echo e($paginator->hasMorePages() ? $paginator->nextPageUrl() : '#'); ?>">&raquo;</a>
    </li>
<?php endif; ?>
</ul>
</body>
</html>
<?php /**PATH C:\laragon\www\proyecto_negocios_electronicos\resources\views/vendor/pagination/simple-bootstrap-4.blade.php ENDPATH**/ ?>