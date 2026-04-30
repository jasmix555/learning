<?php
$supportedLangs = ["ja", "en", "cn", "kr"];
$defaultLang = "ja";

// ?lang=en
$lang = $_GET["lang"] ?? "";

// fallback
if (!in_array($lang, $supportedLangs)) {
  $lang = $defaultLang;
}

// load JSON
$langFile = __DIR__ . "/lang/" . $lang . ".json";

if (!file_exists($langFile)) {
  http_response_code(500);
  die("Language file not found: " . htmlspecialchars($langFile));
}

$json = file_get_contents($langFile);
$t = json_decode($json, true);

if (!$t) {
  http_response_code(500);
  die("Invalid JSON in: " . htmlspecialchars($langFile));
}

function tr($key, $fallback = "") {
  global $t;
  return htmlspecialchars($t[$key] ?? $fallback, ENT_QUOTES, "UTF-8");
}

$siteName = tr("site_name", "Blendy");
$pageTitle = tr("page_title", "Blendy Official Site");
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= $pageTitle ?></title>

  <meta name="description" content="<?= tr("meta_description") ?>" />

  <link rel="stylesheet" href="./assets/style.css" />

  <link rel="alternate" hreflang="ja" href="./?lang=ja" />
  <link rel="alternate" hreflang="en" href="./?lang=en" />
  <link rel="alternate" hreflang="cn" href="./?lang=cn" />
  <link rel="alternate" hreflang="kr" href="./?lang=kr" />
</head>

<body>

<header class="header">
  <div class="container header__inner">
    <div class="logo">
      <span class="logo__brand"><?= $siteName ?></span>
      <span class="logo__sub"><?= tr("site_tagline") ?></span>
    </div>

    <nav class="nav">
      <a href="#concept"><?= tr("nav_concept") ?></a>
      <a href="#products"><?= tr("nav_products") ?></a>
      <a href="#story"><?= tr("nav_story") ?></a>
      <a href="#sustainability"><?= tr("nav_sustainability") ?></a>
      <a href="#faq"><?= tr("nav_faq") ?></a>
    </nav>

    <div class="lang">
      <a class="<?= $lang === "ja" ? "active" : "" ?>" href="./?lang=ja">JP</a>
      <a class="<?= $lang === "en" ? "active" : "" ?>" href="./?lang=en">EN</a>
      <a class="<?= $lang === "cn" ? "active" : "" ?>" href="./?lang=cn">中文</a>
      <a class="<?= $lang === "kr" ? "active" : "" ?>" href="./?lang=kr">KR</a>
    </div>
  </div>
</header>

