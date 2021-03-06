<?php
class Uploadify extends CWidget{

	private $model;
	private $attr;
	

	public function setModel($value){
		$this->model=$value;
	}
	public function getModel(){
		return $this->model;
	}

	public function setAttr($value){
		$this->attr=$value;
	}
	public function getAttr(){
		return $this->attr;
	}

	public function run(){
		if(is_array($this->model->{$this->attr})){
			foreach($this->model->{$this->attr} as $k=>$v){
				$this->render('uploadify_view',array(
				'id'=>get_class($this->model)."_".$this->attr."_".$k,
				'name'=>get_class($this->model).'['.$this->attr.']['.$k.']',
				'value'=>$this->model->{$this->attr}[$k],
				));
			}
		}else{
			$this->render('uploadify_view',array(
				'id'=>get_class($this->model)."_".$this->attr,
				'name'=>get_class($this->model).'['.$this->attr.']',
				'value'=>$this->model->{$this->attr},
			));
		}		

	}
}
?>
