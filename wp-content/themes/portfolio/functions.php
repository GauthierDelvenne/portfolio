<?php
include_once('acf.php');


if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
include_once __DIR__ . '/disable-gutenberg.php';
include_once __DIR__ . '/remove-default-actions.php';
include_once __DIR__ . '/vite-manifest.php';
include_once __DIR__ . '/navigation.php';
include_once __DIR__ . '/project-post.php';



