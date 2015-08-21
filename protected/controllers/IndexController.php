<?php

class IndexController extends Controller
{
	private $_btype;
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$book=new Book;
		$bookForm = new BookForm;
		$bookSeq = new BookSeq;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BookForm']))
		{
			$bookForm->attributes=$_POST['BookForm'];
			$time = gettimeofday();
			$bookForm->bid = $time['sec'].$time['usec'];
			if($bookForm->validate()){
				$book->attributes = $bookForm->attributes;
				if($book->save()){
					$bookForm->serial_no = trim($bookForm->serial_no);
					if(empty($bookForm->serial_no)){
						$this->redirect(array('view','id'=>$book->bid));
					}else{
						$result = true;
						$serialArray = explode(',', $bookForm->serial_no);
						foreach($serialArray as $serialNo){
							$bookSeq->bid = $book->bid;
							$bookSeq->serial_no = $serialNo;
							if($bookSeq->save()){
								$bookSeq->setIsNewRecord(true);
							}else{
								$result = false;
								break;
							}
						}
						if($result){
							$this->redirect(array('view','id'=>$book->bid));
						}
					}
				}
			}
		}

		$bookForm->is_new = true;
		$this->render('create',array(
			'model'=>$bookForm,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Book']))
		{
			$model->attributes=$_POST['Book'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->bid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new Book;
		$dataProvider=new CActiveDataProvider('Book');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
			'model'=>$model,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Book('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Book']))
			$model->attributes=$_GET['Book'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Book the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$book=Book::model()->findByPk($id);
		if($book===null)
			throw new CHttpException(404,'The requested page does not exist.');
		$bookForm=new BookForm;
		$bookForm->attributes = $book->attributes;
		$serial_no = '';
		$dataList = BookSeq::model()->findAllByAttributes(array('bid'=>$id));
		foreach($dataList as $bean){
			$serial_no .= ',['.$bean->serial_no.']';
		}
		$bookForm->serial_no = substr($serial_no, 1);
		return $bookForm;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Book $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='book-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	
	protected function loadBookType(){
		$this->_btype = BookType::model()->findAll();
		return $this->_btype;
	}
	
	protected function loadTypeName($typeId){
		$this->_btype = BookType::model()->findByPk($typeId);
		return $this->_btype->description;
	}
}
