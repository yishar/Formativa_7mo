<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "empresa".
 *
 * @property string $Nombre
 * @property string $Direccion
 * @property integer $Telefono
 * @property string $Gerente
 * @property string $Contacto
 * @property string $Cargo_contacto
 * @property integer $Telefono_contacto
 * @property integer $Id_empresa
 * @property string $Convenio
 *
 * @property PreProfesionales[] $preProfesionales
 */
class Empresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Telefono', 'Telefono_contacto'], 'integer'],
            [['Convenio'], 'required'],
            [['Convenio'], 'string'],
            [['archivo'], 'file', 'extensions' => 'pdf'], // AÑADIENDO AQUI LAS EXTENSIONES DA UN ERROR 
            [['Nombre', 'Gerente', 'Cargo_contacto'], 'string', 'max' => 40],
            [['Direccion'], 'string', 'max' => 60],
            [['Contacto'], 'string', 'max' => 50],
            [['archivo'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Empresa o Razón social',
            'Direccion' => 'Dirección',
            'Telefono' => 'Teléfono de referencia',
            'Gerente' => 'Gerente',
            'Contacto' => 'Contacto',
            'Cargo_contacto' => 'Cargo del contacto',
            'Telefono_contacto' => 'Teléfono del contacto',
            'Id_empresa' => 'Id Empresa',
            'Convenio' => 'Existe convenio',
            'archivo' => 'Carta de compromiso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPreProfesionales()
    {
        return $this->hasMany(PreProfesionales::className(), ['Id_empresa' => 'Id_empresa']);
    }
    
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
