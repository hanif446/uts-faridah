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
		$path = $request->input('path');
		$rename = $request->input('autorename');
    	$json = Http::withToken($token)->withBody(json_encode(["path" => $path,"autorename" => $rename]), 'application/json')->post('https://api.dropboxapi.com/2/files/create_folder_v2')->json();
    	return response()->json($json);
    }

    public function list_folder(Request $request)
    {
        $token = $request->bearerToken();
        $path = $request->input('path');
        $recursive = $request->input('recursive');
        $minfo = $request->input('include_media_info');
        $deleted = $request->input('include_deleted');
        $shared = $request->input('include_has_explicit_shared_members');
        $mount = $request->input('include_mounted_folders');
        $down = $request->input('include_non_downloadable_files');
        $json = Http::withToken($token)
        ->withBody(json_encode([
            "path"=> $path,
            "recursive"=> $recursive,
            "include_media_info"=> $minfo,
            "include_deleted"=> $deleted,
            "include_has_explicit_shared_members"=> $shared,
            "include_mounted_folders"=> $mount,
            "include_non_downloadable_files"=> $down]),'application/json')
        ->post('https://api.dropboxapi.com/2/files/list_folder')->json();
                return response()->json($json);
    }

    public function copy_v2(Request $request)
    {
        $token = $request->bearerToken();
		$from_path = $request->input('from_path');
		$to_path = $request->input('to_path');
		$allwshared = $request->input('allow_shared_folder');
		$autorename = $request->input('autorename');
		$owntransfer = $request->input('allow_ownership_transfer');
    	$json = Http::withToken($token)->withBody(json_encode([
	    "from_path"=> $from_path,
	    "to_path"=> $to_path,
	    "allow_shared_folder"=> $allwshared,
	    "autorename"=> $autorename,
	    "allow_ownership_transfer"=> $owntransfer]), 'application/json')
    	->post('https://api.dropboxapi.com/2/files/copy_v2')->json();
    	return response()->json($json);
    }

    public function create_shared_link(Request $request)
    {
        $token = $request->bearerToken();
		$path = $request->input('path');
		$sURL = $request->input('short_url');
    	$json = Http::withToken($token)->withBody(json_encode([
    	"path"=> $path,
    	"short_url"=> $sURL]), 'application/json')
    	->post('https://api.dropboxapi.com/2/sharing/create_shared_link')->json();
    	return response()->json($json);
    }

    public function delete_v2(Request $request)
    {
        $token = $request->bearerToken();
		$path = $request->input('path');
    	$json = Http::withToken($token)->withBody(json_encode([
    	"path"=> $path]), 'application/json')
    	->post('https://api.dropboxapi.com/2/files/delete_v2')->json();
    	return response()->json($json);
    }

}



