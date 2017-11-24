<body class="w3-light-grey">

    <?php if ($this->router->fetch_class() == 'Admin'): ?>
        <?php $this->load->view('commons/menulateral')?>
    <?php endif; ?>

    <!-- !PAGE CONTENT! -->

    <?php if ($this->router->fetch_class() == 'Admin'): ?>
        <div class="w3-main" style="margin-left:300px;margin-top:43px;">
    <?php endif; ?>

    <?php $this->load->view('commons/menupagina')?>

        <div class="<?($this->router->fetch_class() == 'Login') ? 'w3-container w3-left' : 'w3-container w3-center'; ?>">
            <div class="w3-container w3-content w3-center">
                <?php if ($this->session->flashdata('error') == TRUE): ?>
                    <p><?php echo $this->session->flashdata('error'); ?></p>
                <?php endif; ?>
            </div>


            <?php echo validation_errors();?>
            <div class="w3-container w3-content">
                <form class="w3-container w3-light-grey w3-text-black w3-margin" id="form_novousuario" method="post" enctype="multipart/form-data">
                    <h2 class="w3-center">Novo Usuário</h2>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-user"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="nome" id="nome" value="<?php echo set_value('nome'); ?>" type="text" placeholder="Nome" >
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="ra" id="ra" value="<?php echo set_value('ra'); ?>" type="text" placeholder="RA" >
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="email" id="email" value="<?php echo set_value('email'); ?>" type="text" placeholder="Email" >
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-envelope-o"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="confirmar_email" id="confirmar_email" type="text" placeholder="Confirmar Email" >
                        </div>
                    </div>

                    <div class="w3-row w3-section">
                        <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-key"></i></div>
                        <div class="w3-rest">
                            <input class="w3-input w3-border" name="senha" id="senha" type="password" placeholder="Senha" >
                        </div>
                    </div>

                    <?php if ($this->router->fetch_class() == 'Admin'): ?>
                        <div class="w3-row w3-section">
                            <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-code"></i></div>
                            <div class="w3-container w3-left">
                                <select name="tipo_usuario" id="tipo_usuario" form="form_novousuario">
                                    <option value="-1">Selecione...</option>
                                    <option value="0">Administrador</option>
                                    <option value="1">Professor</option>
                                    <option value="2">Aluno</option>
                                </select>
                            </div>
                        </div>
                    <?php endif; ?>

                    <p class="w3-left">
                        <button class="w3-btn w3-section w3-black w3-ripple" type="submit" value="salvar"> Salvar </button>
                        <?php if ($this->router->fetch_class() == 'Admin'): ?>
                            <button onclick="location.href='<?php echo base_url('usuarios_admin');?>'" type="button" class="w3-btn w3-section w3-black w3-ripple">Cancelar</button>
                        <?php else: ?>
                            <button onclick="location.href='<?php echo base_url('Login');?>'" type="button" class="w3-btn w3-section w3-black w3-ripple">Cancelar</button>
                        <?php endif; ?>
                    </p>
                </form>
            </div>

        </div>

