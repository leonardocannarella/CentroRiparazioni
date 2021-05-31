<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Registrazione - PDA</title>
    <link rel="icon" href="icon/tools-icon.svg" sizes="any" type="image/svg+xml">
</head>
<body class="text-center">
<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5;
    }

    .form-signin {
        width: 100%;
        max-width: 600px;
        padding: 15px;
        margin: auto;
    }

</style>

<main class="form-signin">
    <form action="registrazione-reindirizzamento.php" method="post">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-tools" viewBox="0 0 16 16"><path d="M1 0 0 1l2.2 3.081a1 1 0 0 0 .815.419h.07a1 1 0 0 1 .708.293l2.675 2.675-2.617 2.654A3.003 3.003 0 0 0 0 13a3 3 0 1 0 5.878-.851l2.654-2.617.968.968-.305.914a1 1 0 0 0 .242 1.023l3.356 3.356a1 1 0 0 0 1.414 0l1.586-1.586a1 1 0 0 0 0-1.414l-3.356-3.356a1 1 0 0 0-1.023-.242L10.5 9.5l-.96-.96 2.68-2.643A3.005 3.005 0 0 0 16 3c0-.269-.035-.53-.102-.777l-2.14 2.141L12 4l-.364-1.757L13.777.102a3 3 0 0 0-3.675 3.68L7.462 6.46 4.793 3.793a1 1 0 0 1-.293-.707v-.071a1 1 0 0 0-.419-.814L1 0zm9.646 10.646a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708zM3 11l.471.242.529.026.287.445.445.287.026.529L5 13l-.242.471-.026.529-.445.287-.287.445-.529.026L3 15l-.471-.242L2 14.732l-.287-.445L1.268 14l-.026-.529L1 13l.242-.471.026-.529.445-.287.287-.445.529-.026L3 11z"/></svg>
        <h1>Registrazione PDA</h1>
        <p class="h3 mb-3 fw-normal">Compila i campi con i tuoi dati</p>
        <p>* Compila i campi obbligatori</p>

        <div class="row align-items-md-stretch" style="margin-bottom: 5%;">
            <div class="col-md-12">
                <label for="nome_pda" class="form-label">Nome *</label>
                <input type="name" class="form-control" id="nome_pda" name="nome_pda" placeholder="Il nome dell'attività" required>
            </div>
        </div>

        <div class="row align-items-md-stretch" style="margin-bottom: 5%;">
            <div class="col-md-12">
                <label for="citta_pda" class="form-label">Città *</label>
                <input type="phone" class="form-control" id="citta_pda" name="citta_pda" placeholder="La città dell'attività" required>
            </div>
        </div>

        <div class="row align-items-md-stretch" style="margin-bottom: 5%;">
            <div class="col-md-12">
                <label for="username" class="form-label">Nome utente *</label>
                <input type="username" class="form-control" id="username" name="username" placeholder="Il tuo username" required>
            </div>
        </div>
        <div class="row align-items-md-stretch" style="margin-bottom: 5%;">
            <div class="col-md-6">
                <label for="password" class="form-label">Password *</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="col-md-6">
                <label for="password1" class="form-label">Ripeti Password *</label>
                <input type="password" class="form-control" id="password1" name="password1" placeholder="Ripeti Password" required>
            </div>
        </div>

        <input type="text" name="pda" value="pda" hidden />

        <button class="w-100 btn btn-lg btn-primary" type="submit">Registrati</button>
        <br><br>
        <a href="index.html">Torna alla pagina iniziale</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2021</p>
    </form>
</main>
</body>
</html>