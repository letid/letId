<?php
namespace App;
// use Letid\Database\Query;
class Application extends Routine
{
    protected $page = array(
        'home'=>array(
            'Class'=>'home',
            'Method'=>'home'
        ),
        'music'=>array(
            'Class'=>'music',
            'album'=>array(
                'Method'=>'album',
                'title'=>array(
                    'Method'=>'title',
                    'sort'=>array(
                        'Method'=>'sort',
                    )
                ),
                'name'=>array(
                    'Method'=>'name',
                )
            ),
            'artist'=>array(
                'Method'=>'artist'
            )
        )
    );
    // protected function Done()
    // {
    //     // TODO: remove add comfirmed
    //     // NOTE: executed after Completetion
    // }
    // protected function Application()
    // {
    //     echo 'App\Application\Application';
    // }
}
