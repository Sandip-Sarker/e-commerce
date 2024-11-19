<?php

function imageUpload($file, $path, $code)
{
    $fileName = '';

    if ($file) {
        $extension = $file->extension();
        $uniqueName = $code . uniqid() . '.' . $extension;
        $file->move(public_path($path), $uniqueName);
        $fileName = $uniqueName;
    }

    return $fileName;
}

