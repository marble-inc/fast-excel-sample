<?php

namespace App\Http\Controllers;

use App\Models\SampleItem;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Rap2hpoutre\FastExcel\FastExcel;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function sampleItemsGenerator()
    {
        /*
         出力対象のモデル、条件などを指定します
         cursor()とyieldによりメモリ使用量を抑えます
        */
        foreach (SampleItem::where('price', '>', 10000)->orderBy('id')->cursor() as $entry) {
            yield [
                '名前' => $entry->name,
                'UUID' => $entry->uuid,
                '概要文' => $entry->description,
                'カラー' => $entry->color,
                '価格' => $entry->price,
            ];
        }
    }

    function downloadCsv()
    {
        // FastExcelのdownloadメソッドによりCSVファイルがダウンロードされます
        return (new FastExcel($this->sampleItemsGenerator()))->download('sample.csv');
    }
}
