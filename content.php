<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>
<?php
/**
 * 纯内容页面
 *
 * @package custom
 */
?>
<?php $this->need('header.php'); ?>

<div class="wrapper">

    <?php
    $hasImg = $this->fields->img ? true : false;
    ?>
    <article class="post <?= $hasImg ? 'post--photo post--cover' : 'post--text'; ?> main-item" data-ps-page-shell="page">
        <div class="post-inner">
            <header class="post-item post-header  <?= $hasImg ? 'no-bg' : ''; ?>"></header>

            <!-- 大图样式 -->
            <?php if ($hasImg): ?>
                <figure class="post-media <?= $this->is('post') ? 'single' : ''; ?>">
                    <img itemprop="image"
                        src="<?php $this->fields->img(); ?>"
                        alt="头图"
                        loading="eager"
                        decoding="async"
                        fetchpriority="high">
                </figure>
            <?php endif; ?>

            <section class="post-item post-body">
                <div class="wrapper post-wrapper">
                    <h1 class="post-title">
                        <a href="<?php $this->permalink() ?>" title="<?php $this->title() ?>">
                            <?php $this->title() ?>
                        </a>
                    </h1>
                    <div class="inner-post-wrapper">

                        <!-- 解析正文以及短代码 -->
                        <div class="post-content">
                            <!-- 优化去掉 meta 后的间距 -->
                            <p style="height:0.5em;margin:0;overflow:hidden;">&nbsp;</p>
                            <?= renderPostContent($this->content); ?>
                        </div>

                    </div>
                </div>
            </section>

        </div>
    </article>

</div>

<?php $this->need('footer.php'); ?>