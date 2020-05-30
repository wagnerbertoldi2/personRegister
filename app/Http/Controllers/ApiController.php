<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Model\Person;

class ApiController extends Controller{
    public function setPessoa(Request $request){
        if(empty($request->name)){
            return response()->json(["msg"=>"Favor, preencha o campo nome"], 201);
        } elseif(empty($request->cpf)){
            return response()->json(["msg"=>"Favor, preencha o campo cpf"], 201);
        } else {
            $cpf= Person::where('cpf',$request->cpf)->first();

            if(!empty($cpf['cpf'])){
                return response()->json(["msg"=>"Pessoa já cadastrada no sistema."], 201);
            } else {
                $person = new Person();

                $person->name = $request->name;
                $person->birth_date = $request->birth_date;
                $person->gender = $request->gender;
                $person->cpf = $request->cpf;
                $person->phone = $request->phone;
                $person->email = $request->email;

                $person->save();
                return response()->json(["msg"=>"Cadastro realizado com sucesso!"], 200);
            }
        }
    }

    public function getPessoa(){
        return response()->json(Person::all(), 200);
    }

    public function getPessoaFiltro(Request $request){
        $dados= Person::when($request->name,function($query){
                $query->where('name','like','%'.Request()->input('name').'%');
            })
            ->when($request->birth_date, function($query){
                $query->where('birth_date', Request()->input('birth_date'));
            })
            ->when($request->gender, function($query){
                $query->where('gender',Request()->input('gender'));
            })
            ->when($request->cpf, function($query){
                $query->where('cpf', Request()->input('cpf'));
            })
            ->when($request->phone, function($query){
                $query->where('phone',Request()->input('phone'));
            })
            ->when($request->email, function($query){
                $query->where('email',Request()->input('email'));
            })->get();

        return response()->json($dados, 200);
    }
}
