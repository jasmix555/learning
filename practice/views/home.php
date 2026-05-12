  <section class="section hero">
    <div class="container hero__inner">
      <div class="hero__text">
        <h1><?= tr("hero_title") ?></h1>
        <p class="hero__desc"><?= tr("hero_desc") ?></p>

        <div class="hero__cta">
          <a class="btn primary" href="<?= link_to('products') ?>"><?= tr("hero_cta_primary") ?></a>
          <a class="btn secondary" href="<?= link_to('about') ?>"><?= tr("hero_cta_secondary") ?></a>
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
