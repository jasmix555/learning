<?php
// ---------------------------------------------------------------
// bootstrap.php
// Runs on every request.
//   1. Detects language
//   2. Loads the always-needed dictionary (lang/{lang}/common.json)
//   3. Exposes helpers: tr(), url(), link_to(), lang_url(),
//      load_lang_section()
//
// The router (index.php) calls load_lang_section($page) afterwards
// to merge the page-specific dictionary into $t.
// ---------------------------------------------------------------

// Base URL path to this project. Auto-detected so the same code
// works under "/" or "/github/learning/practice/".
$basePath = rtrim(str_replace("\\", "/", dirname($_SERVER["SCRIPT_NAME"])), "/") . "/";

$supportedLangs = ["jp", "en", "cn", "kr"];
$defaultLang = "jp";

$lang = $_GET["lang"] ?? "";
if (!in_array($lang, $supportedLangs, true)) {
    $lang = $defaultLang;
}

// $t accumulates translations from every section loaded.
$t = [];

/**
 * Load a JSON section file (lang/{lang}/{section}.json) and merge
 * its keys into $t. Later loads overwrite earlier keys (so a page
 * can override a common value if needed).
 */
function load_lang_section($section) {
    global $t, $lang;
    $file = __DIR__ . "/lang/{$lang}/{$section}.json";

    if (!file_exists($file)) {
        return false;
    }

    $data = json_decode(file_get_contents($file), true);
    if (!is_array($data)) {
        http_response_code(500);
        die("Invalid JSON in: " . htmlspecialchars($file));
    }

    $t = array_merge($t, $data);
    return true;
}

// Always load shared strings (nav, footer, site name, meta).
if (!load_lang_section("common")) {
    http_response_code(500);
    die("Missing language file: lang/{$lang}/common.json");
}

function tr($key, $fallback = "") {
    global $t;
    return htmlspecialchars($t[$key] ?? $fallback, ENT_QUOTES, "UTF-8");
}

// Absolute URL relative to the project root.
function url($path = "") {
    global $basePath;
    return $basePath . ltrim($path, "/");
}

// /lang/page URL that preserves current language.
function link_to($page) {
    global $lang;
    return url("{$lang}/{$page}");
}

// /lang/page URL that switches language but keeps current page.
function lang_url($targetLang) {
    $page = $_GET["page"] ?? "home";
    return url("{$targetLang}/{$page}");
}
