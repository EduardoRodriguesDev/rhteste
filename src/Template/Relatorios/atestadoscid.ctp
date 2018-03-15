<?= $this->Html->script('controller/relatorios.atestadoscid.js', ['block' => 'scriptBottom']) ?>
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content">
                        <?= $this->Flash->render() ?>
                        <h4 class="card-title">Buscar</h4>
                        <?php
                        echo $this->Form->create("CID", [
                            "url" => [
                                "controller" => "relatorios",
                                "action" => "atestadoscid"
                            ],
                            'type' => 'get',
                            "role" => "form"]);
                        ?>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <?= $this->Form->label("funcionario", "Funcionário") ?>
                                        <?= $this->Form->hidden("funcionario", ["id" => "id_funcionario"]) ?>
                                        <?= $this->Form->text("nome_funcionario", ["id" => "nome_funcionario", "class" => "form-control", "maxlength" => 80]) ?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <?= $this->Form->label("empresa", "Empresa") ?> <br/>
                                        <?=$this->Form->select('empresa', $empresas, ['empty' => 'Todos', 'class' => 'form-control'])?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group form-group-min">
                                        <?= $this->Form->label("tipo_funcionario", "Tipo de Funcionário") ?> <br/>
                                        <?=$this->Form->select('tipo_funcionario', $tipos_funcionarios, ['empty' => 'Todos', 'class' => 'form-control'])?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group form-group-min">
                                        <?= $this->Form->label("exibir", "Exibir") ?> <br/>
                                        <?=$this->Form->select('exibir', $combo_exibir, ['class' => 'form-control'])?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-min">
                                        <?= $this->Form->label("mostrar", "Mostrar") ?> <br/>
                                        <?=$this->Form->select('mostrar', $combo_mostra, ['class' => 'form-control'])?>
                                        <span class="material-input"></span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="form-group form-button">
                                <button type="submit" onclick="return validar()" class="btn btn-fill btn-success pull-right">Buscar<div class="ripple-container"></div></button>
                                <a href="<?= $this->Url->build(['controller' => 'Relatorios', 'action' => 'imprimirempresassatestados', '?' => $data]) ?>" target="_blank" class="btn btn-fill btn-default pull-right">Imprimir<div class="ripple-container"></div></a>
                            </div>
                            <?php echo $this->Form->end(); ?>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-content table-responsive">
                        <h4 class="card-title">Relatório</h4>
                        <table class="table">
                            <thead class="text-primary">
                                <tr>
                                    <th>CID</th>
                                    <th>Nome</th>
                                    <th>Quantidade</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($item = $relatorio->fetch(PDO::FETCH_OBJ)) : ?>
                                    <tr>
                                        <td><?=$item->cid?></td>
                                        <td><?=$item->descricao?></td>
                                        <td><?=$item->atestados?></td>
                                        <td class="td-actions text-right" style="width: 12%">
                                            <a href="<?= $this->Url->build(['controller' => 'Relatorios', 'action' => 'funcionariosempresa']) ?>" title="Detalhes Sobre o CID" class="btn btn-rose btn-round">
                                                <i class="material-icons">info</i>
                                            </a>
                                            <a href="<?= $this->Url->build(['controller' => 'Relatorios', 'action' => 'atestadosfuncionario', $item->cid, '?' => $data]) ?>" title="Ver Atestados" class="btn btn-info btn-round">
                                                <i class="material-icons">content_paste</i>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
