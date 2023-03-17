<?php
session_start();

if (isset($_SESSION['username'])) {
  // User session is active
  echo 'active';
} else {
  // User session is not active
  echo 'inactive';
}
