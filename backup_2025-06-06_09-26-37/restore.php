<?php
// Restore script for infinia changes
$backupDir = 'backup_' . date('Y-m-d_H-i-s');

if (!file_exists($backupDir)) {
    die("Backup directory not found: $backupDir\n");
}

$files = glob($backupDir . '/**/*', GLOB_BRACE);
foreach ($files as $file) {
    if (is_file($file)) {
        $targetFile = str_replace($backupDir . '/', '', $file);
        if (!file_exists(dirname($targetFile))) {
            mkdir(dirname($targetFile), 0777, true);
        }
        copy($file, $targetFile);
        echo "Restored: $targetFile\n";
    }
}
echo "Restore completed.\n";