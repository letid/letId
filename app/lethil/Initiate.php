<?php
namespace App;
use Letid\Database\Query;
class Initiate extends Configuration
{
    // protected $database;
    /*
    protected $database = array(
        'password'=>"search",
        'database'=>'test'
    );
    protected $page = array(
        'home'=>array(
            'page.id'=>'myordbok', 'page.class'=>'home',
            'Class'=>'page', 'Method'=>'home',
            'menu'=>'Home',
            'page.link'=>NULL,
            'page.type'=>'page',
            'navigator'=>true,
            'RequireTemplate'=>array(
                'page.data'=>'template',
                'page.bar'=>'bar',
                'page.header'=>'header',
                'page.board'=>'board',
                'page.content'=>'content',
                'page.footer'=>'footer',
                'layout.main'=>'layout'
            )
        )
    );
    */
    protected function Database()
    {
        return false;
        // return array(
        //     'password'=>"search",
        //     'database'=>'test'
        // );
    }
    protected function Page()
    {
        return array(
            'home'=>array(
                'page.id'=>'myordbok', 'page.class'=>'home',
                'Class'=>'page', 'Method'=>'home',
                'menu'=>'Home',
                'page.link'=>NULL,
                'page.type'=>'page',
                'navigator'=>true,
                'RequireTemplate'=>array(
                    'page.data'=>'template',
                    'page.bar'=>'bar',
                    'page.header'=>'header',
                    'page.board'=>'board',
                    'page.content'=>'content',
                    'page.footer'=>'footer',
                    'layout.main'=>'layout'
                )
            )
        );
    }
    public function Before()
    {
        echo "Before\n<hr>";
    }
    public function Application()
    {
        // print_r(stripos("SELECT SQL_CALC_FOUND_ROWS id,name FROM tables WHERE name LIKE 'Jo%' LIMIT 1, 2;","sqsl_CALC_FOUND_ROWS"));
        /*
        UPDATE items,month SET items.price=month.price WHERE items.id=month.id;
        UPDATE tables SET name='Johnson' WHERE id = 0000000001;
        */
        print_r($this);
        // $det = Query::load("INSERT INTO tables (name, about) VALUES ('John','I like ike');");
        // $det = Query::load('SELECT * FROM audio')->toObject()->rows;
        // $det = Query::load('SELECT * FROM audio')->toArray();
        // $det = Query::load("UPDATE tables SET name='Kent2s' WHERE id ='0000000003';")->rowsCount();
        // $det = Query::load("SELECT * FROM tables")->toArray();
        // $det = Query::load("SELECT id,name FROM tables WHERE name LIKE 'Jo%' LIMIT 0, 2")->rowsCount()->toArray()->rowsTotal();
        // $det = Query::load("SELECT SQL_CALC_FOUND_ROWS id,name FROM tables WHERE name LIKE 'Jo%' LIMIT 1, 2;")->rowsTotal()->rowsCount()->toArray();
        // $det = Query::load("SELECT SQL_CALC_FOUND_ROWS id,name FROM tables WHERE name LIKE 'Jo%' LIMIT 2, 2;")->rowsCount()->toArray()->rowsTotal();
        // $det = Query::load("SELECT id FROM tables WHERE name LIKE 'sJo%'");
        // $det = Query::load("SELECT id FROM tables WHERE name LIKE 'Jo%'")->toArray()->hasCount();
        /*
        list,info,data,result
        list->all
        list->row
        list->array
        list->assoc
        list->object
        mysqli_fetch_array() - Fetch a result row as an associative, a numeric array, or both
        mysqli_fetch_assoc() - Fetch a result row as an associative array
        mysqli_fetch_object() - Returns the current row of a result set as an object
        */
        // echo $det;
        // print_r(DB::testDB());
        // print_r($det);

        // print_r($det->total);
        // print_r($det->rows);
        // print_r($det->msg);
        // print_r($det->list);
        return "\n<hr>...Initiate...";
    }
    public function After()
    {
        echo "\n<hr>After";
    }
}
