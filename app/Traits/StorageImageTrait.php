<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpLoad($request, $fieldName, $folderName)
    {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(40) . '.' . $file->getClientOriginalExtension();
            // $filePath = $request->file($fieldName)->storeAs('public/'. $folderName .'/' . auth()->id(), $fileNameHash);
            $filePath = $request->file($fieldName)->public_path('storage/'. $folderName .'/' . auth()->id(), $fileNameHash);
        
            $dataUploadTrait = [
                'file_name' => $fileNameOrigin, 
                'file_path' => Storage::url($filePath) 
            ];

            return $dataUploadTrait;
        }

        return null;
    }

    public function storageTraitUpLoadMutiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(40) . '.' . $file->getClientOriginalExtension();
        // $filePath = $file->storeAs('public/'. $folderName .'/' . auth()->id(), $fileNameHash);
        $filePath = $file->public_path('storage/'. $folderName .'/' . auth()->id(), $fileNameHash);
    
        $dataUploadTrait = [    
            'file_name' => $fileNameOrigin, 
            'file_path' => Storage::url($filePath) 
        ];

        return $dataUploadTrait;
    }
}