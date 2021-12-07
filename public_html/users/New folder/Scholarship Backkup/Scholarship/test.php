<?php
  session_start();
  $_SESSION['time'] = time();

  echo $_SESSION['time'];