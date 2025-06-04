<?php

namespace App\Http\Controllers;

use App\Library\Helper;
use App\Library\FileHelper;
use App\Library\TokenHelper;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Token\TokenSignatureInitial;

class ViewFile_Controller extends Controller
{
    // public function viewFile(Request $request, $token) {
    // public function viewFile(Request $request) {
    public function viewFile($token) {
        // dump($token);
        // $key_file = request('key');
        // $responseFileHelper = FileHelper::getFileByKey($key_file);
        // // dump($responseFileHelper);
        // // dump([
        // //     'key' => $key,
        // //     'key_request' => $key_file,
        // //     'response_helper' => $responseFileHelper,
        // // ]);
        
        // // if ($responseFileHelper->status) {
        // //     echo "File found";
        // // } else {
        // //     echo "File not found";
        // // }
        
        // $dataResponse = $responseFileHelper->data;
        
        // $disk = Storage::disk($dataResponse->disk);
        // $path = $dataResponse->path . $dataResponse->file_name;
        
        
        // // return response()->file($disk->path($dataResponse->path . $dataResponse->file_name));
        // return response()->stream(function () use ($disk, $path) {
        //     echo $disk->get($path);
        // }, 200, [
        //     'Content-Type' => Storage::mimeType($disk->path($path)),
        //     'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        //     'Content-Length' => filesize($disk->path($path)),
        // ]);
        return response()->json([
            'token' => $token,
            'auth' => Auth::user(),
            // 'data' => $request->all(),
        ], 200);
    }

    public function viewFilePost($token) {
        // dump($token);
        // $key_file = request('key');
        // $responseFileHelper = FileHelper::getFileByKey($key_file);
        // // dump($responseFileHelper);
        // // dump([
        // //     'key' => $key,
        // //     'key_request' => $key_file,
        // //     'response_helper' => $responseFileHelper,
        // // ]);
        
        // // if ($responseFileHelper->status) {
        // //     echo "File found";
        // // } else {
        // //     echo "File not found";
        // // }
        
        // $dataResponse = $responseFileHelper->data;
        
        // $disk = Storage::disk($dataResponse->disk);
        // $path = $dataResponse->path . $dataResponse->file_name;
        
        
        // // return response()->file($disk->path($dataResponse->path . $dataResponse->file_name));
        // return response()->stream(function () use ($disk, $path) {
        //     echo $disk->get($path);
        // }, 200, [
        //     'Content-Type' => Storage::mimeType($disk->path($path)),
        //     'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
        //     'Content-Length' => filesize($disk->path($path)),
        // ]);
        return response()->json([
            'token' => $token,
            'auth' => Auth::user(),
            'file' => FileHelper::getFile(TokenSignatureInitial::where('token', '=', $token)->value('id_document')),
            // 'data' => $request->all(),
        ], 200);
    }
}
