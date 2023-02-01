<?php include 'layout-top.php' ?>


<form method='POST' action='<?=route('usuarios/salvar')?>'>

<label>
    Nome
    <input type="text" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label>
    Data de nascimento
    <input type="text" name="dataNascimento" value="<?=_v($data,"dataNascimento")?>" >
</label>

<label>
    Ativado
    <input type="hidden" name="ativado" value="0">
    <input type="checkbox" name="ativado" value="1" <?=_v($data,"ativado") == 1 ? 'checked' : '' ?> >
</label>

<label>
    Tipo
    <select name="tipo">
        <?php
        foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == 1 ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
        }
        ?>
    </select>
</label>

<button class='btn btn-primary'>Salvar</button>
<a class='btn btn-secondary' href="<?=route("usuarios")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Data de nascimento</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("usuarios/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['dataNascimento']?></td>
            <td>
                <a href='<?=route("usuarios/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>