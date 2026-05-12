<?php
// ---------------------------------------------------------------
// Front controller. Every request lands here.
//
//   1. bootstrap.php loads language + common dictionary
//   2. Read $_GET['page'] (set by .htaccess from the URL)
//   3. If views/{page}.php exists, render it. Otherwise -> 404.
//   4. load_lang_section({page}) auto-loads lang/{lang}/{page}.json
//   5. Render: head -> header -> page view -> footer
//
// To add a new page (e.g. "contact"):
//   - Create views/contact.php           (the markup)
//   - Create lang/jp/contact.json (and en/cn/kr) — optional, only
//     if the page has its own translation strings.
//   - Optionally add a nav link in views/partials/header.php
// That's it. No code changes here.
// ---------------------------------------------------------------

require __DIR__ . "/bootstrap.php";

$page = $_GET["page"] ?? "home";

// Safety: only allow simple slugs (letters, digits, dash, underscore).
// This prevents path traversal like ?page=../../etc/passwd.
if (!preg_match('/^[a-z0-9_-]+$/i', $page)) {
    $page = "404";
}

$viewFile = __DIR__ . "/views/{$page}.php";

if (!file_exists($viewFile)) {
    http_response_code(404);
    $page = "404";
    $viewFile = __DIR__ . "/views/404.php";
}

// Load the page's translation section if a JSON file exists for it.
// (load_lang_section() returns false silently if not found — that's
// fine, the page just falls back to common.json strings.)
load_lang_section($page);

// Title comes from the page's own JSON if it defines one, otherwise
// the default from common.json.
$pageTitle = tr("page_title");

require __DIR__ . "/views/partials/head.php";
require __DIR__ . "/views/partials/header.php";
require $viewFile;
require __DIR__ . "/views/partials/footer.php";
