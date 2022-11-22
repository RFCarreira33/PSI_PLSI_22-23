<?php

namespace common\models;

use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;

    public function rules()
    {
        return [
            [['imageFile'], 'required'],
            [['imageFile'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg'],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $this->imageFile->saveAs(__DIR__ . '/../../frontend/web/img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension, false);
            $this->imageFile->saveAs(__DIR__ . '/../../backend/web/img/' . $this->imageFile->baseName . '.' . $this->imageFile->extension, false);
            return true;
        } else {
            return false;
        }
    }
}