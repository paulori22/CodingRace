<body class="w3-light-grey">

<?php $this->load->view('commons/menulateral')?>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">

    <?php $this->load->view('commons/menupagina')?>

    <div class="w3-container w3-content w3-center">
        <div class="w3-container w3-left">
            <?php if ($this->session->flashdata('error') == TRUE): ?>
                <p><?php echo $this->session->flashdata('error'); ?></p>
            <?php endif; ?>
        </div>
        <?php echo validation_errors();?>
        <form class="w3-container w3-light-grey w3-text-black w3-margin" method="post" enctype="multipart/form-data" id="form_novoexercicio">
            <h2 class="w3-center">Novo Exercício</h2>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="exercicio" id="exercicio" type="text" placeholder="Digite o Exercício" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-code"></i></div>
                <div class="w3-container w3-left">
                    <select name="bloom" id="bloom" form="form_novoexercicio">
                        <option value="">Selecione...</option>
                        <option value="1">Lembrar</option>
                        <option value="2">Entender</option>
                        <option value="3">Aplicar</option>
                        <option value="4">Analisar</option>
                        <option value="5">Avaliar</option>
                        <option value="6">Criar</option>
                    </select>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-calendar"></i></div>
                <div class="w3-rest">
                    <input class="w3-input w3-border" name="tipo_exercicio" id="tipo_exercicio" type="number" placeholder="Tipo de Exercício" >
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="opcaoa" id="opcaoa" type="text" placeholder="Opção A" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="opcaob" id="opcaob" type="text" placeholder="Opção B" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="opcaoc" id="opcaoc" type="text" placeholder="Opção C" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="opcaod" id="opcaod" type="text" placeholder="Opção D" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-rest">
                    <textarea class="w3-input w3-border" name="opcaoe" id="opcaoe" type="text" placeholder="Opção E" ></textarea>
                </div>
            </div>

            <div class="w3-row w3-section">
                <div class="w3-col" style="width:50px"><i class="w3-xxlarge fa fa-book"></i></div>
                <div class="w3-container w3-left">
                    <select name="opcao_correta" id="opcao_correta" form="form_novoexercicio">
                        <option value="">Selecione...</option>
                        <option value="A">A</option>
                        <option value="B">B</option>
                        <option value="C">C</option>
                        <option value="D">D</option>
                        <option value="E">E</option>
                    </select>
                </div>
            </div>

            <p class="w3-center">
                <button class="w3-btn w3-section w3-black w3-ripple" type="submit" value="salvar"> Salvar </button>
                <?php if ($this->router->fetch_class() == 'Admin'): ?>
                    <button onclick="location.href='<?php echo base_url('editartopico_admin')."/".$topico;?>'" type="button" class="w3-btn w3-section w3-black w3-ripple"> Cancelar </button>
                <?php elseif ($this->router->fetch_class() == 'Professor'): ?>
                    <button onclick="location.href='<?php echo base_url('editartopico_professor')."/".$topico;?>'" type="button" class="w3-btn w3-section w3-black w3-ripple"> Cancelar </button>
                <?php endif; ?>
            </p>
        </form>

    </div>

