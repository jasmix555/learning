<?php
// $lang and $page are set by index.php / bootstrap.php in the global scope.
// Re-declare them here so static analyzers know where they come from.
global $lang, $page;
?>
<header class="header">
  <div class="container header__inner">
    <div class="logo">
      <a href="<?= link_to('home') ?>">
        <span class="logo__brand"><?= tr("site_name", "Blendy") ?></span>
        <span class="logo__sub"><?= tr("site_tagline") ?></span>
      </a>
    </div>

    <nav class="nav">
      <a href="<?= link_to('home') ?>"     class="<?= $page === 'home'     ? 'active' : '' ?>"><?= tr("nav_concept") ?></a>
      <a href="<?= link_to('products') ?>" class="<?= $page === 'products' ? 'active' : '' ?>"><?= tr("nav_products") ?></a>
      <a href="<?= link_to('about') ?>"    class="<?= $page === 'about'    ? 'active' : '' ?>"><?= tr("nav_story") ?></a>
      <a href="<?= link_to('faq') ?>"      class="<?= $page === 'faq'      ? 'active' : '' ?>"><?= tr("nav_faq") ?></a>
    </nav>

    <div class="lang">
      <a class="<?= $lang === "jp" ? "active" : "" ?>" href="<?= lang_url('jp') ?>">JP</a>
      <a class="<?= $lang === "en" ? "active" : "" ?>" href="<?= lang_url('en') ?>">EN</a>
      <a class="<?= $lang === "cn" ? "active" : "" ?>" href="<?= lang_url('cn') ?>">CH</a>
      <a class="<?= $lang === "kr" ? "active" : "" ?>" href="<?= lang_url('kr') ?>">KR</a>
    </div>
  </div>
</header>

<main>
