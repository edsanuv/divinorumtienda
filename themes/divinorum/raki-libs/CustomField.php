<?php 

/**
* create  
*/

class CustomField{
	
    private $fields;
    private $id_post;
	
    function __construct()
	{
		$a = func_get_args(); 
        $i = func_num_args(); 
        
        if ($i == 1) { 
            call_user_func_array(array($this,"createfield"),$a); 
        }
        if ($i == 2) { 
            call_user_func_array(array($this,"createfield2"),$a); 
        } 
		
	}

	function createfield($args){ 
    	$this->field = $args;
        $this->id_post  = false;       
    }

    function createfield2($args,$id){ 
        $this->field = $args;
        $this->id_post  = $id;   
    } 

    function render(){
        if(is_int($this->id_post) && $this->id_post!=0){
            $valueArr = get_post_meta($this->id_post, $this->field->key, false);
            
        }else{
            $value = "";
        }
        switch ($this->field->type) {            
            case 'text':
                $value = maybe_unserialize($valueArr[0]);
                echo "<div class='input-group'>
                    <span class='input-group-addon'>".$this->field->text."</span>
                    <input class='form-control' name='".$this->field->key."' value='".$value."' />
                </div>
                <br>";
                break;
            case 'textarea':
                $value = maybe_unserialize($valueArr[0]);
                echo "<div class='input-group'>
                    <span class='input-group-addon'>".$this->field->text."</span>
                    <textarea class='form-control' name='".$this->field->key."' >".$value."</textarea>
                </div>
                <br>";
                break;
            case 'checkbox':
                $value = maybe_unserialize($valueArr[0]);
                $checked = ($value == $this->field->key)?'checked':'';
                echo "<div class='input-group'>
                    <span class='input-group-addon'><input  type='checkbox'  name='".$this->field->key."' value='".$this->field->key."' ".$checked."  /></span>
                    <span class='form-control'>".$this->field->text."</span>
                    
                </div>
                <br>";
                break;
            case 'img':
                $value = maybe_unserialize($valueArr[0]);
                echo "<div class='input-group'>
                    <input class='form-control' name='".$this->field->key."' id='".$this->field->key."' value='".$value."' />
                    <span class='input-group-addon'>
                        <button type='button' id='upload_image_button' data-input='".$this->field->key."'>Insertar imagen</button>
                    </span>
                </div>
                <br>";
                break;
            case 'datepicker':
                $value = maybe_unserialize($valueArr[0]);
                echo "<div class='input-group date' data-provide='datepicker'>
                        <div class='input-group-addon'>".$this->field->text."</div>
                        <input type='text' name='".$this->field->key."' class='form-control datepicker' value='".$value."' />
                    </div>
                    <br>";
                break;
            case 'select':
                $value = maybe_unserialize($valueArr[0]);
                echo "<div class='form-group'>
                        <label for='sel1'>".$this->field->text.":</label>
                        <select class='form-control' name='".$this->field->key."'>";
                        foreach ($this->field->opt as $key => $opt) {

                            $selected = ($value == $opt->value)? 'selected':'';
                            echo "<option value='".$opt->value."' ".$selected." >".$opt->text."</option>";

                        }
                echo "</select>
                    </div>";
                break;
            case 'select_checkbox':
                $value = maybe_unserialize($valueArr[0]);
                echo '<div class="panel panel-default"><div class="panel-body"><label>'.$this->field->text.':</label><br>';
                foreach ($this->field->opt as $key => $opt) {
                        if(count($value)>0 && $value != "" ){
                            $checked = (in_array($opt->value, $value))?'checked':'';
                        }else{
                            $checked = '';
                        }
                        echo "<div class=' col-md-3'><input  type='checkbox' class='listpt' name='".$this->field->key."[]' value='".$opt->value."' ".$checked." /><span>".$opt->text."</span><br></div>";
                    }
                echo "</div></div>";
                break;
            case 'select_checkbox_sorteable':
                $value = maybe_unserialize($valueArr[0]);
                $out = realign_array($this->field->opt,$value);
                echo '<div class="panel panel-default"><div class="panel-body"><label>'.$this->field->text.':</label><br>
                    <ul id="sortable">';
                    for ($i=0; $i < count($out); $i++) {
                        echo "<li class='ui-state-default'><input  type='checkbox' class='listpt' name='".$this->field->key."[]' value='".$out[$i]->value."' ".$out[$i]->checked." /><span>".$out[$i]->text."</span><br></li>";
                    }
                echo "</ul></div></div>";
                break;
            case 'select_text':
                $value = maybe_unserialize($valueArr[0]);
                echo '<div class="panel panel-default"><div class="panel-body"><label>'.$this->field->text.':</label><br>';
                foreach ($this->field->opt as $key => $opt) {
                        echo "<div class=' col-md-3'><input  type='text' class='listpt' name='".$this->field->key."[]' value='".$opt->value."' /><span>".$opt->text."</span><br></div>";
                    }
                echo "</div></div>";
                break;
            default:
                echo "no type";
                break;
        }
    }


