<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>
<?php
if (isset($this->response) && method_exists($this->response, 'setStatus')) {
    $this->response->setStatus(404);
}
if (function_exists('http_response_code')) {
    http_response_code(404);
}
header('X-Robots-Tag: noindex, nofollow', true);
?>
<?php $this->need('header.php'); ?>

<div class="wrapper ps-404-layout">
    <article class="post post--text post--index main-item">
        <div class="post-inner">
            <section class="post-item post-body ps-404-body">
                <div class="wrapper post-wrapper ps-404-card">
                    <p class="ps-404-image-wrap">
                        <img src="<?php $this->options->themeUrl('images/error.webp'); ?>" id="error" class="ps-404-image">
                    </p>
                    <p class="ps-404-code">404 Not Found</p>
                    <h1 class="ps-404-title">页面没找到</h1>
                    <a class="submit ps-404-button" href="<?php $this->options->siteUrl(); ?>">返回首页</a>
                </div>
            </section>
        </div>
    </article>
</div>

<?php $this->need('footer.php'); ?>