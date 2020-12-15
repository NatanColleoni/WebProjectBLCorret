<?
$cAnalytics = new base("analytics");
$analytics = $cAnalytics->consultaId(1);
if ($analytics["codigo"]) {
    echo $analytics["codigo"];
}