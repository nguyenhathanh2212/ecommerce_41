<?php

namespace App\Traits;

use Illuminate\Http\Request;
use File;

trait ProcessPicture
{
    public function storePictureProduct(Request $request, $product_id)
    {
        $name = [];
        if($request->hasFile('pictures'))
        {
            foreach ($request->file('pictures') as $file) {
                $newFileName = time() . rand(1, 1000) . '.'. $file->getClientOriginalExtension();
                $file->move(config('setting.fileUpload'), $newFileName);
                $name[] = [
                    'product_id' => $product_id,
                    'name' => $newFileName,
                ];
            }
        }
        
        return $name;
    }
}
