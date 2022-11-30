<?php

namespace frontend\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use Yii;

class NewsController extends Controller
{
    public static function getAPIKey()
    {
        return 'pub_13778ac600aae41d5c2a39773882a75d42627';
        //return 'pub_13552db86f5a60ad9b627ee202d815acff527'; //APIKEY
    }

    public function actionIndex()
    {

        $page = 1;
        $queryString = Yii::$app->request->getQueryString();
        //query string to array
        parse_str($queryString, $queryArray);
        if (isset($queryArray['page'])) {
            $page = $queryArray['page'];
        }

        $APIKEY = $this->getAPIKey();
        $response = file_get_contents('https://newsdata.io/api/1/news?apikey=' . $APIKEY . '&country=pt&language=pt&category=technology&page=' . $page);
        $response = json_decode($response);
        $news = [];

        foreach ($response->results as $result) {
            $news[] = $result;
        }

        $pages = new Pagination(['totalCount' => $response->totalResults - 10, 'pageSize' => 10]);

        return $this->render('index', ['news' => $news, 'pages' => $pages]);
    }
}