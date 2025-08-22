<?php

// $_SESSION['auth'];
session_destroy();
header('location: /book-wise/login');
exit();