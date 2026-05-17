<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait HandlesUploads
{
    protected function uploadFiles(
        Request $request,
        array $fields,
        string $folder,
        array $oldData = []
    ): array {

        $data = $request->validated();

        foreach ($fields as $field) {

            if (!$request->hasFile($field)) {
                continue;
            }

            $files = $request->file($field);

            if (!empty($oldData[$field])) {

                if ($this->isJson($oldData[$field])) {

                    foreach (json_decode($oldData[$field], true) as $oldFile) {
                        Storage::disk('public')->delete($oldFile);
                    }

                } else {

                    Storage::disk('public')->delete($oldData[$field]);
                }
            }

            if (is_array($files)) {

                $paths = [];

                foreach ($files as $file) {
                    $paths[] = $file->store($folder, 'public');
                }

                $data[$field] = json_encode($paths);

            } else {

                $data[$field] = $files->store($folder, 'public');
            }
        }

        return $data;
    }

    private function isJson(string $string): bool
    {
        json_decode($string);

        return json_last_error() === JSON_ERROR_NONE;
    }

    protected function deleteFiles(array $fields, array $data): void
    {
        foreach ($fields as $field) {

            if (empty($data[$field])) {
                continue;
            }

            if ($this->isJson($data[$field])) {

                foreach (json_decode($data[$field], true) as $file) {
                    Storage::disk('public')->delete($file);
                }

            } else {

                Storage::disk('public')->delete($data[$field]);
            }
        }
    }
}