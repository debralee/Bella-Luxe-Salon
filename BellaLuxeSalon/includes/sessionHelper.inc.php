<?php
function ensureSessionStarted()
{
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
// Then call ensureSessionStarted() instead of session_start() in all your files.