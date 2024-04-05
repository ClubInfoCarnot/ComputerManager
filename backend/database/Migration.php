<?php
function createMigration() {
    include 'backend/database/Connection.php';
    $pdo = getCon();
    $pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, false);
}