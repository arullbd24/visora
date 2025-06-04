<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Library\FileHelper;
use App\Library\Documents\DocsHelper;
use App\Library\TokenHelper;

class PlaceViewFile_Controller extends Controller
{
    public function index($token) {
        // dump($token);
        try {
            $responseTokenHelper = TokenHelper::getTokenDataSignatureInitial($token, Auth::user()->id_user);
            if (! $responseTokenHelper->status) {
                throw new \Exception($responseTokenHelper->message);
            }
            
            $dataResponseTokenHelper = $responseTokenHelper->data;
            
            $responseDocsHelper = DocsHelper::getDocumentFileById($dataResponseTokenHelper->id_document);
            if (! $responseDocsHelper->status) {
                throw new \Exception($responseDocsHelper->message);
            }

            $dataResponseDocsHelper = $responseDocsHelper->data->file;
            
            $disk = Storage::disk($dataResponseDocsHelper->disk);
            $path = $dataResponseDocsHelper->path . $dataResponseDocsHelper->file_name;
            
            return response()->stream(function () use ($disk, $path) {
                echo $disk->get($path);
            }, 200, [
                'Content-Type' => Storage::mimeType($disk->path($path)),
                'Content-Disposition' => 'inline; filename="' . basename($path) . '"',
                'Content-Length' => filesize($disk->path($path)),
            ]);
            
        } catch (\Exception $e) {
            session()->flash('error', $e->getMessage());
            return redirect()->route('documents.main');
        }
        // $responseTokenHelper = TokenHelper::getTokenDataSignatureInitial($token, Auth::user()->id_user);
        // $responseFileHelper = FileHelper::getFileByKey($token);
        // $responseDocsHelper = DocsHelper::getDocumentFileById($responseTokenHelper->data->id_document);
        // dump((object) [
        //     'key' => $token,
        //     'response_token_helper' => $responseTokenHelper,
        //     'response_file_helper' => $responseFileHelper,
        //     'response_docs_helper' => $responseDocsHelper,
        // ]);
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
    }
}
