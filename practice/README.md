# Practice — Multi-Language PHP Site Template

A small template for a multi-page, multi-language website built with
plain PHP (no framework) and JSON translation files. Built as a
learning demo, designed to be easy to customize for real projects.

Supports 4 languages out of the box: **Japanese, English, Chinese, Korean.**

---

## Quick Start

1. Place this folder inside XAMPP's `htdocs` (already done if you're reading this from `c:/xampp/htdocs/`).
2. Start Apache from the XAMPP control panel.
3. Visit `http://localhost:{xxx}}/` in a browser.
4. Click the language buttons (JP / EN / CH / KR) in the header.

---

## URL Pattern

Clean URLs look like this:

```
/                  → default (Japanese home)
/jp                → Japanese home
/en                → English home
/en/about          → English About page
/cn/products       → Chinese Products page
/kr/faq            → Korean FAQ
```

The pattern is `/{lang}/{page}` where:
- **lang** is one of `jp`, `en`, `cn`, `kr`
- **page** is any view file in `views/` (e.g. `home`, `about`, `products`, `faq`)

Apache rewrites these clean URLs to `index.php?lang=...&page=...` behind
the scenes. See [.htaccess](.htaccess) for the rewrite rules.

---

## File Map

```
file/
├── index.php              ← Front controller. ALL requests come here.
├── bootstrap.php          ← Loads language + defines helper functions
├── .htaccess              ← URL rewrite rules (Apache config)
├── README.md              ← This file
│
├── lang/                  ← All translation strings live here
│   ├── jp/
│   │   ├── common.json    ← Used on every page (nav, footer, site name)
│   │   ├── home.json      ← Hero + concept section
│   │   ├── products.json  ← Products section
│   │   ├── about.json     ← Story + sustainability
│   │   └── faq.json       ← FAQ questions/answers
│   ├── en/   (same 5 files)
│   ├── cn/   (same 5 files)
│   └── kr/   (same 5 files)
│
├── views/                 ← Page templates
│   ├── partials/
│   │   ├── head.php       ← <!DOCTYPE>, <head>, opens <body>
│   │   ├── header.php     ← Logo + nav + language switcher
│   │   └── footer.php     ← Footer + closes </html>
│   ├── home.php           ← Hero + concept
│   ├── products.php       ← Products grid
│   ├── about.php          ← Story + sustainability
│   ├── faq.php            ← FAQ accordion
│   └── 404.php            ← Not Found page
│
└── assets/                ← CSS, JS, images
    ├── css/
    ├── scss/
    └── script.js
```

---

## How a Request Flows

When you visit `/en/about`:

1. **Apache** reads [.htaccess](.htaccess), matches the URL against
   `^([a-z]{2})/([a-z0-9_-]+)/?$`, and **internally rewrites** the
   request to `index.php?lang=en&page=about`. The browser still
   displays the pretty URL.

2. **index.php** is loaded. It `requires` [bootstrap.php](bootstrap.php).

3. **bootstrap.php** runs:
   - Reads `$_GET['lang']`, validates it (must be in the supported list).
   - Loads `lang/en/common.json` into the `$t` array.
   - Defines helper functions: `tr()`, `url()`, `link_to()`, `lang_url()`, `load_lang_section()`.

4. Back in **index.php**:
   - Reads `$_GET['page']` (= `"about"`).
   - Checks that `views/about.php` exists. If not, shows 404.
   - Calls `load_lang_section("about")` to merge `lang/en/about.json` into `$t`.
   - Includes the four templates in order: head → header → about.php → footer.

5. The view file uses `<?= tr("story_title") ?>` to print translated
   strings. The `tr()` function looks up the key in `$t` and HTML-escapes the result.

---

## For Content Editors — How to Change Text

All visible text lives in `lang/{lang}/{page}.json`. Find the file that
matches the section you want to edit, change the value, save.

**Example:** Want to change the headline on the English home page?
Open [lang/en/home.json](lang/en/home.json), find `"hero_title"`, edit
its value, save. Refresh the browser.

| File | What text it controls |
|------|----------------------|
| `common.json` | Nav menu, footer, site name, default tab title |
| `home.json` | Hero section + "Concept" 3 cards |
| `products.json` | Products section title + 3 product cards |
| `about.json` | Brand story + sustainability |
| `faq.json` | All 4 FAQ questions and answers |

**To keep translations consistent**, edit the same key in all 4 language
files (jp, en, cn, kr). If a key is missing from a language's file,
the page falls back to whatever is in `common.json` (or shows blank).

**Tip:** Browser tab titles come from each page's `page_title` key. If
a page doesn't define `page_title`, the one from `common.json` is used.

---

## For Developers — How to Add a New Page

Suppose you want a "Contact" page at `/en/contact`, `/jp/contact`, etc.

### Step 1 — Create the view file

Create [views/contact.php](views/contact.php) with just the section markup
(no `<html>`, no `<head>`, no nav — those come from partials):

```php
<section class="section">
  <div class="container">
    <h2><?= tr("contact_title") ?></h2>
    <p class="lead"><?= tr("contact_lead") ?></p>
    <p>
      <a href="mailto:<?= tr("contact_email") ?>">
        <?= tr("contact_email") ?>
      </a>
    </p>
  </div>
</section>
```

### Step 2 — Create the translation files

