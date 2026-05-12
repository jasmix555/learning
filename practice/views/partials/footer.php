</main>

<footer class="footer">
  <div class="container footer__inner">
    <div>
      <p class="footer__brand"><?= tr("site_name", "Blendy") ?></p>
      <p class="footer__desc"><?= tr("footer_desc") ?></p>
    </div>

    <div class="footer__links">
      <a href="<?= link_to('home') ?>"><?= tr("footer_link_concept") ?></a>
      <a href="<?= link_to('products') ?>"><?= tr("footer_link_products") ?></a>
      <a href="<?= link_to('about') ?>"><?= tr("footer_link_story") ?></a>
      <a href="<?= link_to('faq') ?>"><?= tr("footer_link_faq") ?></a>
    </div>

    <div class="footer__copy">
      <p><?= tr("footer_copy") ?></p>
    </div>
  </div>
</footer>

<script src="<?= url('assets/script.js') ?>"></script>
</body>
</html>
