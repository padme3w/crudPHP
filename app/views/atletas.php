<?php include 'layout-top.php' ?>


<form method='POST' action='<?=route('atletas/salvar')?>'>

<label>
    Nome
    <input type="text" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label>
    Data de nascimento
    <input type="text" name="dataNascimento" value="<?=_v($data,"dataNascimento")?>" >
</label>



<label class='col-md-6'>
    Faixa
    <select name="faixa" class="form-control">
        <?php
        foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
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
        <th>Data de nascimento</th>
        <th>Faixa</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("atletas/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['dataNascimento']?></td>
            <td>
                <?php
                    if ($item['faixa'] == 1){
                        print "branca";
                    }
                ?>
            </td>
            <td>
                <?php
                    if ($item['faixa'] == 2){
                        print "azul";
                    }
                ?>
            </td>
            <td><?php
            if ($item['faixa'] == 3){
                print "roxa";
            }
            ?></td>
            <td><?php
            if ($item['faixa'] == 4){
                print "marrom";
            }
            ?></td>
            <td><?php
            if ($item['faixa'] == 5){
                print "preta";
            }
            ?></td>
            <td>
                <a href='<?=route("atletas/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>