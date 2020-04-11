<?php
namespace App\Http\Controllers\api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Card;
use Validator;


class CardController extends Controller
{

    public function drawCard(Request $request){
      try
      {
          //validation to make sure input is valid
          $messages =
              [
                  'number_users.required'    => 'Input value does not exist or value is invalid',
                  'number_users.numeric'      => 'Input value does not exist or value is invalid',
                  'number_users.min' => 'Input value does not exist or value is invalid.',
              ]
          ;

          $validation = Validator::make($request->all(),[
             'number_users' => 'required|numeric|min:0|integer',
          ], $messages);


         if($validation->fails()){
           $errorString = implode(",",$validation->messages()->all());
           return response()->json([
               'status' => false,
               'error' => $errorString

           ]);

         }
         else{
           return response()->json([
               'status' => true,
               'data' => Card::shuffled_deck($request->number_users)

           ]);
         }
      }
      catch(Exception $e){

        return response()->json([
            'status' => false,
            'error' => 'Irregularity occurred'

        ]);
      }




    }

}
