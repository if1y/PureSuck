<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>
<?php $this->need('header.php'); ?>

<div class="wrapper">

    <?php
    $hasImg = $this->fields->img ? true : false;
    $postViews = getPostView($this);
    ?>
    <article class="post <?= $hasImg ? 'post--photo post--cover' : 'post--text'; ?> main-item" data-ps-page-shell="page">
        <div class="post-inner">
            <header class="post-item post-header  <?= $hasImg ? 'no-bg' : ''; ?>">
                <div class="wrapper post-wrapper">
                    <div class="avatar post-author">
                        <img src="<?= $this->options->authorAvatar ?: $this->options->themeUrl('images/avatar.webp'); ?>"
                            alt="作者头像" class="avatar-item avatar-img">
                        <span class="avatar-item"><?php $this->author(); ?></span>
                    </div>
                </div>
            </header>

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
                        <div class="meta post-meta">
                            <span class="icon-ui icon-ui-date meta-item meta-date">
                                <span class="meta-count">
                                    <?php $this->date(); ?>
                                </span>
                            </span>
                            <span class="meta-item-group">
                                <span class="icon-ui icon-ui-views meta-item meta-views">
                                    <?= formatNumber($postViews) ?>
                                </span>
                                <a href="<?php $this->permalink() ?>#comments"
                                    class="icon-ui icon-ui-comment meta-item meta-comment">
                                    <?= formatNumber($this->commentsNum) ?>
                                </a>
                            </span>
                        </div>

                        <!-- 解析正文以及短代码 -->
                        <div class="post-content">
                            <?= renderPostContent($this->content); ?>
                        </div>

                    </div>
                </div>
            </section>

            <section class="post-item post-comments">
                <div class="wrapper post-wrapper">
                    <?php $this->need('comments.php'); ?>
                </div>
            </section>
        </div>
    </article>

</div>

<?php $this->need('footer.php'); ?>
