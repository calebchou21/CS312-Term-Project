<?php
class Controller_Milestone extends Controller_Template {

   public $template = 'milestone_template';
   public $globalColor;
   public $globalRow;


   public function action_index() {
       $data = array();
       $this->template->title = 'Home Page';
       $this->template->css = 'milestone.css';
       $this->template->content = View::forge('milestone/index', $data); 
   }

   public function action_about(){
        $data = array();
        $this->template->title = 'About';
        $this->template->css = 'milestone.css';
        $this->template->content = View::forge('milestone/about', $data); 
   }

   public function action_colorCoordinator(){
        $data = array();
        $this->template->title = 'Color Coordinator';
        $data['table'] = false;
        $this->template->css = 'milestone.css';
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
               $this->globalColor = $colorNum;
               $this->globalRow = $rowCols;
          }
      }else{
          $data['table'] = false;
      }
        $this->template->content = View::forge('milestone/colorCoordinator', $data);
        
   }

   public function action_printView($colors, $rowCols){
       $data = array();
       $this->template->title = 'Print View';
       $this->template->css = 'greyscale.css';
       $data['colors'] = $colors;
       $data['rowCols'] = $rowCols;
       $this->template->content = View::forge('milestone/printView', $data);
   }
// I Think we need to do something here to handle the post from colorCoordinator so the add.php can run its course."
   public function post_index(){

     //IDK IF THE COLORNAME AND HEXVAL POSTS ARE RIGHT
     if (isset($_POST['add']) && isset($_POST['colorName']) && isset($_POST['hexVal'])) {
          m2Model::add_color($_POST['colorName'], $_POST['hexVal']);
     }


     //Copied kind from todo lab. I think we can post all checked colors and then delete them?
     if (isset($_POST['delete']) && isset($_POST['checked'])) {
          $checked_colors = array();
          foreach ( $_POST['colorcheck'] as $id ) {
              $checked_colors[] = $id;
          }

          //we dont have this function in the model yet
          m2Model::delete_color($checked_colors);
     }

     $data = array(
          'colors' => m2Model::read_colors(),
          'todo_count' => m2Model::color_count()
     );
     //I dont kow what to forge here
     //return Response::forge(View::forge('tododbviews/todomaincontent', $data));
   }

   


   

   

} 