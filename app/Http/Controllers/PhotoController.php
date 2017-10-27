<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Photo;
use Response;
use URL;

class PhotoController extends Controller
{
    public function stream() {
        $photos = Photo::paginate(5);
        
        return Response::json([
            'data' => $this->transformCollection($photos)
        ],200);
    }

    private function transformCollection($photos){
        $photosArray = $photos->toArray();
        return [
            'total' => $photosArray['total'],
            'per_page' => intval($photosArray['per_page']),
            'current_page' => $photosArray['current_page'],
            'last_page' => $photosArray['last_page'],
            'next_page_url' => $photosArray['next_page_url'],
            'prev_page_url' => $photosArray['prev_page_url'],
            'from' => $photosArray['from'],
            'to' =>$photosArray['to'],
            'data' => array_map([$this, 'transform'], $photosArray['data'])
        ];
    }
     
    private function transform($photo){
        return [
               'id' => $photo['id'],
               'photo' => $photo['description'],
               'url' => URL::to('/gdrive').'/'.$photo['url']
            ];
    }    
    
}
