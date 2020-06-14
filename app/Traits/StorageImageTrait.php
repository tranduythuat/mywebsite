<?php

namespace App\Traits;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

trait StorageImageTrait{
    public function storageTraitUpLoad($request, $fieldName, $folderName)
    {
        if($request->hasFile($fieldName)){
            $file = $request->$fieldName;
            // $fileNameOrigin = $file->getClientOriginalName();
            $fileNameOrigin = $file->getClientOriginalName();
            $fileNameHash = Str::random(40) . '.' . $file->getClientOriginalExtension();
            $filePath = $request->file($fieldName)->storeAs('public/'. $folderName .'/' . auth()->id(), $fileNameHash);

            $dataUploadTrait = [
                // 'file_name' => $fileNameOrigin, 
                'file_path' => Storage::url($filePath),
                'file_name' => $fileNameHash
            ];

            return $dataUploadTrait;
        }

        return null;
    }

    public function storageTraitUpLoadMutiple($file, $folderName)
    {
        $fileNameOrigin = $file->getClientOriginalName();
        $fileNameHash = Str::random(40) . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('public/'. $folderName .'/' . auth()->id(), $fileNameHash);
    
        $dataUploadTrait = [    

            'file_name' => $fileNameOrigin, 
            'file_path' => Storage::url($filePath) 

        ];

        return $dataUploadTrait;
    }
}