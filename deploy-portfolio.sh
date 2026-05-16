cd domains/khaledahmed.net/public_html
ts=$(date +%s)
cp app/Services/PortfolioService.php app/Services/PortfolioService.php.bak.$ts
echo "Backup: PortfolioService.php.bak.$ts"

php <<'PHP_EOF'
<?php
$fp = "app/Services/PortfolioService.php";
$src = file_get_contents($fp);

$src = str_replace(
    "* 28 real production projects shipped by Khaled Ahmed.",
    "* 34 real production projects shipped by Khaled Ahmed.",
    $src
);

if (strpos($src, "'slug' => 'lotus-sharm'") !== false) {
    echo "lotus-sharm: already present\n";
} else {
    $entry1 = <<<'NEW'
            [
                'slug' => 'lotus-sharm',
                'title' => 'Lotus Sharm — Sharm El-Sheikh Tourism Platform',
                'summary' => 'Tourism and hotel-booking platform for Sharm El-Sheikh — tour packages, transfers, hotel bookings and itinerary management with separate API backend.',
                'title_ar' => 'Lotus Sharm — منصه سياحه وحجوزات شرم الشيخ',
                'summary_ar' => 'منصه سياحه وحجوزات فنادق في شرم الشيخ — باقات سياحيه ونقل وحجز فنادق وإداره برامج رحلات مع API منفصل.',
                'category' => 'Hotel / Events',
                'tech' => ['Next.js', 'TypeScript', 'Node.js', 'Express', 'MongoDB'],
                'url' => 'https://lotussharm.com',
                'image' => 'projects/lotus-sharm.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Egypt',
                'country_ar' => 'مصر',
                'country_flag' => '🇪🇬',
                'country_code' => 'eg',
            ],

NEW;
    $src = preg_replace('/(        \];\s*\n\s*\}\s*\n\}\s*)$/', $entry1.'$1', $src, 1);
    echo "lotus-sharm: inserted\n";
}

if (strpos($src, "'slug' => 'daamny'") !== false) {
    echo "daamny: already present\n";
} else {
    $entry2 = <<<'NEW'
            [
                'slug' => 'daamny',
                'title' => 'Da3many — Arabic Aid & Grants Portal',
                'summary' => 'Arabic content portal covering financial aid, grants and social support programs across Gulf and Arab countries — SEO-focused information hub.',
                'title_ar' => 'دعمى — بوابه الدعم والمنح الماليه',
                'summary_ar' => 'بوابه محتوى عربيه عن المنح والمساعدات الماليه والدعم الاجتماعي في دول الخليج والوطن العربي — مركز معلومات مُحسّن لمحركات البحث.',
                'category' => 'Marketing',
                'tech' => ['WordPress', 'Custom Theme', 'Arabic SEO'],
                'url' => 'https://d3mnakdi.com',
                'image' => 'projects/daamny.jpg',
                'role' => 'Full Stack Developer',
                'language' => 'ar',
                'country' => 'Saudi Arabia',
                'country_ar' => 'السعوديه',
                'country_flag' => '🇸🇦',
                'country_code' => 'sa',
            ],

NEW;
    $src = preg_replace('/(        \];\s*\n\s*\}\s*\n\}\s*)$/', $entry2.'$1', $src, 1);
    echo "daamny: inserted\n";
}

file_put_contents($fp, $src);
echo shell_exec("php -l " . escapeshellarg($fp) . " 2>&1");
PHP_EOF

echo "--- entries count (should be 34) ---"
grep -c "'slug' =>" app/Services/PortfolioService.php

php artisan view:clear && php artisan route:clear && php artisan config:clear

echo "--- /portfolios HTTP status ---"
curl -sI "https://khaledahmed.net/portfolios" | head -1
echo "--- new slugs found on the page ---"
curl -s "https://khaledahmed.net/portfolios" | grep -o "lotussharm\.com\|d3mnakdi\.com" | sort -u
