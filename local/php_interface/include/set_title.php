<?

$dir = $_SERVER['DOCUMENT_ROOT'] . $APPLICATION->GetCurDir() . '.section.php';
if (file_exists($dir)) {
    include $dir;
    $APPLICATION->SetTitle($sSectionName);
}
