<?php
namespace App\Services;

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
                $imagename = rand(45464, 676767).time().'_'.uniqid().'.'.$file->getClientOriginalExtension();
                $imagepublicpath = public_path('storage/files');
                $file->move($imagepublicpath, $imagename);
                $filearr[] = '/storage/files/'.$imagename;
            }
            $file_path = implode(',', $filearr);
        }else {
            $imagename = rand(45464, 676767).time().'_'.uniqid().'.'.$files->getClientOriginalExtension();
            $imagepublicpath = public_path('storage/files');
            $files->move($imagepublicpath, $imagename);
            $file_path = '/storage/files/'.$imagename;
        }

        return $file_path;
    }
}
