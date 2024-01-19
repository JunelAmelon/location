<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\User;
use App\Models\Voitures;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PageController extends Controller
{

    /* INSCRIPTION FUNCTION */
    public function inscription(Request $request){
        $request->validate(['email'=>'unique:users,email']);
        User::create([
            'nomPrenom'=>$request->nomPrenom,
            'email'=>$request->email,
            'adresse'=>$request->adresse,
            'password'=>Hash::make($request->password),
            'admin'=>0
        ]);
        return redirect()->route('connexion');
        
    }

    /* DELETE FUNCTION */

    public function delete($id){
        // Voitures::where('id', '=', $id)->delete();
        // DB::table('voitures')
        // ->join('locations', 'voitures.id','=','locations.id_voitures')
        // ->where('voitures.id','=',$id)
        // ->delete();
        // return redirect()->back();

        // dd(DB::table('locations')
        //     ->where('id_voitures', '=', $id)
        //     ->delete());
        $req = DB::table('locations')->select('locations.id')->where('id_voitures', '=', $id)->where('statut', '=', 0)->count();
        // dd(DB::table('locations')->select('locations.id')->where('id_voitures', '=', $id)->where('statut', '=', 0)->count());
        if($req != 0){
            return redirect()->back()->with('suppression','La voiture que vous essayez de supprimer est liée à la location d\'un utilisateur. La supprimée revient à faire disparaître la location de son historique');
        }
        else {
            DB::table('locations')
                ->where('id_voitures', '=', $id)
                ->delete();
            DB::table('voitures')
                ->where('id', '=', $id)
                ->delete();
            return redirect()->back();
        }

    }

    /* UPDATE FUNCTION */
    public function update_car(Request $request){
        if($request->image == null){
            Voitures::where('id', '=', $request->id)->update([
                'marque'=>$request->marque,
                'modele'=>$request->modele,
                'couleur'=>$request->couleur,
                'prix_jour'=>$request->prix,
            ]);
        }else{
            $path = $request->file('image')->store("car_images");
            Voitures::where('id', '=', $request->id)->update([
                'marque'=>$request->marque,
                'modele'=>$request->modele,
                'couleur'=>$request->couleur,
                'prix_jour'=>$request->prix,
                'image'=>$path,
            ]);
        }
        return redirect()->route('myCars');
        
    }

    /* DASHBOARD FUNCTION */
    public function dashboard(){
        if(auth()->user()->admin){
            $locations = $this->locations();
            $users = User::count();
            $loc = Location::where('statut', 0)->count();
            $sommeTotal = Location::sum('cout_total');
             return view('/dashboard',['locations'=>$locations ,'users'=>$users, 'loc'=>$loc, 'sommeTotal'=>$sommeTotal]);
         }else{
            return redirect()->route('acceuil');
        }
    }

    public function search(Request $request){
        $query = $request->input('query');
        $results = DB::table('voitures')
                    ->where('marque', 'LIKE', "%$query%")
                    ->orWhere('modele', 'LIKE', "%$query%")
                    ->get();
        return view('rec', ['results'=>$results , 'query'=>$query]);
    }
    
    
    public function allCars(){
        // if(auth()->user())
        // {
            $cars = Voitures::all();
            return view('/mesVoitures1',compact('cars'));
       // }
        // return redirect()->route('connexion');  
        }

    public function formulaireLoc($id){
        if(auth()->user()){
            $car = Voitures::findOrFail($id);
            return view('/formulaireLoc',compact('car'));
        }
        else{
            return redirect()->route('connexion');
        }
       
    }

    public function allclients(){
        $clients = DB::table('users')
                    ->leftJoin('locations', 'users.id', '=', 'locations.id_clients')
                    ->select('users.id','users.nomPrenom', 'users.email', 'users.adresse')
                    ->groupBy('users.id','users.nomPrenom', 'users.email', 'users.adresse')
                    ->get();
        return view('/clients',['clients' => $clients]);
    }
    
    public function locations(){
        $locations = DB::table('locations')
        ->join('users', 'users.id', '=', 'locations.id_clients')
        ->join('voitures', 'voitures.id', '=', 'locations.id_voitures')
        ->select('locations.*', 'users.nomPrenom', 'voitures.marque', 'voitures.modele', 'voitures.image')
        ->orderBy('locations.id')
        ->get();
        return $locations;
    }
    public function allLocations(){
        $locations = $this->locations();
        return view('/location', ['locations'=>$locations]);
    }
    public function myLocations(){
        $locations = $this->location_user();
        // return redirect()->route('myLocations', ['locations' => $locations])->with('success','Location effectuée avec succès');
        return view('/myLocations1', ['locations' => $locations])->with('success','Location effectuée avec succès');
    }
    
    public function myCars(){
        $cars = Voitures::all();
        return view('/mesVoitures', ['cars'=>$cars]);
    }
    public function update($id){
        $car = Voitures::findOrFail($id);
        return view('/modification', compact('car'));
    }

    /* DECONNEXION FUNCTION */

    public function deconnexion(){
        if(auth()->user()){
            Auth::logout();
        }
        return redirect()->route('acceuil');
    }

    public function add(){
        if(auth()->user()->admin){
            return view('/ajout');
        }else{
            return redirect()->route('acceuil');
        }
    }

    /* CREATE_CAR FUNCTION */

    public function create_car(Request $request){
        //dd($request->all());
        $path = $request->file('image')->store("car_images");
        Voitures::create([
            "marque"=>$request->marque, 
            "modele"=>$request->modele,
            "couleur"=>$request->couleur,
            "prix_jour"=>$request->prix,
            "image"=>$path,
            "created_at"=>now(),
        ]);
        return redirect()->route('myCars');
    }
    
    /* CONNEXION FUNCTION */
    
    public function connexion(Request $request){
        $credentials= $request->validate(['email'=>'required','password'=>'required']);
        $auth = Auth::attempt($credentials);
        if($auth = true){
            $request->session()->regenerate();
            if(auth()->user())
                return redirect()->route('acceuil');
            else
                return redirect()->route('connexion')->with('error', 'Echec de la connexion ! Veuillez entrez les bonnes informations');

        }
        
    }
    public function userConnected(){
        if(auth()->user()){
            $user_actuel = auth()->user()->id;
        }
        return $user_actuel;
    }

    public function location(Request $request){
        if(auth()->user()){
            $user_actuel = auth()->user()->id;
            if($request->nbre_jour == 0){
                return redirect()->back()->with('jour', 'Le nombre minimal de jour est de 1');
            }
            else{
                // dd($request->all());
                Location::create([
                    'id_clients'=>$user_actuel,
                    'id_voitures'=>$request->id,
                    'date_debut'=>$request->date_deb,
                    'date_fin'=>$request->date_fin,
                    'cout_total'=>$request->prix_Tot,
                    'statut'=> 0
                ]);

                // $locations = DB::table('locations')
                //             ->join('users', 'users.id', '=', 'locations.id_clients')
                //             ->join('voitures', 'voitures.id', '=', 'locations.id_voitures')
                //             ->select('locations.*', 'users.nomPrenom', 'voitures.marque', 'voitures.modele','voitures.image')
                //             ->where('locations.id_clients','=',$user_actuel)
                //             ->get();
                $locations = $this->location_user();
                
                return view('myLocations', ['locations' => $locations]);
            }
        
        }
        return redirect()->route('connexion');  
    }
    public function location_user(){
        $locations = DB::table('locations')
                        ->join('users', 'users.id', '=', 'locations.id_clients')
                        ->join('voitures', 'voitures.id', '=', 'locations.id_voitures')
                        ->select('locations.*', 'users.nomPrenom', 'voitures.marque', 'voitures.modele', 'voitures.image')
                        ->where('locations.id_clients','=',$this->userConnected())
                        ->get();
            
        return $locations;
    }
    
    public function updateStatus($id)
        {
            $status = Location::find($id);
            $status->statut = 1;
            $status->save();
            return redirect()->back();
        }
    
    public function rollback($id)
    {
        $status = Location::find($id);
        $status->statut = 0;
        $status->save();
        return redirect()->back();
    }
}


