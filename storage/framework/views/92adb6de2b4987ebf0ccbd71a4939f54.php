<div class="product-card">
    <div class="product-image">
        <?php
            $imageConfig = config('product_images.' . $product->slug);
            $imageUrl = $imageConfig['image'] ?? $product->image;
        ?>
        
        <?php if($imageUrl): ?>
            <img src="<?php echo e($imageUrl); ?>" alt="<?php echo e($product->name); ?>" style="width: 100%; height: auto; object-fit: cover;">
        <?php else: ?>
            <div class="product-placeholder">
                <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                    <rect x="2" y="6" width="20" height="12" rx="2"></rect>
                    <circle cx="8" cy="12" r="2"></circle>
                    <line x1="14" y1="10" x2="18" y2="10"></line>
                    <line x1="14" y1="14" x2="18" y2="14"></line>
                </svg>
            </div>
        <?php endif; ?>
        
        <?php if($product->is_new): ?>
            <span class="badge badge-new">Nuevo</span>
        <?php endif; ?>
        
        <?php if($product->hasDiscount()): ?>
            <span class="badge badge-sale">-<?php echo e($product->discount_percent); ?>%</span>
        <?php endif; ?>
        
        <div class="product-overlay">
            <a href="<?php echo e(route('products.show', $product->slug)); ?>" class="btn btn-primary">Ver Detalles</a>
            <form action="<?php echo e(route('cart.add')); ?>" method="POST" class="add-to-cart-form">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="product_id" value="<?php echo e($product->id); ?>">
                <button type="submit" class="btn btn-accent">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <circle cx="9" cy="21" r="1"></circle>
                        <circle cx="20" cy="21" r="1"></circle>
                        <path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path>
                    </svg>
                    Agregar
                </button>
            </form>
        </div>
    </div>
    
    <div class="product-info">
        <span class="product-platform"><?php echo e($product->platform); ?></span>
        <h3 class="product-title">
            <a href="<?php echo e(route('products.show', $product->slug)); ?>"><?php echo e($product->name); ?></a>
        </h3>
        <div class="product-price">
            <?php if($product->hasDiscount()): ?>
                <span class="price-original">$<?php echo e(number_format($product->price, 2)); ?></span>
                <span class="price-current">$<?php echo e(number_format($product->final_price, 2)); ?></span>
            <?php else: ?>
                <span class="price-current">$<?php echo e(number_format($product->price, 2)); ?></span>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH C:\laragon\www\proyecto_negocios_electronicos\resources\views/components/product-card.blade.php ENDPATH**/ ?>