<main>

  <section class="hero">
    <div class="container hero__inner">
      <div class="hero__text">
        <h1><?= tr("hero_title") ?></h1>
        <p class="hero__desc"><?= tr("hero_desc") ?></p>

        <div class="hero__cta">
          <a class="btn primary" href="#products"><?= tr("hero_cta_primary") ?></a>
          <a class="btn secondary" href="#story"><?= tr("hero_cta_secondary") ?></a>
        </div>

        <div class="hero__notes">
          <p><?= tr("hero_note_1") ?></p>
          <p><?= tr("hero_note_2") ?></p>
        </div>
      </div>

      <div class="hero__image">
        <img
          src="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=1000&q=80"
          alt="<?= tr("hero_img_alt") ?>"
          loading="lazy"
        />
      </div>
    </div>
  </section>

  <section class="section" id="concept">
    <div class="container">
      <h2><?= tr("concept_title") ?></h2>
      <p class="lead"><?= tr("concept_lead") ?></p>

      <div class="grid-3">
        <div class="card">
          <h3><?= tr("concept_card_1_title") ?></h3>
          <p><?= tr("concept_card_1_desc") ?></p>
        </div>

        <div class="card">
          <h3><?= tr("concept_card_2_title") ?></h3>
          <p><?= tr("concept_card_2_desc") ?></p>
        </div>

        <div class="card">
          <h3><?= tr("concept_card_3_title") ?></h3>
          <p><?= tr("concept_card_3_desc") ?></p>
        </div>
      </div>
    </div>
  </section>

  <section class="section section--alt" id="products">
    <div class="container">
      <h2><?= tr("products_title") ?></h2>
      <p class="lead"><?= tr("products_lead") ?></p>

      <div class="product-grid">

        <article class="product">
          <img src="https://images.unsplash.com/photo-1528825871115-3581a5387919?auto=format&fit=crop&w=900&q=80" alt="<?= tr("product_1_alt") ?>" loading="lazy" />
          <div class="product__body">
            <h3><?= tr("product_1_title") ?></h3>
            <p><?= tr("product_1_desc") ?></p>
            <ul>
              <li><?= tr("product_1_point_1") ?></li>
              <li><?= tr("product_1_point_2") ?></li>
              <li><?= tr("product_1_point_3") ?></li>
            </ul>
          </div>
        </article>

        <article class="product">
          <img src="https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?auto=format&fit=crop&w=900&q=80" alt="<?= tr("product_2_alt") ?>" loading="lazy" />
          <div class="product__body">
            <h3><?= tr("product_2_title") ?></h3>
            <p><?= tr("product_2_desc") ?></p>
            <ul>
              <li><?= tr("product_2_point_1") ?></li>
              <li><?= tr("product_2_point_2") ?></li>
              <li><?= tr("product_2_point_3") ?></li>
            </ul>
          </div>
        </article>

        <article class="product">
          <img src="https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=900&q=80" alt="<?= tr("product_3_alt") ?>" loading="lazy" />
          <div class="product__body">
            <h3><?= tr("product_3_title") ?></h3>
            <p><?= tr("product_3_desc") ?></p>
            <ul>
              <li><?= tr("product_3_point_1") ?></li>
              <li><?= tr("product_3_point_2") ?></li>
              <li><?= tr("product_3_point_3") ?></li>
            </ul>
          </div>
        </article>

      </div>
    </div>
  </section>

  <section class="section" id="story">
    <div class="container story">
      <div class="story__text">
        <h2><?= tr("story_title") ?></h2>
        <p><?= tr("story_p1") ?></p>
        <p><?= tr("story_p2") ?></p>
        <p><?= tr("story_p3") ?></p>
      </div>

      <div class="story__image">
        <img
          src="https://images.unsplash.com/photo-1521017432531-fbd92d768814?auto=format&fit=crop&w=900&q=80"
          alt="<?= tr("story_img_alt") ?>"
          loading="lazy"
        />
      </div>
    </div>
  </section>

  <section class="section section--alt" id="sustainability">
    <div class="container">
      <h2><?= tr("sus_title") ?></h2>
      <p class="lead"><?= tr("sus_lead") ?></p>

      <div class="grid-2">
        <div class="card">
          <h3><?= tr("sus_card_1_title") ?></h3>
          <p><?= tr("sus_card_1_desc") ?></p>
        </div>

        <div class="card">
          <h3><?= tr("sus_card_2_title") ?></h3>
          <p><?= tr("sus_card_2_desc") ?></p>
        </div>
      </div>

      <div class="quote">
        <p><?= tr("sus_quote") ?></p>
        <span><?= tr("sus_quote_author") ?></span>
      </div>
    </div>
  </section>

  <section class="section" id="faq">
    <div class="container">
      <h2><?= tr("faq_title") ?></h2>
      <p class="lead"><?= tr("faq_lead") ?></p>

      <div class="faq">
        <details>
          <summary><?= tr("faq_q1") ?></summary>
          <p><?= tr("faq_a1") ?></p>
        </details>

        <details>
          <summary><?= tr("faq_q2") ?></summary>
          <p><?= tr("faq_a2") ?></p>
        </details>

        <details>
          <summary><?= tr("faq_q3") ?></summary>
          <p><?= tr("faq_a3") ?></p>
        </details>

        <details>
          <summary><?= tr("faq_q4") ?></summary>
          <p><?= tr("faq_a4") ?></p>
        </details>
      </div>
    </div>
  </section>

</main>

<footer class="footer">
  <div class="container footer__inner">
    <div>
      <p class="footer__brand"><?= $siteName ?></p>
      <p class="footer__desc"><?= tr("footer_desc") ?></p>
    </div>

    <div class="footer__links">
      <a href="#concept"><?= tr("footer_link_concept") ?></a>
      <a href="#products"><?= tr("footer_link_products") ?></a>
      <a href="#story"><?= tr("footer_link_story") ?></a>
      <a href="#faq"><?= tr("footer_link_faq") ?></a>
    </div>

    <div class="footer__copy">
      <p><?= tr("footer_copy") ?></p>
    </div>
  </div>
</footer>

<script src="/assets/script.js"></script>
</body>
</html>