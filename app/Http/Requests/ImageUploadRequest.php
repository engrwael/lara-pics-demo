<?php

namespace App\Http\Requests;

use App\Models\Image;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;

class ImageUploadRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        if ($this->method() == 'PUT') {
            return [
                'title' => 'required|max:255',
            ];
        }

        return [
            'file' => 'required|image',
            'title' => 'required|max:255'
        ];
    }

    public function getImageData()
    {
        $data = $this->validated() + [
            'user_id' => rand(1, 9)
        ];

        // $exe = $this->file->getClientOriginalExtension();
        // $newName = $data['title'] . '.' . $exe;

        if ($this->hasFile('file')) {
            $directory = Image::makeDirectory();
            $data['file'] = Storage::putFile($directory, $this->file);
            $data['dimensions'] = Image::getDimensions($data['file']);
        }

        return $data;
    }
}