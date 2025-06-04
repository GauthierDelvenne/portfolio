<?php

use portfolio\forms\ContactForm;

include_once('functions/acf.php');

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/functions/disable-gutenberg.php';
include_once __DIR__ . '/functions/remove-default-actions.php';
include_once __DIR__ . '/functions/vite-manifest.php';
include_once __DIR__ . '/functions/navigation.php';
include_once __DIR__ . '/functions/project-post.php';
include_once __DIR__ . '/functions/contact-post.php';
include_once __DIR__ . '/functions/verify_contact.php';
include_once __DIR__ . '/functions/srcset-create.php';
include_once __DIR__ . '/functions/translate.php';
include_once __DIR__ . '/functions/taxonomy.php';
include_once __DIR__ . '/functions/disable-cache.php';
include_once __DIR__ . '/functions/schema-org.php';




