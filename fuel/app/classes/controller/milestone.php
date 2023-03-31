<?php
class Controller_Milestone extends Controller_Template {

   public $template = 'milestone_template'; 


   public function action_index() {
       $data = array();
       $this->template->title = 'Home Page';
       $this->template->content = View::forge('milestone/index', $data); 
   }

   public function action_about(){
        $data = array();
        $this->template->title = 'About';
        $this->template->content = View::forge('milestone/about', $data); 
   }

   public function action_colorCoordinator(){
        $data = array();
        $this->template->title = 'Color Coordinator';
        if(isset($_GET['rows-columns']) && isset($_GET['num-colors'])){
          //get GET params and trim 
           $rowCols = $_GET['rows-columns'];
           $colorNum = $_GET['num-colors'];
           $rowCols = trim($rowCols);
           $rowCols = htmlspecialchars($rowCols);
           $colorNum = trim($colorNum);
           $colorNum = htmlspecialchars($colorNum);
           //Split row-cols into array
           $rowColsArray = explode("/", $rowCols);
           //return false if we don't have values for both rows and cols
           if(count($rowColsArray) != 2){
              $this->template->table = false;
           }
           $rows = $rowColsArray[0];
           $columns = $rowColsArray[1];
           //return false if parameters outside of bounds 
           if($rows < 1 || $columns < 1 || $rows > 26 || $columns > 26 || $colorNum < 1 || $colorNum > 10){
               $this->template->table=false;
          }else{
               $this->template->table=true;
          }
      }else{
          $this->template->table=false;
      }
        $this->template->content = View::forge('milestone/colorCoordinator', $data);
        
   }

   


   

   

} 