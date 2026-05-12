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
