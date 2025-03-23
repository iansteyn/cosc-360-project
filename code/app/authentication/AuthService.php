<?php

class AuthService {
  /**
   * @param array $allowedRoles
   * Checks if users are logged in, and redirects them to the login page if not.
   * Checks user roles for restricted pages (e.g., admin page).
   */
  public static function requireAuth(array $allowedRoles) {
    // Check if the user is logged in
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
      header('Location: /login');
      exit;
    }

    // If roles are specified for a page, check the user role and redirect
    if (!empty($allowedRoles)) {
      if (!isset($_SESSION['role']) || !in_array($_SESSION['role'], $allowedRoles)) {
        header('Location: /error');
        exit;
      }
    }
  }
}

?>
