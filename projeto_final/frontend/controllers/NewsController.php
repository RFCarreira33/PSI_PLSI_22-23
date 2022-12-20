<?php

namespace frontend\controllers;

use yii\web\Controller;
use Yii;
use yii\data\Pagination;

class NewsController extends Controller
{
    public static function getAPIKey()
    {
        return 'pub_13552a7e7bb7e78f5ad68779b52d0ea763921';
    }

    public function actionIndex()
    {
        /* Getting the news from the API and returning it to the view. */
        $page = 1;
        $queryString = Yii::$app->request->getQueryString();
        //query string to array
        parse_str($queryString, $queryArray);
        if (isset($queryArray['page'])) {
            $page = $queryArray['page'];
        }

        try {
            $APIKEY = $this->getAPIKey();
            $response = file_get_contents('https://newsdata.io/api/1/news?apikey=' . $APIKEY . '&country=pt&language=pt&category=technology&page=' . $page);
            $response = json_decode($response);
            $news = [];

            foreach ($response->results as $result) {
                $news[] = $result;
            }

            $pages = new Pagination(['totalCount' => $response->totalResults - 10, 'pageSize' => 10]);
        } catch (\Exception $e) {
            $news = [];
            $pages = new Pagination(['totalCount' => 0, 'pageSize' => 10]);
        }
        return $this->render('index', ['news' => $news, 'pages' => $pages]);
    }
}
