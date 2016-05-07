<?php

namespace backend\controllers;

use Yii;
use backend\models\Artwork;
use backend\models\ArtworkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ArtworkController implements the CRUD actions for Artwork model.
 */
class ArtworkController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Artwork models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArtworkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Artwork model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Artwork model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Artwork();

        if ($model->load(Yii::$app->request->post())) {

            // Get the instances of the uploaded file
            // Main image
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->image->saveAs('uploads/artwork/' . $model->image->name);
            // Write files' paths to db with alias "@uploads"
            // Main image path
            $model->artwork_image_path = '@uploads/artwork/' . $model->image->name;

            // Thumbnail
            $model->thumb = UploadedFile::getInstance($model, 'thumb');
            $model->thumb->saveAs('uploads/artwork/' . $model->thumb->name);
            // Thumbnail path
            $model->artwork_thumb_path = '@uploads/artwork/' . $model->thumb->name;

            $model->save();
            return $this->redirect(['view', 'id' => $model->artwork_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Artwork model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            // Get the instances of the uploaded file
            // Main image
            $model->image = UploadedFile::getInstance($model, 'image');
            $model->image->saveAs('uploads/artwork/' . $model->image->name);
            // Thumbnail
            $model->thumb = UploadedFile::getInstance($model, 'thumb');
            $model->thumb->saveAs('uploads/artwork/' . $model->thumb->name);

            // Write files' paths to db with alias "@uploads"
            // Main image path
            $model->artwork_image_path = '@uploads/artwork/' . $model->image->name;
            // Thumbnail path
            $model->artwork_thumb_path = '@uploads/artwork/' . $model->thumb->name;

            $model->save();
            return $this->redirect(['view', 'id' => $model->artwork_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Artwork model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Artwork model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Artwork the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Artwork::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