    function update(){
        if (count($_POST[$this->field->key])>0) {
            $value = maybe_serialize($_POST[$this->field->key]);
        }

        if ( !add_post_meta($this->id_post,$this->field->key,$value, true ) ) { 
           update_post_meta ($this->id_post,$this->field->key,$value);
        }
        
    }

}


class CustomFieldGrups {

     function __construct(){
        $a = func_get_args(); 
        $i = func_num_args(); 
        
        if ($i == 1) { 
            call_user_func_array(array($this,"createfield"),$a); 
        }
        if ($i == 2) { 
            call_user_func_array(array($this,"createfield2"),$a); 
        } 
        
    }

    function createfield($args){ 
        $this->group = $args;
        $this->id_post  = false;       
    }

    function createfield2($args,$id){ 
        $this->group = $args;
        $this->id_post  = $id;       
    } 

    function render(){
        foreach ($this->group as $key => $element) {
            $num = $element->col;
            if($num > 0){
                $col = (int)(12/( $num  ));
            }
            else{
                $col = 12;
            }
            
            echo '<div class="row">';
            echo '<h4 class="col-md-12">'.$element->title.'</h4>';
                foreach ($element->fields as $key => $fields) {
                    echo "<div class='col-md-$col'>";
                    if(is_int($this->id_post ) && $this->id_post !=0){
                        $field = new CustomField($fields,$this->id_post);
                    }else{
                        $field = new CustomField($fields);
                    }
                    $field->render();
                    echo '</div>';
                }
            echo '</div>';
        }
    }

    function update(){
        foreach ($this->group as $key => $element) {
            foreach ($element->fields as $key => $fields) {
                if(is_int($this->id_post ) && $this->id_post !=0){
                    $field = new CustomField($fields,$this->id_post);
                }else{
                    $field = new CustomField($fields);
                }
                $field->update();
            }
        }
    }

}

function realign_array($obj,$arrpattern){
    $select = [];
    $noselect = [];
    if(count($arrpattern)){
        for ($i=0; $i < count($arrpattern); $i++) { 
            foreach ($obj as $key => $opt) {
                $object = (object)array();
                if((int)$opt->value == (int)$arrpattern[$i]) {
                    $object->checked = "checked";
                    $object->text = $opt->text;
                    $object->value = $opt->value;
                    array_push($select, $object);
    
                }else{
                    $opt->checked = "";
                    array_push($noselect, $opt);
                }
            }
        }
        $out=array_merge($select,$noselect);
    }else{
        foreach ($obj as $key => $opt) {
            $object = (object)array();
            $opt->checked = "";
            array_push($noselect, $opt);
        }
        $out = $noselect;
    }
    
    return $out; 
}

add_action('add_meta_boxes', 'table');

function table() {
        add_meta_box( 'encuesta', __('Option table for festival dates'), 'cyb_meta_box_callback', 'page', 'normal', 'high', array( 'arg' => 'value') );
    
}

function cyb_meta_box_callback( $post, $args = array() ) {?>
    <div id="primary" ng-app="festivalpack" ng-controller="mytable">
        <festival-dates></festival-dates>
    </div>
    <style type="text/css">
        span.edittext {
            min-height: 18px;
            width: 93%;
            position: relative;
            float: left;
            cursor: pointer
        }
        span.glyphicon.glyphicon-remove.pull-right.deltab {
            left: 8px;
            top: 3px;
            color: #dc3545;
            cursor: pointer;
        }
    </style>    
<?php }