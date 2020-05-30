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

    public function getPessoa(Request $request){
        if(!empty($request->idperson)){
            return response()->json(Person::find($request->idperson), 200);
        } else {
            return response()->json(Person::all(), 200);
        }
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

    public function excluirPessoa(Request $request){
        $objPessoa= Person::where('idperson',$request->idperson)->first();

        if($objPessoa == null){
            return response()->json(['msg'=>"Esta pessoa não foi encontrada em nossa base de dados."], 200);
        } else {
            Person::where('idperson',$request->idperson)->delete();
            return response()->json(['msg'=>"Pessoa excluída com sucesso"], 200);
        }
    }

    public function alterarPessoa (Request $request){
        if(empty($request->name)){
            return response()->json(["msg"=>"Favor, preencha o campo nome"], 201);
        } elseif(empty($request->cpf)){
            return response()->json(["msg"=>"Favor, preencha o campo cpf"], 201);
        } else {
            $id= $request->idperson;

            $person = Person::find($id);

            if(!empty($request->name)) {
                $person->name = $request->name;
            }

            if(!empty($request->birth_date)) {
                $person->birth_date = $request->birth_date;
            }


            if(!empty($request->gender)) {
                $person->gender = $request->gender;
            }

            if(!empty($request->cpf)) {
                $person->cpf = $request->cpf;
            }

            if(!empty($request->phone)) {
                $person->phone = $request->phone;
            }

            if(!empty($request->email)) {
                $person->email = $request->email;
            }

            $person->save();

            return response()->json(["msg"=>"Alteração realizada com sucesso!"], 200);
        }
    }


}
