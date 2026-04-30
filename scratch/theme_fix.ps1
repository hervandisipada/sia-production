$target_files = Get-ChildItem -Path app\views\ -Filter *.php -Recurse
foreach ($file in $target_files) {
    $content = Get-Content $file.FullName -Raw
    $content = $content -replace 'slate-', 'stone-'
    $content = $content -replace 'yellow-500', 'brand-yellow'
    $content = $content -replace 'yellow-600', 'brand-yellow'
    $content = $content -replace 'yellow-50', 'stone-50'
    $content = $content -replace 'brand-cream', 'stone-50'
    $content = $content -replace 'brand-gold', 'brand-yellow'
    $content = $content -replace 'brand-dark', 'stone-900'
    $content = $content -replace 'shadow-yellow-600/20', 'shadow-brand-yellow/20'
    $content = $content -replace 'shadow-yellow-500/20', 'shadow-brand-yellow/20'
    $content = $content -replace 'transtone', 'translate'
    Set-Content $file.FullName $content
}
