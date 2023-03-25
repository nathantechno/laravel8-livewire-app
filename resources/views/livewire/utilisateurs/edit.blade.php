<div class="row p-4 pt-5">
    <div class="col-md-6">

        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"><i class="fas fa-user-plus fa-2x"></i> Formulaire d'édition utilisateur</h3>
            </div>


            <form role="form" wire:submit.prevent="UpdateUser()">
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="nom">Nom</label>
                                <input type="text" wire:model="editUser.nom"
                                    class="form-control @error('editUser.nom') is-invalid @enderror">
                                @error("editUser.nom")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input type="text" wire:model="editUser.prenom"
                                    class="form-control @error('editUser.prenom') is-invalid @enderror">
                                @error("editUser.prenom")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sexe">Sexe</label>
                        <select wire:model="editUser.sexe"
                            class="form-control @error('editUser.sexe') is-invalid @enderror">
                            <option>.........</option>
                            <option value="H">Homme</option>
                            <option value="F">Femme</option>
                        </select>
                        @error("editUser.sexe")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Adresse email</label>
                        <input type="text" wire:model="editUser.email"
                            class="form-control  @error('editUser.email') is-invalid @enderror ">
                        @error("editUser.email")
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-sm-6">

                            <div class="form-group">
                                <label>Télephone 1</label>
                                <input type="text" wire:model="editUser.telephone1"
                                    class="form-control  @error('editUser.telephone1') is-invalid @enderror ">
                                @error("editUser.telephone1")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Télephone 2</label>
                                <input type="text" wire:model="editUser.telephone2" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="noieceIdentite">Pièce d'identité</label>
                                <select wire:model="editUser.pieceIdentite"
                                    class="form-control  @error('editUser.pieceIdentite') is-invalid @enderror ">
                                    <option>.........</option>
                                    <option value="CNI">CNI</option>
                                    <option value="PASSPORT">PASSPORT</option>
                                    <option value="PERMIS DE CONDUIRE">PERMIS DE CONDUIRE</option>
                                </select>
                                @error("editUser.pieceIdentite")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <label for="">Numéro pièce d'identité</label>
                                <input type="text" wire:model="editUser.numeroPieceIdentite"
                                    class="form-control  @error('editUser.numeroPieceIdentite') is-invalid  @enderror">
                                @error("editUser.numeroPieceIdentite")
                                <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
 
                    {{-- <div class="form-group">
                        <label for="exampleInputFile">File input</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                            <div class="input-group-append">
                                <span class="input-group-text">Upload</span>
                            </div>
                        </div>
                    </div> --}}
                </div>

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
                    <button wire:click="goToListUser()" class="btn btn-danger">Retour à la liste des
                        utilisateurs</button>
                </div>
            </form>
        </div>


    </div>
</div>

<script>
    window.addEventListener("successMessage",event=>{
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