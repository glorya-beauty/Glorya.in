<?php $__env->startSection('title', 'Blog Details - Glorya Beauty'); ?>
<?php $__env->startSection('description', 'Read detailed beauty tips and trends from Glorya Beauty experts'); ?>

<?php $__env->startSection('content'); ?>
<!-- main-area -->
<main>
    <!-- page-title-area -->
    <section class="page-title-area" style="background-image:url(<?php echo e(asset('images/bg/quote_bg.png')); ?>)">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="page-title-content text-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/')); ?>">Home</a></li>
                                <li class="breadcrumb-item"><a href="<?php echo e(url('/blog')); ?>">Blog</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Blog Details</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- page-title-area-end -->

    <!-- blog-details-area -->
    <section class="blog-details-area pt-100 pb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="blog-details-content">
                        <div class="blog-details-thumb">
                            <img src="<?php echo e(asset('images/blog/blog_img01.png')); ?>" alt="Blog Post">
                        </div>
                        <div class="blog-details-meta">
                            <span class="date">15 April, 2024</span>
                            <span class="author">By Glorya Team</span>
                            <span class="category">Skincare</span>
                        </div>
                        <h2>Top 5 Skincare Trends for Spring 2024</h2>
                        <p>Spring is the perfect time to refresh your skincare routine and embrace new beauty trends. As we transition into the warmer months, our skin needs different care and attention. Here are the top 5 skincare trends that will dominate the beauty scene this spring season.</p>
                        
                        <h3>1. Glass Skin Trend</h3>
                        <p>The glass skin trend continues to be popular, focusing on achieving that dewy, luminous complexion. This trend emphasizes hydration and nourishment from within, using lightweight serums and moisturizers that give your skin a translucent, glass-like appearance.</p>
                        
                        <h3>2. Minimalist Skincare</h3>
                        <p>Less is more becomes the mantra for spring skincare. People are moving towards simplified routines with multi-functional products that deliver multiple benefits. This approach reduces the risk of irritation and allows your skin to breathe.</p>
                        
                        <h3>3. Sustainable Beauty</h3>
                        <p>Eco-friendly and sustainable skincare products are gaining momentum. Consumers are becoming more conscious about the environmental impact of their beauty choices, opting for products with minimal packaging and natural ingredients.</p>
                        
                        <h3>4. Skinimalism</h3>
                        <p>This trend combines minimalism with skincare, focusing on enhancing your natural skin rather than covering it up. It's about working with your skin's natural texture and tone while providing essential care and protection.</p>
                        
                        <h3>5. Barrier Repair Focus</h3>
                        <p>Understanding and protecting your skin barrier has become a priority. Products containing ceramides, niacinamide, and other barrier-supporting ingredients are trending as people recognize the importance of a healthy skin barrier.</p>
                        
                        <div class="blog-details-footer">
                            <div class="blog-tags">
                                <h4>Tags:</h4>
                                <a href="#">Skincare</a>
                                <a href="#">Spring Beauty</a>
                                <a href="#">Beauty Trends</a>
                            </div>
                            <div class="blog-share">
                                <h4>Share:</h4>
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="blog-sidebar">
                        <div class="sidebar-widget search-widget">
                            <h4>Search</h4>
                            <form>
                                <input type="text" placeholder="Search...">
                                <button type="submit"><i class="fas fa-search"></i></button>
                            </form>
                        </div>
                        <div class="sidebar-widget category-widget">
                            <h4>Categories</h4>
                            <ul>
                                <li><a href="#">Skincare <span>(5)</span></a></li>
                                <li><a href="#">Makeup <span>(3)</span></a></li>
                                <li><a href="#">Hair Care <span>(4)</span></a></li>
                                <li><a href="#">Nail Art <span>(6)</span></a></li>
                                <li><a href="#">Wellness <span>(2)</span></a></li>
                            </ul>
                        </div>
                        <div class="sidebar-widget recent-post-widget">
                            <h4>Recent Posts</h4>
                            <div class="recent-post">
                                <div class="recent-post-thumb">
                                    <img src="<?php echo e(asset('images/blog/blog_img02.jpg')); ?>" alt="Recent Post">
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="<?php echo e(url('/blog-details')); ?>">Wedding Makeup Tips</a></h5>
                                    <span>10 April, 2024</span>
                                </div>
                            </div>
                            <div class="recent-post">
                                <div class="recent-post-thumb">
                                    <img src="<?php echo e(asset('images/blog/blog_img03.jpeg')); ?>" alt="Recent Post">
                                </div>
                                <div class="recent-post-content">
                                    <h5><a href="<?php echo e(url('/blog-details')); ?>">Hair Style Designs</a></h5>
                                    <span>5 April, 2024</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- blog-details-area-end -->
</main>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\Glorya.in\resources\views/frontend/blog-details.blade.php ENDPATH**/ ?>