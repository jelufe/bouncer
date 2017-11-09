<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\User;

use Silber\Bouncer\Database\Role;
use Illuminate\Support\Facades\Redirect;
use Bouncer;

use Illuminate\Support\Facades\Auth;

class PapelController extends Controller
{
    public function index(){

    	$roles = Bouncer::role()->all();;
    	return view('papeis', ['roles' => $roles]);
    	
    }

    public function view($id){

    	$role = Role::find($id);
    	$abilities = $role->getAbilities();
    	
    	return view('papel', ['abilities' => $abilities, 'role' => $role]);
    }

    public function viewaddregra($id){
    	$role = Role::find($id);
    	return view('addregra', ['role' => $role]);
    }

    public function salvar_regra(Request $data){
    	$role = Role::find($data['id']);
    	Bouncer::allow($role->name)->to($data['regra']);
    	return Redirect::to('papel/'.$role->id);
    }

    public function remover_regra(Request $data){
    	$role = Role::find($data['id']);
    	Bouncer::disallow($role->name)->to($data['nome']);
    	return Redirect::to('papel/'.$role->id);
    }

    public function viewaddpapel(){
    	return view('addpapel');
    }

    public function salvar_papel(Request $data){
    	Bouncer::allow($data['papel'])->to('padrão');
    	return Redirect::to('papeis');
    }

    public function papeisdousuario($id){
    	$user = new User();
    	$user = $user->find($id);
    	$roles = Bouncer::role()->all();;
    	return view('papeisdousuario', ['roles' => $roles, 'user' => $user]);

    }

    public function adicionar_papel(Request $data){
    	$user = new User();
    	$user = $user->find($data['id']);
    	Bouncer::assign($data['nome'])->to($user);
    	return Redirect::to('papeisdousuario/'.$user->id);
    }

    public function remover_papel(Request $data){
    	$user = new User();
    	$user = $user->find($data['id']);
    	Bouncer::retract($data['nome'])->from($user);
    	return Redirect::to('papeisdousuario/'.$user->id);
    }

}
