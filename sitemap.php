<?php
$link = mysqli_connect("localhost","root","","news");
header("Content-type: text/xml");
$text1 = '<?xml version="1.0" encoding="UTF-8"?>' . '<urlset xmlns="news/sitemap.xml">';
$text1 .= "\n";
file_put_contents("sitemap.xml", $text1);
    
for ($i = 1; $i <= 130; $i++) {
    $text1 = "";
    $start = ($i - 1) * 500;
    $end = $i * 500;
    $sql = "SELECT * FROM `map` LIMIT $start,$end";
    $stmt =$link->prepare($sql);
    $stmt->execute();
    $stmt = $stmt->get_result();

    while ($song = $stmt->fetch_assoc()) {
        switch ($song['table']) {
            case 'article':
                $base_url = 'localhost/news/show_news.php?article_slug=';
                break;
            case 'category':
                $base_url = 'localhost/news/categorys.php?category_slug=';
                break;
    
        }
        $url=$base_url.$song["slug"];
        $text1 .= '<url>';
        $text1 .= "<loc>{$url}</loc>";
        $text1 .= '</url>';
        $text1 .= "\n";
    }
    file_put_contents("sitemap.xml", $text1,FILE_APPEND);
}

$text1 .= '</urlset>';
file_put_contents("sitemap.xml", "</urlset>", FILE_APPEND);

?>