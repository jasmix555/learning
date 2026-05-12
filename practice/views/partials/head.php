<?php
// $lang and $pageTitle are set by index.php / bootstrap.php in the global scope.
global $lang, $pageTitle;
?>
<!DOCTYPE html>
<html lang="<?= htmlspecialchars($lang) ?>">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= htmlspecialchars($pageTitle, ENT_QUOTES, "UTF-8") ?></title>

  <meta name="description" content="<?= tr("meta_description") ?>" />

  <link rel="stylesheet" href="<?= url('assets/css/style.css') ?>" />

  <link rel="alternate" hreflang="ja" href="<?= lang_url('ja') ?>" />
  <link rel="alternate" hreflang="en" href="<?= lang_url('en') ?>" />
  <link rel="alternate" hreflang="zh" href="<?= lang_url('zh') ?>" />
  <link rel="alternate" hreflang="ko" href="<?= lang_url('ko') ?>" />
</head>
<body>
