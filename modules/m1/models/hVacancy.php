<?php

/**
 * This is the model class for table "h_vacancy".
 *
 * The followings are the available columns in table 'h_vacancy':
 * @property integer $id
 * @property integer $company_id
 * @property string $vacancy_title
 * @property string $vacancy_desc
 * @property string $industry_tag
 * @property string $for_level
 * @property string $specification_tag
 * @property string $work_address
 * @property string $city
 * @property integer $min_salary
 * @property integer $max_salary
 * @property integer $salary_hide
 * @property integer $min_working_exp
 * @property string $min_education_level
 * @property string $min_gpa
 * @property string $skill_required
 * @property string $promotion_content
 * @property integer $created_date
 * @property integer $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 *
 * The followings are the available model relations:
 * @property HVacancyApplicant[] $hVacancyApplicants
 */
class hVacancy extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return hVacancy the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'h_vacancy';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('company_id, vacancy_title, industry_tag, for_level, specification_tag, city, min_salary, max_salary, salary_hide, min_working_exp, min_education_level, skill_required, created_date, created_by, updated_date, updated_by', 'required'),
			array('company_id, min_salary, max_salary, salary_hide, min_working_exp, created_date, created_by, updated_date, updated_by', 'numerical', 'integerOnly'=>true),
			array('vacancy_title, for_level, city', 'length', 'max'=>100),
			array('vacancy_desc, industry_tag, specification_tag, work_address, skill_required', 'length', 'max'=>255),
			array('min_education_level', 'length', 'max'=>50),
			array('min_gpa', 'length', 'max'=>10),
			array('promotion_content', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, company_id, vacancy_title, vacancy_desc, industry_tag, for_level, specification_tag, work_address, city, min_salary, max_salary, salary_hide, min_working_exp, min_education_level, min_gpa, skill_required, promotion_content, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'applicant' => array(self::HAS_MANY, 'hVacancyApplicant', 'vacancy_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' => 'Company',
			'vacancy_title' => 'Title',
			'vacancy_desc' => 'Description',
			'industry_tag' => 'Industry Tag',
			'for_level' => 'For Level',
			'specification_tag' => 'Specification Tag',
			'work_address' => 'Work Address',
			'city' => 'City',
			'min_salary' => 'Min Salary',
			'max_salary' => 'Max Salary',
			'salary_hide' => 'Hide Salary Info',
			'min_working_exp' => 'Min Working Experience (year)',
			'min_education_level' => 'Min Education Level',
			'min_gpa' => 'Min GPA',
			'skill_required' => 'Skill Required',
			'promotion_content' => 'Promotion Content',
			'created_date' => 'Created Date',
			'created_by' => 'Created By',
			'updated_date' => 'Updated Date',
			'updated_by' => 'Updated By',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('company_id',$this->company_id);
		$criteria->compare('vacancy_title',$this->vacancy_title,true);
		$criteria->compare('vacancy_desc',$this->vacancy_desc,true);
		$criteria->compare('industry_tag',$this->industry_tag,true);
		$criteria->compare('for_level',$this->for_level,true);
		$criteria->compare('specification_tag',$this->specification_tag,true);
		$criteria->compare('work_address',$this->work_address,true);
		$criteria->compare('city',$this->city,true);
		$criteria->compare('min_salary',$this->min_salary);
		$criteria->compare('max_salary',$this->max_salary);
		$criteria->compare('salary_hide',$this->salary_hide);
		$criteria->compare('min_working_exp',$this->min_working_exp);
		$criteria->compare('min_education_level',$this->min_education_level,true);
		$criteria->compare('min_gpa',$this->min_gpa,true);
		$criteria->compare('skill_required',$this->skill_required,true);
		$criteria->compare('promotion_content',$this->promotion_content,true);
		$criteria->compare('created_date',$this->created_date);
		$criteria->compare('created_by',$this->created_by);
		$criteria->compare('updated_date',$this->updated_date);
		$criteria->compare('updated_by',$this->updated_by);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getTopCreated() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order="created_date DESC";
		$criteria->compare('status_id!',4);
		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$_title= (strlen($model->vacancytitle) >32) ? substr($model->vacancytitle,0,32)."..." : $model->vacancytitle;
			$returnarray[] = array('id' => $model->id, 'label' => $_title, 'icon'=>'list-alt', 'url' => array('/m1/hVacancy/view','id'=>$model->id));
		}

		return $returnarray;
	}

	public static function getTopRelated($name) {

		$_exp=explode(" ",$name);


		$criteria=new CDbCriteria;

		if (isset($_exp[0]))
			$criteria->compare('vacancytitle',$_exp[0],true,'OR');

		if (isset($_exp[1]))
			$criteria->compare('vacancytitle',$_exp[1],true,'OR');
			
		$criteria->limit=10;
		$criteria->order='t.updated_date DESC';

		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$_title= (strlen($model->vacancytitle) >32) ? substr($model->vacancytitle,0,32)."..." : $model->vacancytitle;
			$returnarray[] = array('id' => $model->id, 'label' => $_title, 'icon'=>'list-alt', 'url' => array('/m1/hVacancy/view','id'=>$model->id));
		}

		return $returnarray;
	}
	
	public static function getTopRecentVacancy() {

		$criteria=new CDbCriteria;
		$criteria->limit=50;
		$criteria->together=true;
		$criteria->order="applicant.created_date DESC";
		$criteria->with=array('applicant');

		if (Yii::app()->user->name != "admin") {
			$criteria2 = new CDbCriteria;
			$criteria2->condition='company_id IN ('.implode(",",sUser::model()->getGroupArray()).')' ;
			$criteria->mergeWith($criteria2);
		}
				

		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$_title= (strlen($model->vacancytitle) >28) ? substr($model->vacancytitle,0,28)."... (".$model->applicantCount .")" : $model->vacancytitle ." (".$model->applicantCount .")";
			$returnarray[] = array('id' => $model->id, 'label' => $_title, 'icon'=>'list-alt', 'url' => array('/m1/hVacancy/view','id'=>$model->id));
		}

		return $returnarray;
	}
	
}