<?php
/**
 * Created by PhpStorm.
 * User: karen-home
 * Date: 3/25/2017
 * Time: 8:41 PM
 */

namespace App\Repositories;
use Illuminate\Support\Facades\Storage;

class StorageRepo
{
    /**
     * @param $file
     * @param $disk
     * @return string
     */
    public static function upload($file, $disk)
    {
        $name = uniqid().'.'.$file->getClientOriginalExtension();
        Storage::disk($disk)->put($name,  \File::get($file));
        return $name;
    }

    /**
     * @param $file
     * @param $disk
     */
    public static function delete($file, $disk)
    {
        Storage::disk($disk)->delete($file);
    }

    /**
     * @param $file
     * @param $disk
     * @return mixed
     */
    public static function getFile($file, $disk) {
        return Storage::disk($disk)->get($file);
    }
}