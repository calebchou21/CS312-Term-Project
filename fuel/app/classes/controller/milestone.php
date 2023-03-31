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
        $data['table'] = false;
        if(isset($_GET['rows-columns']) && isset($_GET['num-colors'])){
          //get GET params and trim 
           $rowCols = $_GET['rows-columns'];
           $colorNum = $_GET['num-colors'];
           $rowCols = trim($rowCols);
           $rowCols = htmlspecialchars($rowCols);
           $colorNum = trim($colorNum);
           $colorNum = htmlspecialchars($colorNum);
           
          //return false if parameters outside of bounds 
          if($rowCols < 1 || $rowCols > 26 || $colorNum < 1 || $colorNum > 10){
               $data['table'] = false;
          }else{
               $data['rowCols'] = $rowCols;
               $data['colors'] = $colorNum;
               $data['table'] = true;
          }
      }else{
          $data['table'] = false;
      }
        $this->template->content = View::forge('milestone/colorCoordinator', $data);
        
   }

   


   

   

} 