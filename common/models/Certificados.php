<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "certificados".
 *
 * @property integer $id_certificado
 * @property string $matricula
 * @property string $file_certificado
 */
class Certificados extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'certificados';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['matricula', 'file_certificado'], 'required'],
            [['matricula'], 'string', 'max' => 8],
            [['file_certificado'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_certificado' => 'Id Certificado',
            'matricula' => 'Estudiante',
            'file_certificado' => 'Certificado internacional',
        ];
    }
    
    
    //------------Para abrir archivo PDF ------------//
    // PATH UNICO PARA SER UTILIZADO EN EL CONTROLADOR
    public function getArchivoFile() {

        Yii::$app->params['uploadPath'] = Yii::$app->basePath . '/web/uploads/';
        return isset($this->archivo) ? Yii::$app->params['uploadPath'] . $this->archivo : null;
    }

    //PATH PERSONALIZADO PARA SER UTILIZADO EN LAS VISTAS, (FORMULARIO)
    public function getFileFileForm() {
        return isset($this->archivo) ? Yii::getAlias('@web') . '/uploads/' . $this->archivo : Yii::getAlias('@web') . '/uploads/' . 'default.jpg';
    }

    public function getFileUrl() {
        // return a default image placeholder if your source avatar is not found
        Yii::$app->params['uploadUrl'] = Yii::$app->urlManager->baseUrl . '/web/uploads/';
        $avatar = isset($this->archivo) ? $this->archivo : 'default.jpg';
        return Yii::$app->params['uploadUrl'] . $avatar;
    }

    /**
     * Process upload of image
     *
     * @return mixed the uploaded image instance
     */
    public function uploadArchivo() {
        // get the uploaded file instance. for multiple file uploads
        // the following data will return an array (you may need to use
        // getInstances method)
        $file = \yii\web\UploadedFile::getInstance($this, 'archivo');
        

        // if no image was uploaded abort the upload
        if (empty($file)) {
            return false;
        }

        // store the source file name
        $this->archivo = $file->name;
        $ext = end((explode(".", $file->name)));

        // generate a unique file name
        $this->archivo = Yii::$app->security->generateRandomString() . ".{$ext}";

        // the uploaded image instance
        return $file;
    }

    /**
     * Process deletion of image
     *
     * @return boolean the status of deletion
     */
    public function deleteArchivo() {

        $file = $this->getImageFile();
        //$fileDefault = $this->getImageFileDefault();

        if ($this->archivo == 'default.jpg') {
            return false;
        }

        // check if file exists on server
        if (empty($file) || !file_exists($file)) {
            return false;
        }

        // check if uploaded file can be deleted on server
        if (!unlink($file)) {
            return false;
        }

        // if deletion successful, reset your file attributes
        $this->archivo = null; // ---> SI es que solo quisieramos borrar la foto, pero la eliminacion se hace completa.

        return true;
    }    
}
