<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Image;
use File;

class ImagesController extends Controller
{
    public function resize($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $dir = public_path() . "/image/resize/" . $width . '/' . $height;

        if ($this->createDirectory($dir) && File::isDirectory($dir) && File::isWritable($dir)) {
            $img = Image::make($imgFile)->resize($width, $height, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($dir . '/' . $path);
        } else {
            throw new \ErrorException('Директория ' . $dir . ' недоступна для записи');
        }

        return $this->createResponse($img, $ext);
    }


    public function fit($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $dir = public_path() . "/image/fit/" . $width . '/' . $height;

        if ($this->createDirectory($dir) && File::isDirectory($dir) && File::isWritable($dir)) {
            $img = Image::make($imgFile)->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($dir . '/' . $path);
        } else {
            throw new \ErrorException('Директория ' . $dir . ' недоступна для записи');
        }

        return $this->createResponse($img, $ext);
    }


    public function widen($width, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $dir = public_path() . "/image/widen/" . $width;

        if ($this->createDirectory($dir) && File::isDirectory($dir) && File::isWritable($dir)) {
            $img = Image::make($imgFile)->widen($width, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($dir . '/' . $path);
        } else {
            throw new \ErrorException('Директория ' . $dir . ' недоступна для записи');
        }

        return $this->createResponse($img, $ext);
    }

    public function heighten($height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $dir = public_path() . "/image/heighten/" . $height;

        if ($this->createDirectory($dir) && File::isDirectory($dir) && File::isWritable($dir)) {
            $img = Image::make($imgFile)->heighten($height, function ($constraint) {
                $constraint->upsize();
            });
            $img->save($dir . '/' . $path);
        } else {
            throw new \ErrorException('Директория ' . $dir . ' недоступна для записи');
        }

        return $this->createResponse($img, $ext);
    }

    protected function getImagePath($path)
    {
        $nameArray = explode('.', $path);
        $ext = array_pop($nameArray);
        $file = str_replace('.', '/', implode('.', $nameArray));
        $filePath = config('site.uploadPath') . config('site.imageUploadSection') . '/' . $file;

        if (!File::isFile($filePath)) {
            $filePath = config('site.imageDefaultPath');
            $ext = 'jpg';
        }

        return [$filePath, $ext];
    }

    protected function createResponse($imgObj, $ext = 'jpg', $quality = 75)
    {
        return $imgObj->response($ext, $quality)
            ->header( 'Cache-control', 'public, max-age=86400');
    }

    protected function createDirectory($dir)
    {
        if (!File::exists($dir)) {
            if (!File::makeDirectory($dir, 0755, true)) {
                throw new \ErrorException('Не могу создать директорию ' . $dir);
            }
        }

        return true;
    }
}
