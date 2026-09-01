<?php

session_start();
session_unset();
session_destroy();

//Going back to login Page
header("location: ../view/index.php?signup=none");
