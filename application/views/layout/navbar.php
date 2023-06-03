<nav class="navbar navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LOGO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="<?= base_url('dashboard')?>">Home</a>
                    </li>
                    <?php if($this->session->userdata('role') == USER_ADMIN):?>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Cursos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?= base_url('usuario')?>">Usuários</a>
                        </li>
                        <li class="nav-item log">
                            <a class="nav-link" href="#">Log</a>
                        </li>
                    <?php else: ?>
                        <li class="nav-item log">
                            <a class="nav-link" href="#">Histórico</a>
                        </li>
                        <li class="nav-item log">
                            <a class="nav-link" href="#">Aconselhamento</a>
                        </li>
                    <?php endif; ?>
                </ul>
                <div class="dropdown" id="user-dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <?= $this->session->userdata('nome')?> <span class="nav-role" style="font-size:12px;">(<?= $this->session->userdata('role')?>) </span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Perfil</a></li>
                        <li><a class="dropdown-item" href="#">Configurações</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="<?= base_url('auth/logout')?>">Sair</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>