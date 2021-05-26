<?php
require ('connessione.php');
$query1 = "  SELECT * FROM pda WHERE attivo = 1 ORDER BY citta";
$result1 = mysqli_query($connessione, $query1);
mysqli_close($connessione);

require ('connessione.php');
$query2 = "  SELECT * FROM tipologia_dispositivo";
$result2 = mysqli_query($connessione, $query2);
mysqli_close($connessione);

?>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Crea un nuovo ticket</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
            </div>
            <div class="modal-body">
                <form action="./aggiungi-ticket-cliente-query.php" method="post">
                    <h5>Centro Riparazioni di riferimento</h5>
                    <div class="mb-3">
                        <select class="form-select" name="centro_assistenza" id="centro_assistenza" required>
                            <option value=""></option>
                            <?php
                            while($row1 = mysqli_fetch_array($result1))
                            {
                                ?>
                                <option value="<?php echo $row1['username'];?>"><?php echo $row1['nome'] . " - " . $row1['citta'];?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>

                    <h5>Informazioni sul dispositivo</h5>
                    <div class="mb-3">
                        <label for="marca" class="form-label">Marca</label>
                        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca dispositivo" required>
                    </div>
                    <div class="mb-3">
                        <label for="modello" class="form-label">Modello</label>
                        <input type="text" class="form-control" id="modello" name="modello" placeholder="Modello dispositivo" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipologia_dispositivo" class="form-label">Tipologia</label>
                        <select class="form-select" name="tipologia_dispositivo" id="tipologia_dispositivo" required>
                            <option value=""></option>
                            <?php
                            while($row2 = mysqli_fetch_array($result2))
                            {
                                ?>
                            <option value="<?php echo $row2['id'];?>"><?php echo $row2['descrizione'];?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="descrizione_problema" class="form-label">Descrizione problema</label>
                        <textarea class="form-control" id="descrizione_problema" name="descrizione_problema" placeholder="Descrivi il problema del tuo dispositivo" rows="6" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-primary">Crea</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    var exampleModal = document.getElementById('exampleModal')
    exampleModal.addEventListener('show.bs.modal', function (event) {

        var button = event.relatedTarget

        var recipient = button.getAttribute('data-bs-whatever')

        var modalTitle = exampleModal.querySelector('.modal-title')

        modalTitle.textContent = 'Crea un nuovo ticket'
    })
</script>