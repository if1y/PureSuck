<?php if (!defined('__TYPECHO_ROOT_DIR__'))
  exit; ?>
<?php
$currentPage = max(1, (int)$this->_currentPage);
$pageSize = (isset($this->parameter) && isset($this->parameter->pageSize)) ? (int)$this->parameter->pageSize : 0;
$totalItems = 0;
$showPager = $this->is('index') || $this->is('archive');

if ($showPager) {
  try {
    $totalItems = (int)$this->getTotal();
  } catch (Throwable $e) {
    $showPager = false;
  }
}

$totalPages = $pageSize > 0 ? (int)ceil($totalItems / $pageSize) : 1;
if ($totalPages < 1) {
  $totalPages = 1;
}
?>
<?php if ($showPager): ?>
  <nav class="nav main-pager" role="navigation"
    aria-label="<?= $this->is('index') ? '文章列表分页导航' : '归档列表分页导航'; ?>" data-js="pager">
    <div class="main-pager-inner">
      <span class="main-pager-nav main-pager-prev">
        <?php $this->pageLink('上一页', 'prev'); ?>
      </span>
      <span class="main-pager-info">
        第 <?= $currentPage; ?> 页 / 共 <?= $totalPages; ?> 页
      </span>
      <span class="main-pager-nav main-pager-next">
        <?php $this->pageLink('下一页', 'next'); ?>
      </span>
    </div>
  </nav>
  <footer class="nav main-lastinfo" role="contentinfo" aria-label="站点页脚信息">
    <span class="nav-item-alt">
      <?= $this->options->footerInfo; ?>
    </span>
  </footer>
<?php else: ?>
  <div class="nav main-pager" data-js="pager">
    <footer class="nav main-lastinfo" role="contentinfo" aria-label="站点页脚信息">
      <span class="nav-item-alt">
        <?= $this->options->footerInfo; ?>
      </span>
    </footer>
  </div>
<?php endif; ?>

</main>
                </div><!-- close swup -->
            </section><!-- close content-main -->
            <?php $this->need('sidebar.php'); ?>
        </section><!-- close content-layout -->
    </div><!-- close site wrapper -->
<?php $this->footer(); ?>

<div class="go-top" id="go-top">
  <a href="#" class="go icon-up-open" aria-label="返回顶部"></a>
</div>

<?php if ($this->options->footerScript): ?>
  <?= $this->options->footerScript; ?>
<?php endif; ?>
</body>

</html>
