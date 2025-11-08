<?php
$file = 'resources/views/pages/home.blade.php';
$content = file_get_contents($file);

// استبدال جميع مسارات images/ التي لم يتم تحويلها بعد
$patterns = [
    '/src="images\/([^"]+)"/' => 'src="{{ asset(\'images/$1\') }}"',
    '/href="images\/([^"]+)"/' => 'href="{{ asset(\'images/$1\') }}"',
    '/url\(images\/([^)]+)\)/' => 'url({{ asset(\'images/$1\') }})',
];

foreach ($patterns as $pattern => $replacement) {
    $content = preg_replace($pattern, $replacement, $content);
}

file_put_contents($file, $content);
echo "تم إصلاح جميع مسارات الصور!\n";

