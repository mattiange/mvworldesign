<?php

namespace app\controllers;

use Yii;
use app\models\MenuItem;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MenuItemController implements the CRUD actions for MenuItem model.
 */
class MenuItemController extends Controller
{
    /**
     * {@inheritdoc}
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
     * Lists all MenuItem models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => MenuItem::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single MenuItem model.
     * @param string $id
     * @param integer $menu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id, $menu_id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id, $menu_id),
        ]);
    }

    /**
     * Creates a new MenuItem model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new MenuItem();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'menu_id' => $model->menu_id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing MenuItem model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @param integer $menu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id, $menu_id)
    {
        $model = $this->findModel($id, $menu_id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'menu_id' => $model->menu_id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing MenuItem model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @param integer $menu_id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $menu_id)
    {
        $this->findModel($id, $menu_id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the MenuItem model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @param integer $menu_id
     * @return MenuItem the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $menu_id)
    {
        if (($model = MenuItem::findOne(['id' => $id, 'menu_id' => $menu_id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
