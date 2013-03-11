<?php

/**
 * This is the model class for table "g_vacancy".
 *
 * The followings are the available columns in table 'g_vacancy':
 * @property integer $id
 * @property string $timestamp
 * @property string $vacancytitle
 * @property string $company_name
 * @property integer $company_hide
 * @property integer $industryid
 * @property integer $plevelid
 * @property integer $jspecid
 * @property string $work_address
 * @property string $work_area
 * @property integer $vacancycount
 * @property string $salary_currency
 * @property string $salary_min
 * @property string $salary_max
 * @property integer $salary_hide
 * @property string $date_start
 * @property string $date_end
 * @property integer $min_work_exp
 * @property integer $min_edulvl
 * @property string $min_grade
 * @property string $skill_required
 * @property integer $created_date
 * @property string $created_by
 * @property integer $updated_date
 * @property integer $updated_by
 */
class hVacancy extends BaseModel
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return vacancy the static model class
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
			array('vacancytitle, company_name, industryid, plevelid, jspecid, work_address, work_area, salary_currency, min_work_exp, min_edulvl,skill_required', 'required'),
			array('company_id, company_hide, industryid, plevelid, jspecid, vacancycount, salary_hide, min_work_exp, min_edulvl, created_date, updated_date, updated_by, status_id', 'numerical', 'integerOnly'=>true),
			array('vacancytitle, company_name, work_area, salary_currency, min_grade', 'length', 'max'=>255),
			array('salary_min, salary_max', 'length', 'max'=>10),
			array('created_by', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, timestamp, vacancytitle, company_name, company_hide, industryid, plevelid, jspecid, work_address, work_area, vacancycount, salary_currency, salary_min, salary_max, salary_hide, date_start, date_end, min_work_exp, min_edulvl, min_grade, skill_required, created_date, created_by, updated_date, updated_by', 'safe', 'on'=>'search'),
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
			'industry' => array(self::HAS_ONE, 'sParameter', array('code'=>'industryid'),'condition'=>'type = "cRecruitmentIndustry"'),
			'level' => array(self::HAS_ONE, 'sParameter', array('code'=>'plevelid'),'condition'=>'type = "cRecruitmentLevel"'),
			'spec' => array(self::HAS_ONE, 'sParameter', array('code'=>'jspecid'),'condition'=>'type = "cRecruitmentSpec"'),
			'status' => array(self::BELONGS_TO, 'sParameter', array('status_id'=>'code'),'condition'=>'type = \'cRecruitmentStatus\''),
			'edulevel' => array(self::BELONGS_TO, 'sParameter', array('min_edulvl'=>'code'),'condition'=>'type = \'EDU\''),
			'applicant' => array(self::HAS_MANY, 'hVacancyApplicant', 'vacancy_id'),
			'applicantCount' => array(self::STAT, 'hVacancyApplicant', 'vacancy_id'),
			'applicantM' => array(self::MANY_MANY, 'hApplicant', 'h_vacancy_applicant(vacancy_id,applicant_id)'),
			'company' => array(self::BELONGS_TO, 'aOrganization', 'company_id'),
			'jobalert' => array(self::HAS_MANY, 'hApplicantJobalert', array('jspecid'=>'specialization_id'),'condition'=>'hApplicantJobalert.status_id = 1'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'company_id' =>'Company',
			'timestamp' => 'Posting Date',
			'vacancytitle' => 'Title',
			'company_name' => 'Company Name',
			'company_hide' => 'Company Hide',
			'industryid' => 'Industry',
			'plevelid' => 'Level',
			'jspecid' => 'Specialization',
			'work_address' => 'Work Address',
			'work_area' => 'Work Area',
			'vacancycount' => 'Vacancycount',
			'salary_currency' => 'Salary Currency',
			'salary_min' => 'Salary Min',
			'salary_max' => 'Salary Max',
			'salary_hide' => 'Salary Hide',
			'date_start' => 'Date Start',
			'date_end' => 'Date End',
			'min_work_exp' => 'Min Working Exp (year)',
			'min_edulvl' => 'Min Education Level',
			'min_grade' => 'Min GPA',
			'skill_required' => 'Skill Required',
			'status_id' => 'Status',
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

		$criteria->order='timestamp DESC';

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	public static function getCategory() {

		$criteria=new CDbCriteria;
		$criteria->limit=10;
		$criteria->order="created_date DESC";
		$models=self::model()->findAll($criteria);

		$returnarray = array();

		foreach ($models as $model) {
			$returnarray[] = array('id' => $model->id, 'label' => $model->industry->name, 'icon'=>'list-alt', 'url' => array('/hVacancy/list','id'=>$model->id));
		}

		return $returnarray;
	}

	public function getHasApply() {

		$userid=hApplicant::model()->findByPk((int) Yii::app()->user->id)->id;
		
		$criteria=new CDbCriteria;
		$criteria->compare('applicant_id',$userid);
		$criteria->compare('vacancy_id',$this->id);
		$model=hVacancyApplicant::model()->find($criteria);
		
		if ($model==null) {
			return false;
		} else 
			return true;
					
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
		$criteria->compare('t.status_id!',4);
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

	public function Screened($act){
	
		$criteria=new CDbCriteria;
		$criteria->condition='status_id = '.$act.' AND vacancy_id = '.$this->id;
		$val=hVacancyApplicant::model()->count($criteria);
			
		return $val;
	}

	
	
}