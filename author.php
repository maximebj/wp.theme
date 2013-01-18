<?php
  // security measure to avoid displaying admin or other login by typing ?author=1 in the URL
  // redirect to home page
  header('Location: '.home_url('/'));

?>
