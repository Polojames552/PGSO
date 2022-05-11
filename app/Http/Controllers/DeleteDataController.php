<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DeleteDataController extends Controller
{
    public function destroy($id)
    {
    $user = User::findOrFail($id);

    $user->delete();
   
    return redirect('Assets')->with('message', 'The data is successfully deleted!');
    }
}
