<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User as Users;
use Illuminate\Validation\Rule;
 


class Utilisateurs extends Component
{
    // public  $users;
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $currentPage = PAGELIST;
    public $newUser = [];
    public $editUser = [];
    // protected  $rules 
    public function rules()
    {
        if($this->currentPage == PAGEEDITFORM){

            // 'required|email|unique:users,email Rule::unique("users", "email")->ignore($this->editUser['id'])
            return [
                'editUser.nom' => 'required',
                'editUser.prenom' => 'required',
                'editUser.email' => ['required', 'email', Rule::unique("users", "email")->ignore($this->editUser['id']) ] ,
                'editUser.telephone1' => ['required', 'numeric', Rule::unique("users", "telephone1")->ignore($this->editUser['id']) ]  ,
                'editUser.pieceIdentite' => ['required'],
                'editUser.sexe' => 'required',
                'editUser.numeroPieceIdentite' => ['required', Rule::unique("users", "pieceIdentite")->ignore($this->editUser['id']) ],
            ];

        }
            return[
            'newUser.nom' => 'required',
            'newUser.prenom' => 'required',
            'newUser.email' => 'required|email|unique:users,email',
            'newUser.telephone1' => 'required|numeric|unique:users,telephone1',
            'newUser.pieceIdentite' => 'required',
            'newUser.sexe' => 'required',
            'newUser.numeroPieceIdentite' => 'required|unique:users,numeroPieceIdentite',
        ];
    }
    protected $messages = [
        'newUser.nom.required' => "Le nom d'utilisateur est requis.",
        'email.email' => 'The Email Address format is not valid.',
    ];

    protected $validationAttributes = [
        'newUser.telephone1' => 'numero de telephone 1'
    ];

    public $isBtnAddCliecked = false;
    public function render()
    {
        // $this->users=Users::paginate(5);
        return view('livewire.utilisateurs.index', ["users" => Users::latest()->paginate(5)])
            ->extends("layouts.master")
            ->section("contenu");
    }

    public function goToAddUser()
    {
        $this->currentPage = PAGECREATEFORM;
    }

    public function goToEditUser($id)
    {
       $this->editUser=User::find($id)->toArray();
        $this->currentPage = PAGEEDITFORM;
    }
    public function goToListUser()
    {
        $this->currentPage = PAGELIST;
        $this->editUser = [];
    }
    public function AddUser()
    {
        // dump($this->newUser);
        // Vérifier que les informations envoyées par le formulaire sont correctes
        $validationAttributes = $this->validate();
        $validationAttributes["newUser"]["password"] = "password";
        // Ajouter un nouvel utilisateur
        User::create($validationAttributes["newUser"]);
        $this->newUser = [];
        $this->dispatchBrowserEvent("successMessage", ["message" => "L'utilisateur est crée avec succès"]);
    }
    public function UpdateUser()
    {
       // Vérifier que les informations envoyées par le formulaire sont correctes
       $validationAttributes = $this->validate();
       User::find($this->editUser['id'])->update($validationAttributes);
       $this->dispatchBrowserEvent("successMessage", ["message" => "L'utilisateur est modifié avec succès"]);
    }
    public function confirmDelete($name,$id)
    {
        $this->dispatchBrowserEvent("ConfirmMessage", ["message" =>[
            "text"=>"Vous etes sur le point de supprimer $name  dela liste des utilisateurs Vous etes sur le point de supprimer.Voulew)vous continuer?",
            "title"=>"Etiez-vous sur de supprimer?",
            "type"=>"warning",
            "data"=>[
                "user_id"=>$id
            ]
        ]]);
    }
    public function deleteUSer($id)
    {
       User::destroy($id);
       $this->dispatchBrowserEvent("DeleteMessage", ["message" => "L'utilisateur est supprimé avec succès"]);
    }
}
