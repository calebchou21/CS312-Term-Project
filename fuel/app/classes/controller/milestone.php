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
        $this->template->content = View::forge('milestone/colorCoordinator', $data); 
   }

} 