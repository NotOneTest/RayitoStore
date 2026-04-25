<?php $__env->startSection('title', 'Productos - Rayito Store'); ?>

<?php $__env->startSection('content'); ?>
<div class="page-hero">
    <img src="https://wallpaperaccess.com/full/774615.jpg" alt="Games" class="page-hero-image">
    <div class="page-hero-overlay">
        <h1 class="page-hero-title">Nuestros Juegos</h1>
        <p class="page-hero-subtitle">Encuentra los mejores videojuegos digitales</p>
    </div>
</div>

<section class="section">
    <div class="container">
        <div class="products-layout">
            <aside class="filters-sidebar">
                <div class="filter-section">
                    <h3 class="filter-title">Categorías</h3>
                    <ul class="filter-list">
                        <li>
                            <a href="<?php echo e(route('products.index')); ?>" class="filter-link <?php echo e(!request('category') ? 'active' : ''); ?>">
                                Todos los juegos
                            </a>
                        </li>
                        <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('products.index', ['category' => $category->slug])); ?>" 
                               class="filter-link <?php echo e(request('category') == $category->slug ? 'active' : ''); ?>">
                                <?php echo e($category->name); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Plataforma</h3>
                    <ul class="filter-list">
                        <?php $__currentLoopData = $platforms; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $platform): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <li>
                            <a href="<?php echo e(route('products.index', array_merge(request()->except('platform'), ['platform' => $platform]))); ?>"
                               class="filter-link <?php echo e(request('platform') == $platform ? 'active' : ''); ?>">
                                <?php echo e($platform); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>

                <div class="filter-section">
                    <h3 class="filter-title">Etiquetas</h3>
                    <div class="tags-filter">
                        <?php $__currentLoopData = $tags; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tag): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <a href="<?php echo e(route('products.index', ['tag' => $tag->slug])); ?>"
                           class="tag-chip <?php echo e(request('tag') == $tag->slug ? 'active' : ''); ?>">
                            <?php echo e($tag->name); ?>

                        </a>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                </div>
            </aside>

            <div class="products-main">
                <div class="products-toolbar">
                    <p class="results-count"><?php echo e($products->total()); ?> juegos encontrados</p>
                    <select class="sort-select" onchange="window.location.href=this.value">
                        <option value="<?php echo e(route('products.index', array_merge(request()->except('sort'), ['sort' => 'newest']))); ?>" 
                                <?php echo e(request('sort') == 'newest' ? 'selected' : ''); ?>>
                            Más Recientes
                        </option>
                        <option value="<?php echo e(route('products.index', array_merge(request()->except('sort'), ['sort' => 'price_asc']))); ?>"
                                <?php echo e(request('sort') == 'price_asc' ? 'selected' : ''); ?>>
                            Precio: Menor a Mayor
                        </option>
                        <option value="<?php echo e(route('products.index', array_merge(request()->except('sort'), ['sort' => 'price_desc']))); ?>"
                                <?php echo e(request('sort') == 'price_desc' ? 'selected' : ''); ?>>
                            Precio: Mayor a Menor
                        </option>
                    </select>
                </div>

                <?php if($products->count() > 0): ?>
                <div class="products-grid">
                    <?php $__currentLoopData = $products; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $product): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php if (isset($component)) { $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a = $component; } ?>
<?php if (isset($attributes)) { $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a = $attributes; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.product-card','data' => ['product' => $product]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? $attributes->all() : [])); ?>
<?php $component->withName('product-card'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag): ?>
<?php $attributes = $attributes->except(\Illuminate\View\AnonymousComponent::ignoredParameterNames()); ?>
<?php endif; ?>
<?php $component->withAttributes(['product' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($product)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $attributes = $__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__attributesOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a)): ?>
<?php $component = $__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a; ?>
<?php unset($__componentOriginal3fd2897c1d6a149cdb97b41db9ff827a); ?>
<?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="pagination-container">
                    <div class="pagination-info">
                        Mostrando <?php echo e($products->firstItem()); ?> a <?php echo e($products->lastItem()); ?> de <?php echo e($products->total()); ?> resultados
                    </div>
                    <div class="pagination-wrapper">
                        <?php echo e($products->links()); ?>

                    </div>
                </div>
                <?php else: ?>
                <div class="empty-state">
                    <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                        <circle cx="11" cy="11" r="8"></circle>
                        <path d="M21 21l-4.35-4.35"></path>
                    </svg>
                    <h3>No se encontraron productos</h3>
                    <p>Intenta con otros filtros o categorías</p>
                    <a href="<?php echo e(route('products.index')); ?>" class="btn btn-primary">Ver todos los juegos</a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\proyecto_negocios_electronicos\resources\views/products/index.blade.php ENDPATH**/ ?>