<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $Students = Student::paginate(6);
        return view('welcome',compact('Students'));
    }
    public function create()
    {
        return view('create');
    }
    public function store(Request $request)
    {
        //ຖ້າມີຕາຕາລາງຜິດຈະບໍ່ສາມາດເພີ່ມຂໍ້ມູນລົງໃນຖານຂໍ້ມູນໄດ້
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);
        //ຖ້າມີຕາຕະລາງຜິດພາດຈະເກີດການ Illuminate\Database\QueryException
        $Student = new Student;
        $Student->first_name = $request->firstname;
        $Student->last_name = $request->lastname;
        $Student->email = $request->email;
        $Student->phone = $request->phone;
        $Student->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully Updated');
    }
    public function edit($id){
        $Student = Student::find($id);
        return view('edit', compact('Student'));
    }
    public function delete($id){
        Student::find(($id)->delete());
        return redirect(route('home'))->with('successMsg', 'Student Successfully Deleted');
    }
    public function update(Request $request, $id){
        $this->validate($request,[
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);
        //ຖ້າມີຕາຕະລາງຜິດພາດຈະເກີດການ Illuminate\Database\QueryException
        $Student = Student::find($id);
        $Student->first_name = $request->firstname;
        $Student->last_name = $request->lastname;
        $Student->email = $request->email;
        $Student->phone = $request->phone;
        $Student->save();
        return redirect(route('home'))->with('successMsg', 'Student Successfully added');

    }
}
