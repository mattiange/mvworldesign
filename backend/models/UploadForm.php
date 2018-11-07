<?php
namespace backend\models;

/**
 * Upload files
 *
 * @create  06/11/2018
 * @author  Mattia Leonardo Angelillo
 */
class UploadForm extends \yii\base\Model{
    /**
     * File to upload
     * 
     * @var UploadedFile
     */
    public $file;
    
    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [
            [['file'], 'file', 'extensions' => 'jpg, png']
        ];
    }
}
