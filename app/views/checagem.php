<?php include 'layout-top.php' ?>

<form method='POST' action='<?=route('checagem/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Selecione uma categoria
    <select name="categoria" class="form-control">
        <?php
        foreach($categoria as $categoria){
            _v($data,"categoria") == $categoria['nome'] ? $selected='selected' : $selected='';
            print "<option value='{$categoria['nome']}' $selected>{$categoria['nome']}</option>";
        }
        ?>
    </select>
</label>

<button type="submit" class='btn btn-primary'>Buscar</button>

</form>

<table class='table'>

    <tr>
        <th>Nome</th>
        <th>Equipe</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>

            <td><?=$item['nome']?></td>

            <td><?=$item['equipe']?></td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>