<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Role;

class EmployeeController extends Controller
{
    public function showRoles(){
        // $employee = Employee::find(3);
        // return $employee->role;

        $employees = Employee::get();
        foreach($employees as $employee){
            echo $employee->name . "<br>";
            echo $employee->email . "<br>";
            echo $employee->city . "<br>";
            foreach($employee->role as $assign_role){
                echo $assign_role->roles . " / ";
            }
            echo "<hr>";
        }

    }

    public function showUsers(){
        $roles = Role::find(3);
        return $roles->employee;
    }

    public function modifyEmployee(){
        // add a new role to an employee
        // $employee = Employee::find(2);
        // $roles = [1,3];
        // $employee->role()->attach($roles);

        // remove an existing  role from an employee
        // $employee = Employee::find(2);
        // $roles = [1,3];
        // $employee->role()->detach($roles);
        // if the detach methods does not have any parameters it will remove all the roles from that users

        // sync() it will add,modify and delete the existing roles from an employee
         // $employee = Employee::find(4);
        // $roles = [1,3];
        // $employee->role()->sync($roles);

        // here we find the role and then it assign to which users
        $role = Role::find(2);
        $employee = [1,2];
        $role->employee()->sync($role);
    }
}
