<?php include 'layout-top.php' ?>

<form method='POST' action='<?=route('atletas/salvar/'._v($data,"id"))?>'>

<label>
    Nome
    <input type="text" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
    Equipe
    <select name="equipe" class="form-control">
        <?php
        foreach($equipe as $equipe){
            _v($data,"equipe") == $equipe['equipe'] ? $selected='selected' : $selected='';
            print "<option value='{$equipe['equipe']}' $selected>{$equipe['equipe']}</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Categoria
    <select name="categoria" class="form-control">
        <?php
        foreach($categoria as $categoria){
            _v($data,"categoria") == $categoria['nome'] ? $selected='selected' : $selected='';
            print "<option value='{$categoria['nome']}' $selected>{$categoria['nome']}</option>";
        }
        ?>
    </select>
</label>

<button class='btn btn-primary'>Salvar</button>
<a class='btn btn-secondary' href="<?=route("atletas")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Equipe</th>
        <th>Categoria</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("atletas/index/{$item['id']}")?>'>Editar</a>
            </td>

            <td><?=$item['nome']?></td>

            <td><?=$item['equipe']?></td>

            <td><?=$item['categoria']?></td>

            
            <td>
                <a href='<?=route("atletas/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>