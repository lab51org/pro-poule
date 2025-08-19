<section>
    <header>
        <h5 class="text-danger">Elimina Account</h5>
        <p class="text-muted">
            Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno cancellati permanentemente. Prima di eliminare il tuo account, ti preghiamo di scaricare qualsiasi dato o informazione che desideri conservare.
        </p>
    </header>

    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#confirmUserDeletionModal">
        Elimina Account
    </button>

    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header">
                        <h5 class="modal-title" id="confirmUserDeletionModalLabel">Sei sicuro di voler eliminare il tuo account?</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Una volta eliminato il tuo account, tutte le sue risorse e i suoi dati verranno cancellati permanentemente. Inserisci la tua password per confermare che desideri eliminare permanentemente il tuo account.</p>
                        <div class="mb-3">
                            <label for="password_delete" class="form-label">Password</label>
                            <input id="password_delete" name="password" type="password" class="form-control" placeholder="Password">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                        <button type="submit" class="btn btn-danger">Elimina Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
