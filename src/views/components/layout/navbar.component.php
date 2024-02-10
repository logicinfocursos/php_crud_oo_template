<?php

function navbar()
{ ?>

    <nav class="navbar navbar-expand-lg bg-light mb-5">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">logicinfo</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="/home">home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/about">sobre nós</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

<?php }