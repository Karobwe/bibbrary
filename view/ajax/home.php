<?php include_once 'utilities/functions.php'?>

<div class="dashboard row pt-5">
    <nav class="col-2">
        <ul class="nav flex-column">
            <li class="nav-item border">
                <a class="nav-link" href="">Emprunter</a>
            </li>
            <li class="nav-item border">
                <a class="nav-link" href="">En cours</a>
            </li>
        </ul>
    </nav>

    <main class="col-10">
        <div class="constainer row">
            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Books <span class="badge badge-pill text-dark bg-light"><?= $datas['books'] ?></span>
            </button>

            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Customers <span class="badge badge-pill text-dark bg-light"><?= $datas['customers'] ?></span>
            </button>

            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Authors <span class="badge badge-pill text-dark bg-light"><?= $datas['authors'] ?></span>
            </button>

            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Librarians <span class="badge badge-pill text-dark bg-light"><?= $datas['librarians'] ?></span>
            </button>

            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Publisher <span class="badge badge-pill text-dark bg-light"><?= $datas['publishers'] ?></span>
            </button>

            <button type="button" class="btn btn-danger disabled col-12 col-md-3 col-lg my-2 mx-5">
                Loans <span class="badge badge-pill text-dark bg-light"><?= $datas['loans'] ?></span>
            </button>
        </div>
    </main>
</div>
