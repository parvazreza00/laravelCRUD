<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Crud;
use Session;

class CrudController extends Controller
{
    public function ShowData(){
        //$showData = Crud::all();
        // $showData = Crud::paginate(5);
        $showData = Crud::simplePaginate(5);
        return view('show_data',compact('showData'));
    }

    public function AddData(){
        return view('add_data');
    }

    public function StoreData(Request $request){
        $rules =[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ];
        $customMess = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name must be less than 20 char',
            'email.required'=>'Enter your email',
            'name.email'=>'Your email must be a vlaid email',
        ];
        $this->validate($request,$rules,$customMess);

        $crud = new Crud();
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('message','Data added successfully');

        return redirect('/');
    }

    public function EditData($id){
        $editData = Crud::find($id);
        return view('edit_data',compact('editData'));
    }

    public function UpdateData(Request $request,$id){
        $rules =[
            'name'=>'required|max:20',
            'email'=>'required|email',
        ];
        $customMess = [
            'name.required'=>'Enter your name',
            'name.max'=>'Your name must be less than 20 char',
            'email.required'=>'Enter your email',
            'name.email'=>'Your email must be a vlaid email',
        ];
        $this->validate($request,$rules,$customMess);

        $crud = Crud::find($id);
        $crud->name = $request->name;
        $crud->email = $request->email;
        $crud->save();

        Session::flash('message','Data update successfully');

        return redirect('/');
    }

    public function DeleteData($id){
        $deleteData = Crud::find($id);
        $deleteData->delete();

        Session::flash('message','Data deleted successfully');

        return redirect('/');

    }

}
