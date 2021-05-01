<!doctype html>
<html lang="it">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="script/bootstrap.bundle.min.js"></script>
    <title>Dashboard - Cliente</title>
</head>
<body class="text-center">
<style>
    body {
        font-size: .875rem;
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    /*
     * Sidebar
     */

    .sidebar {
        position: fixed;
        top: 0;
        /* rtl:raw:
        right: 0;
        */
        bottom: 0;
        /* rtl:remove */
        left: 0;
        z-index: 100; /* Behind the navbar */
        padding: 48px 0 0; /* Height of navbar */
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    @media (max-width: 767.98px) {
        .sidebar {
            top: 5rem;
        }
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto; /* Scrollable contents if viewport is shorter than content. */
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #727272;
    }

    .sidebar .nav-link.active {
        color: #007bff;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    /*
     * Navbar
     */

    #disabled {
        background-color: rgb(33, 37, 41);
    }

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    .navbar .navbar-toggler {
        top: .25rem;
        right: 1rem;
    }

    .navbar .form-control {
        padding: .75rem 1rem;
        border-width: 0;
        border-radius: 0;
    }

    .form-control-dark {
        color: #fff;
        background-color: rgba(255, 255, 255, .1);
        border-color: rgba(255, 255, 255, .1);
    }

    .form-control-dark:focus {
        border-color: transparent;
        box-shadow: 0 0 0 3px rgba(255, 255, 255, .25);
    }

</style>
<?php
session_start();
require ('connessione.php');

$query = "  SELECT t.id,t.data_invio_richiesta,t.data_fine_stimata,p.nome,d.marca,d.modello,s.titolo
            FROM ticket_intervento as t, dispositivo as d, cliente as c, stato_intervento as s, pda as p
            WHERE t.id_pda=p.username 
            AND t.id_dispositivo=d.id
            AND t.id_stato_intervento=s.id
            AND d.id_cliente=c.username
            AND c.username='{$_SESSION["username_cliente"]}'
            AND NOT t.id_stato_intervento=3
            ORDER BY data_fine_stimata ASC";

$result = mysqli_query($connessione, $query);

mysqli_close($connessione);
?>
<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Centro Riparazioni</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <input id="disabled" class="form-control form-control-dark w-100" type="text" placeholder="" aria-label="" disabled>
    <ul class="navbar-nav px-3">
        <li class="nav-item text-nowrap">
            <a class="nav-link" href="login-cliente.php">Esci dall'account</a>
        </li>
    </ul>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="dashboard-cliente.php">
                            <span data-feather="home"></span>
                            I miei ticket
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="dashboard-ticket-chiusi-cliente.php">
                            <span data-feather="closed-ticket"></span>
                            Ticket chiusi
                        </a>
                    </li>
                </ul>

            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?php echo "Benvenuto " . $_SESSION['nome_cliente'] . " " . $_SESSION['cognome_cliente'] . "!";?></h1>
                <div class="btn-toolbar mb-2 mb-md-0">
                    <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@getbootstrap">+ Crea un ticket</button>
                    <?php include 'html/modale-aggiungi-ticket-cliente.php' ?>
                </div>
            </div>

            <h2>I miei ticket</h2>
            <div class="table-responsive">
                <table class="table table-striped table-sm">
                    <thead>
                    <tr>
                        <th>Ticket ID</th>
                        <th>Data invio richiesta</th>
                        <th>Data fine stimata</th>
                        <th>Marca</th>
                        <th>Modello</th>
                        <th>PDA Riferimento</th>
                        <th>Stato</th>
                        <th>Altro</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <?php
                        if (mysqli_num_rows($result) == 0)
                        {
                            ?>
                            <h2>Non sono presenti ticket.</h2>
                            <?php
                        }
                        else
                        {
                        while($row = mysqli_fetch_array($result))
                        {
                        ?>
                        <td><?php echo $row['id'];?></td>
                        <td><?php echo $row['data_invio_richiesta'];?></td>
                        <td><?php echo $row['data_fine_stimata'];?></td>
                        <td><?php echo $row['marca'];?></td>
                        <td><?php echo $row['modello'];?></td>
                        <td><?php echo $row['nome'];?></td>
                        <td>
                            <?php
                            switch($row['titolo'])
                            {
                                case "IN CODA":
                                    ?><span class="badge bg-warning"><?php echo $row['titolo']?></span>
                                    <?php break;
                                case "IN_RIPARAZIONE":
                                case "APERTO":
                                    ?><span class="badge bg-primary"><?php echo $row['titolo']?></span>
                                    <?php break;
                            }
                            ?>
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <form action="dettagli-ticket-cliente.php" method="post">
                                    <input name="id_ticket" value="<?php echo $row['id']?>" hidden/>
                                    <button class="btn btn-primary btn-sm" type="submit">Dettagli</button>
                                </form>
                                <?php
                                if($row['titolo']=="IN CODA")
                                {
                                    ?>
                                <form action="elimina-ticket-cliente.php" method="post">
                                    <input name="id_ticket" value="<?php echo $row['id']?>" hidden/>
                                    <button class="btn btn-danger btn-sm" type="submit">Elimina</button>
                                </form>
                                <?php
                                }
                                ?>
                            </div>
                        </td>
                    </tr>
                    <?php
                    }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
</body>
</html>