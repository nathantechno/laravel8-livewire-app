<div class="row p-4 pt-5">
    <div class="col-12">
        <div class="card">
            <div class="card-header bg-primary align-items-center">
                <h3 class="card-title flex-grow-1"><i class="fas fa-users fa-2x"></i>
                    Liste des Utilisateurs</h3>
                <div class="card-tools d-flex align-items-center">
                    <a href="" class="btn btn-link text-white mr-4 d-block" wire:click.prevent="goToAddUser()">
                        <i class="fas fa-user-plus"></i>
                        Nouvel Utilisateur</a>
                    <div class="input-group input-group-md" style="width: 250px;">
                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-default">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-body table-responsive p-0" style="height: 300px;">
                <table class="table table-head-fixed text-nowrap">
                    <thead>
                        <tr>
                            <th style="width: 5%"></th>
                            <th style="width:25%">User</th>
                            <th style="width:20%">Roles</th>
                            <th style="width:20%">Ajouté</th>
                            <th style="width:30%" class="text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users)>0)
                        @foreach ($users as $row)
                        <tr>
                            <td>
                                @if($row->sexe=='F') <img src="{{ asset('images/woman.png') }}" width="24">

                                @else
                                <img src="{{ asset('images/man.png') }}" width="24">
                                @endif

                            </td>
                            <td>{{ $row->nom }} {{ $row->prenom }}</td>
                            <td class="text-center">
                                {{-- @foreach ($row->roles as $role)
                                {{ $role->nom }},
                                @endforeach --}}
                                {{-- {{ $row->roles->implode("nom","|") }} --}}
                                {{ $row->AllRoleNames }}
                            </td>
                            <td class="text-center"><span class="tag tag-success">{{
                                    $row->created_at->diffForHumans() }}</span></td>
                            <td class="text-center">
                                <button class="btn btn-link" wire:click='goToEditUser({{ $row->id }})'>
                                    <i class="far fa-edit"></i>
                                </button>
                                <button class="btn btn-link"
                                    wire:click='confirmDelete("{{ $row->nom }} {{ $row->prenom }}",{{ $row->id }})'>
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
            <div class="card-footer d-flex justify-content-end">
                {{ $users->links() }}
            </div>
        </div>

    </div>
</div>

<script>
    window.addEventListener("ConfirmMessage",event=>{
      
            Swal.fire({
            title: event.detail.message.title ,
            text: event.detail.message.text ,
            icon:  event.detail.message.type,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Continuer!',
            cancelButtonText: 'Annuler!'
            }).then((result) => {
            if (result.isConfirmed) { 
            // Call the deleteUSer component action
                 @this.deleteUSer(event.detail.message.data.user_id)
            }
            })
});

window.addEventListener("DeleteMessage",event=>{
        Swal.fire({
                position: 'top-end',
                icon: 'success',
                toast: true,
                title:event.detail.message || "Opération effectué avec succès", 
                showConfirmButton: false,
                timer:3000
                })
});
</script>