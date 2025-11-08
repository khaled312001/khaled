<?php
$content = file_get_contents('home_content.html');

// استبدال مسارات الصور
$content = preg_replace('/src="images\/([^"]+)"/', 'src="{{ asset(\'images/$1\') }}"', $content);
$content = preg_replace('/href="images\/([^"]+)"/', 'href="{{ asset(\'images/$1\') }}"', $content);
$content = preg_replace('/url\(images\/([^)]+)\)/', 'url({{ asset(\'images/$1\') }})', $content);

// إضافة extends layout في البداية
$bladeContent = '@extends(\'layouts.app\')

@section(\'title\', \'Homepage\')

@section(\'content\')
' . $content . '
@endsection
';

file_put_contents('resources/views/pages/home.blade.php', $bladeContent);
echo "تم تحويل الملف بنجاح!\n";

