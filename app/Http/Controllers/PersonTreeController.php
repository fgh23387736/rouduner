<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;


class PersonTreeController extends Controller
{
    /**
     * Show the profile for the given user.
     *
     * @param  int  $id
     * @return Response
     */
    public function getTree()
    {   
        if(Storage::exists('public/personTree.json')){
            return Storage::get('public/personTree.json');
        }else{
            $data = [];
            $data['id'] = -1;
            $data['name'] = '无';
            return json_encode($data);
        }
        
    }

    public function setTree(Request $request)
    {
        $content = $request->all();
        Storage::put('public/personTree.json', json_encode($content['data']));
        
        return "";
    }
}

?>