<?php
namespace App\Services;
use Illuminate\Http\Request;

class FileService {

    public function dataExecute($datas) {
        $values = [];
        foreach ($datas as $data) {
            if(is_array($data)) {
                foreach ($data as $key => $val) {
                    $values[] = $val;
                }
            }else {
                $values[] = $data;
            }

        }
        $stringAttributes = implode(', ', $values);
        return $stringAttributes;
    }

    public function fileExequtes($files) {
        $file_path = null;
        if (is_array($files)) {
            $filearr = [];
            foreach($files as $file) {
                $imagename = rand(45464, 676767).time().'_'.uniqid().'.'.$file->extension();
                $imagepublicpath = public_path('uploads/files');
                $file->move($imagepublicpath, $imagename);
                $filearr[] = 'uploads/files/'.$imagename;
            }
            $file_path = implode(',', $filearr);
        }else {

            $imagename = rand(45464, 676767).time().'_'.uniqid().'.'.$files->extension();
            $imagepublicpath = public_path('uploads/files');
            $files->move($imagepublicpath, $imagename);
            $file_path = 'uploads/files/'.$imagename;
        }

        return $file_path;
    }


    public function deleteFile(Request $request, $file_path, $attribute) {

        if ($request->hasFile($attribute)) {
            if (file_exists($file_path)) {
                unlink($file_path);
            }
            return $this->fileExequtes($request->file($attribute));
        } else {
            return $file_path;
        }
    }
}
