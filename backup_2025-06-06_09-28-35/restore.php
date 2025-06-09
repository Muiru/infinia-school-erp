<?php

// Restore script for backup: backup_2025-06-06_09-28-35

$files = [
    'database/migrations/2019_02_10_125119_create_sm_general_settings_table.php',
    'resources/views/backEnd/systemSettings/generalSettingsView.blade.php',
    'resources/views/backEnd/systemSettings/updateGeneralSettings.blade.php',
    'config/spondonit.php',
    'public/backEnd/assets/css/rtl/infix.css',
    'public/backEnd/assets/css/infix.css',
    'resources/views/themes/edulia/demo/about.json',
    'resources/views/themes/edulia/demo/footer_menu.json',
    'resources/views/themes/edulia/demo/privacy_policy.json',
    'resources/views/themes/edulia/demo/header_menu.json',
    'resources/json/test.json',
];

foreach ($files as $file) {
    $backup_file = __DIR__ . '/' . str_replace('/', '_', $file);
    if (file_exists($backup_file)) {
        copy($backup_file, $file);
        echo "Restored: $file\n";
    }
}
