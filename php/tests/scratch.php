<?php
/**
 * Created by PhpStorm.
 * User: aboutuser
 * Date: 8/20/15
 * Time: 4:00 PM
 */
require '../vendor/autoload.php';

$manyArticlesHtmlStr = "<a>This is anchor 1</a><a>This is anchor 2</a>"; //file_get_contents("dealnews-html.txt"/*"many-articles-html.txt"*/);
$manyArticlsDom = voku\helper\HtmlDomParser::str_get_html( "http://dealnews.com" );

foreach($manyArticlsDom->find('a') as $anchor) {
    print_r( $anchor->plaintext ) . PHP_EOL;
}