Create `lang/jp/contact.json`, `lang/en/contact.json`, etc:

```json
{
  "page_title": "Contact | Blendy",
  "contact_title": "Contact Us",
  "contact_lead": "We'd love to hear from you.",
  "contact_email": "hello@blendy.example.com"
}
```

(Repeat for `jp/`, `cn/`, `kr/` with translated content.)

### Step 3 (optional) — Add to the navigation

In [views/partials/header.php](views/partials/header.php), add a link:

```php
<a href="<?= link_to('contact') ?>"
   class="<?= $page === 'contact' ? 'active' : '' ?>">
  <?= tr("nav_contact") ?>
</a>
```

Then add `"nav_contact": "Contact"` (or translation) to each `common.json`.

**That's it.** Visit `/en/contact` and it works. The router
auto-detects that `views/contact.php` exists; no code changes required
in `index.php`.

---

## For Developers — How to Add a New Language

Suppose you want German (`de`).

1. Open [bootstrap.php](bootstrap.php), find:
   ```php
   $supportedLangs = ["jp", "en", "cn", "kr"];
   ```
   Add `"de"`.

2. Create `lang/de/` folder with all 5 JSON files. Easiest way:
   copy `lang/en/` to `lang/de/` and translate each value.

3. In [views/partials/header.php](views/partials/header.php) add a
   button to the lang switcher:
   ```php
   <a class="<?= $lang === "de" ? "active" : "" ?>" href="<?= lang_url('de') ?>">DE</a>
   ```

4. (Optional, good for SEO) In [views/partials/head.php](views/partials/head.php)
   add:
   ```php
   <link rel="alternate" hreflang="de" href="<?= lang_url('de') ?>" />
   ```

---

## Helper Functions Cheat Sheet

These are defined in [bootstrap.php](bootstrap.php) and available everywhere.

| Function | What it does | Example |
|----------|-------------|---------|
| `tr("key")` | Look up a translation (HTML-escaped) | `<?= tr("hero_title") ?>` |
| `tr("key", "default")` | Same, with a fallback if the key is missing | `<?= tr("missing", "Default") ?>` |
| `link_to("page")` | Build a URL to another page in the current language | `<a href="<?= link_to('about') ?>">` |
| `lang_url("lang")` | Build a URL to the current page in another language | `<a href="<?= lang_url('en') ?>">EN</a>` |
| `url("path")` | Build an absolute URL to an asset | `<img src="<?= url('assets/logo.png') ?>">` |

---

## Troubleshooting

### Pages 404 or CSS/JS doesn't load

Apache's `mod_rewrite` may not be enabled, or `.htaccess` overrides may
not be allowed. In XAMPP's `apache/conf/httpd.conf`:

1. Make sure this line is **not** commented out:
   ```apache
   LoadModule rewrite_module modules/mod_rewrite.so
   ```

2. Inside `<Directory "C:/xampp/htdocs">`, make sure it says:
   ```apache
   AllowOverride All
   ```
   (not `AllowOverride None`)

3. Restart Apache from the XAMPP control panel.

### "Invalid JSON in: ..." error

Your JSON file has a syntax error. Common causes:
- Missing comma between keys.
- **Trailing comma** after the last key in an object (not allowed in JSON).
- Unescaped double-quote inside a string value — use `\"` to include a quote.
- Smart quotes (`"` `"`) from Word/Pages instead of straight quotes (`"`).

Paste your JSON into [jsonlint.com](https://jsonlint.com/) to find the line.

### Browser tab title doesn't change between pages

The page's JSON file needs a `page_title` key. If it's missing, the
title from `common.json` is used. Check the JSON file for that page.

### Language switcher stays on the same page but text doesn't change

The lang code in your JSON folder name doesn't match the value in
`$supportedLangs`. Folder must be exactly `jp` / `en` / `cn` / `kr`
(lowercase, two letters).

### "Undefined variable" warnings in IDE

Static analyzers (PhpStorm, Intelephense) don't always know that
variables like `$lang` are set by `bootstrap.php` before a partial is
included. The partials use `global $lang, $page;` declarations to tell
the analyzer where they come from. If you still see warnings, restart
the language server / reload the IDE window.

---

## Key Design Choices Explained

**Why is there only one `index.php`?**
This is called the **front controller pattern**. Every request hits the
same entry point, which decides what to render. Benefits: one place to
handle language/auth/etc., one place to define the page layout, easy to
add new pages without editing Apache config.

**Why split JSON files by section instead of one big file per language?**
So content editors (e.g. marketing, translators) can find their page
quickly. When somebody asks "where do I change the FAQ text?", the
answer is just "open `lang/en/faq.json`". The split also reduces merge
conflicts when multiple people edit different pages.

**Why `/lang/page` and not `?lang=en&page=about`?**
SEO. Search engines (especially Google) treat path-based language
subdirectories (`/en/...`) as distinct locales for indexing. Query-string
parameters often get treated as the same URL with different content,
which can hurt rankings. Apple, BMW, and most major brands use this
pattern.

**Why escape strings inside `tr()`?**
Every value returned by `tr()` is wrapped in `htmlspecialchars()` so
that even if a translator includes `<script>` or `&` in a JSON file,
it can't break the page or create an XSS vulnerability. This means
you should NOT double-escape in views — just use `<?= tr("key") ?>`.
