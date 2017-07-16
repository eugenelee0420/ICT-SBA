<?php
// Functions to be included in other pages

// Function to return the studentId of the current sessionId
function getStudentId($sessId) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
  	die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $sql = 'SELECT studentId FROM session WHERE sessionId = "'.$sessId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$conn->error);
  }

  $row = mysqli_fetch_assoc($result);
  return $row['studentId'];

  mysqli_free_result($result);
}

// Warpper function to echo getStudentId
function echoGetStudentId($sessId) {

  $return = getStudentId($sessId);
  echo $return;

}

// Function to return the userName of the current sessionId
function getUserName($sessId) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
    die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $studentId = getStudentId($sessId);

  $sql = 'SELECT userName from users WHERE studentId = "'.$studentId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$conn->error);
  }

  $row = mysqli_fetch_assoc($result);
  return $row['userName'];

  mysqli_free_result($result);

}

// Wrapper function to echo getUserName
function echoGetUserName($sessId) {

  $return = getUserName($sessId);
  echo $return;

}

// Function to get userName from studentId
function userNameFromStudentId($studentId) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
    die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $sql = 'SELECT userName FROM users WHERE studentId = "'.$studentId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$stmt->error);
  }

  $row = mysqli_fetch_assoc($result);

  return $row['userName'];

}

// Function to return the houseName of the current sessison
function getUserHouseName($sessId) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
    die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $studentId = getStudentId($sessId);

  $sql = 'SELECT h.houseName FROM users u JOIN house h ON u.hId = h.hId WHERE u.studentId = "'.$studentId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$conn->error);
  }

  $row = mysqli_fetch_assoc($result);
  return $row['houseName'];

  mysqli_free_result($result);

}

// Wrapper function to echo getUserHouseName
function echoGetUserHouseName($sessId) {

  $return = getUserHouseName($sessId);
  echo $return;

}

// Function to get hId of current sessionId
function getUserHId($sessId) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
    die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $studentId = getStudentId($sessId);

  $sql = 'SELECT hId from users WHERE studentId = "'.$studentId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$conn->error);
  }

  $row = mysqli_fetch_assoc($result);
  return $row['hId'];

  mysqli_free_result($result);

}

// Function to get user setting
function getUserSetting($sessId,$setting) {

  require "cfg.php";

  // Connect to database
  $conn = new mysqli($dbHost,$dbUser,$dbPass,$dbName);
  if ($conn->connect_error) {
    die('<font color="red">Connection failed: '.$conn->connect_error.'</font>');
  }

  $studentId = getStudentId($sessId);

  $sql = 'SELECT '.$setting.' FROM userSetting WHERE studentId = "'.$studentId.'";';
  $result = $conn->query($sql);
  if (!$result) {
    die('Query failed. '.$conn->error);
  }

  $row = mysqli_fetch_assoc($result);
  return $row["$setting"];

  mysqli_free_result($result);

}

?>
