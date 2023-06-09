<?php
namespace Model;
use \DB;

// Todo DB Skeleton Code

class m2Model extends \Model {

    public static function add_color($colorName, $hexVal) {
        // This just finds the next largest id in the database table
        // If the table is empty it sets the first id to 1
        $id = m2Model::largest_id()[0]['id'];
        if ($id == NULL) {
            $id = 1;
        } else {
            $id = $id + 1;
        }
        
        DB::insert('Colors')->set(array(
            'id'->$id,
            'colorName'-> $_POST['colorName'],
            'hexVal' -> $_POST['hexVal']
        ))->execute();
    
    }

    //this stuff copied from lab but might be helpful

   /*  public static function delete_todos($todo_ids) {
        // Use DB::delete to remove an item. Remember to add ->execute() to the end so that it runs the query
        // Here is a basic outline:
        // DB::delete('<THE_DATABASE_TABLE>')->where('id','in',<ARRAY_OF_IDS>)->execute();
    }

    public static function update_todo() {
        return false;
    }

    public static function read_todos() {
        // Notice that this query ends in execute then as_array
        // The queries from DB just return an object that needs to be executed, then to get the results
        // You can use as_array to get them all at once or other methods to iterate over the results of the query
        // by row
        return DB::query('SELECT id, description as text FROM `todos`', DB::SELECT)->execute()->as_array();
    }

    public static function todo_count() {
        return DB::count_records('todos') ;
    }

    private static function largest_id() {
        return DB::query('SELECT MAX(id) as id FROM `Colors`')->execute()->as_array();
    } */
}
?>