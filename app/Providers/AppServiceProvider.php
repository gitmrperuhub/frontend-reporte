<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        /*$arrayMenu=DB::table('permisions as p')
        ->join('modules as m', 'p.module_id', '=', 'm.id')
        ->join('users as u', 'p.user_id', '=', 'u.id')
        ->select(
            "m.id as padre_id_active",
            "m.id as padre_id_active2",
            "m.id", 
            "m.name as nombre", 
            "m.url", 
            "m.icon_1 as icono", 
            "m.parent as padre" ,
            "p.user_id as id_usuario",
            "m.url",
            "m.name_route"
        )->where('p.user_id', 1)
        ->orderBy('m.order', 'asc')
        ->get();
        $menus = array(
            'items' => array(),
            'parents' => array()
        );
        //$parent =0;
        $pag_actual_id ="";
        foreach ($arrayMenu as $items){
            $menus['items'][$items->id] = $items;
            $menus['parents'][$items->padre][] = $items->id;
            $padre_ul  = $items->padre_id_active;
            $padre_ul2 = $items->padre_id_active2;
        }
        function  createTreeView_Material($parent, $menu, $id_pag_actual){
            $html2 = "";
            if (isset($menu['parents'][$parent])){
                foreach ($menu['parents'][$parent] as $itemId){                    
                    $iconos = "";
                    if ($menu['items'][$itemId]->padre==0) {
                    }
                    $iconos = $menu['items'][$itemId]->icono;
                    
                    $url = $menu['items'][$itemId]->url;
                    //$sss= route($menu['items'][$itemId]->name_route);
                    if (Route::has('users')){
                        //route($menu['items'][$itemId]->url);
                    }
                    if(!isset($menu['parents'][$itemId])){
                        $activeclass_child="";
                        if($menu['items'][$itemId]->url==$id_pag_actual){
                            $activeclass_child=" active ";
                        }
                        $html2 .='<div class="menu-item edwin padre">
                                    <a class="menu-link unooo" href="'.url($menu['items'][$itemId]->name_route).'">
                                        '.$iconos.'
                                        <span class="menu-title">'.$menu['items'][$itemId]->nombre.'</span>
                                    </a>
                                </div>';
                    }if(isset($menu['parents'][$itemId])){
                        $activeclass="";
                        //if($padre_id_active==$menu['items'][$itemId]->id || $padre_id_active2==$menu['items'][$itemId]->id){
                            $activeclass=" active ";
                        //}

                        $html2 .= '<div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link dosss">
                                '.$iconos.'
                                <span class="menu-title">'.$menu['items'][$itemId]->nombre.'</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">';
                            $html2 .= createTreeView_Material($itemId, $menu, $id_pag_actual); 
                            $html2 .='</div>
                        </div>';
                    }
                    
                }
            }
            return $html2;
        }
        */
        $rsMenu= session()->get('Id');// createTreeView_Material(0, $menus, $pag_actual_id);
        View::share('rsMenu',  $rsMenu);
    }
}
