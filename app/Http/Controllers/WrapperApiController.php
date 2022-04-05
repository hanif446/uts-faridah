<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WrapperApiController extends Controller
{
    //
    public function create_folder_v2(Request $request)
    {	
        $token = $request->bearerToken();
    	$json = Http::withToken($token)->withBody(json_encode(["path" => '/uts-webservice',"autorename" => false]), 'application/json')->post('https://api.dropboxapi.com/2/files/create_folder_v2')->json();
    	return response()->json($json);
    }

    public function list_folder(Request $request)
    {
        $token = $request->bearerToken();
    	$json = Http::withToken($token)
    	->withBody(json_encode([
		    "path"=>"",
		    "recursive"=> false,
		    "include_media_info"=> false,
		    "include_deleted"=> false,
		    "include_has_explicit_shared_members"=> false,
		    "include_mounted_folders"=> true,
		    "include_non_downloadable_files"=> true]),'application/json')
    	->post('https://api.dropboxapi.com/2/files/list_folder')->json();
		    	return response()->json($json);
    }

    public function copy_v2(Request $request)
    {
        $token = $request->bearerToken();
    	$json = Http::withToken($token)->withBody(json_encode([
	    "from_path"=> "/FaridahHanifah",
	    "to_path"=> "/Sinta",
	    "allow_shared_folder"=> false,
	    "autorename"=> false,
	    "allow_ownership_transfer"=> false]), 'application/json')
    	->post('https://api.dropboxapi.com/2/files/copy_v2')->json();
    	return response()->json($json);
    }

    public function create_shared_link(Request $request)
    {
        $token = $request->bearerToken();
    	$json = Http::withToken($token)->withBody(json_encode([
    	"path"=> "/Ekonomika Makalah Kelompok 1.pptx",
    	"short_url"=> false]), 'application/json')
    	->post('https://api.dropboxapi.com/2/sharing/create_shared_link')->json();
    	return response()->json($json);
    }

    public function delete_v2(Request $request)
    {
        $token = $request->bearerToken();
    	$json = Http::withToken($token)->withBody(json_encode([
    	"path"=> "/Ekonomika Makalah Kelompok 1.pptx"]), 'application/json')
    	->post('https://api.dropboxapi.com/2/files/delete_v2')->json();
    	return response()->json($json);
    }

}



