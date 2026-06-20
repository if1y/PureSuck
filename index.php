<?php

/**
 * 干净，纯洁，淡雅朴素。
 * It's PureSuck For You.
 * 
 * @package PureSuck
 * @author MoXiify
 * @version 1.3.2
 * @link https://www.moxiify.cn
 */
if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;
$this->need('header.php');
?>

<div class="wrapper">

    <?php while ($this->next()): ?>
        <?php
        $hasImg = $this->fields->img ? true : false;
        ?>
        <article class="post <?= $hasImg ? 'post--photo post--cover' : 'post--text'; ?> post--index main-item <?= $this->hidden ? 'post-protected' : ''; ?>" data-protected="<?= $this->hidden ? 'true' : 'false'; ?>" data-ps-post-key="<?= $this->cid; ?>">
            <div class="post-inner">

                <header class="post-item post-header  <?= $hasImg ? 'no-bg' : ''; ?>">
                    <div class="wrapper post-wrapper">
                        <div class="post-header-meta">
                            <?php $categories = $this->categories; if (!empty($categories)): $cat = $categories[0]; ?>
                            <a class="post-category" href="<?= $cat['permalink']; ?>">
                                <span class="post-category-name"><?= htmlspecialchars($cat['name']); ?></span>
                            </a>
                            <?php endif; ?>
                            <?php if ($this->options->showPostTags == '1'): $tags = $this->tags; if (!empty($tags)): ?>
                            <div class="post-tags">
                                <?php foreach ($tags as $tag): ?>
                                <a class="post-tag" href="<?= $tag['permalink']; ?>">
                                    <span class="post-tag-name"><?= htmlspecialchars($tag['name']); ?></span>
                                </a>
                                <?php endforeach; ?>
                            </div>
                            <?php endif; endif; ?>
                        </div>
                    </div>
                </header>

                <!-- 大图样式 -->
                <?php if ($hasImg): ?>
                    <figure class="post-media <?= $this->is('post') ? 'single' : ''; ?>">
                        <img itemprop="image" src="<?php $this->fields->img(); ?>" alt="头图"
                            decoding="async" fetchpriority="auto">
                    </figure>
                <?php endif; ?>

                <!-- 文章作者 -->
                <section class="post-item post-body">
                    <div class="wrapper post-wrapper">
                        <h1 class="post-title">
                            <a href="<?php $this->permalink() ?>">
                                <?php $this->title() ?>
                            </a>
                        </h1>

                        <!-- 摘要 -->
                        <?php if ($this->hidden): ?>
                            <p class="post-excerpt">该文章已加密，请输入密码后查看。</p>
                        <?php else: ?>
                            <p class="post-excerpt">
                                <?php if ($this->fields->desc): ?>
                                    <?= $this->fields->desc; ?>
                                <?php else: ?>
                                    <?php $this->excerpt(200, ''); ?>
                                <?php endif; ?>
                            </p>
                        <?php endif; ?>

                    </div>
                </section>

                <footer class="post-item post-footer">
                    <div class="wrapper post-wrapper">
                        <div class="meta post-meta">
                            <a itemprop="datePublished" href="<?php $this->permalink() ?>"
                                class="icon-ui icon-ui-date meta-item meta-date">
                                <span class="meta-count">
                                    <?php $this->date(); ?>
                                </span>
                            </a>
                            <a href="<?php $this->permalink() ?>#comments"
                                class="icon-ui icon-ui-comment meta-item meta-comment">
                                <?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?>
                            </a>
                        </div>
                    </div>
                </footer>
            </div>
        </article>
    <?php endwhile; ?>
</div>

<?php $this->need('footer.php'); ?>
