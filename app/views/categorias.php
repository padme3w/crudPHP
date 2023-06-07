<?php include 'layout-top.php' ?>

<form method='POST' action='<?=route('categorias/salvar/'._v($data,"id"))?>'>

<label>
    Nome da categoria
    <input type="text" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
    Graduação
    <select name="graduacao" class="form-control">
        <?php
        foreach($graduacao as $k=>$graduacao){
            _v($data,"graduacao") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$graduacao</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Gênero
    <select name="genero" class="form-control">
        <?php
        foreach($genero as $k=>$genero){
            _v($data,"genero") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$genero</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Categoria por idade
    <select name="idade" class="form-control">
        <?php
        foreach($idade as $k=>$idade){
            _v($data,"idade") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$idade</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Categoria por peso
    <select name="peso" class="form-control">
        <?php
        foreach($peso as $k=>$peso){
            _v($data,"peso") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$peso</option>";
        }
        ?>
    </select>
</label>

<label class='col-md-6'>
    Kimono
    <select name="kimono" class="form-control">
        <?php
        foreach($kimono as $k=>$kimono){
            _v($data,"kimono") == $k ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$kimono</option>";
        }
        ?>
    </select>
</label>


<button class='btn btn-primary'>Salvar</button>
<a class='btn btn-secondary' href="<?=route("categorias")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome da categoria</th>
        <th>Graduação</th>
        <th>Gênero</th>
        <th>Categoria por idade</th>
        <th>Categoria por peso</th>
        <th>Kimono</th> 
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("categorias/index/{$item['id']}")?>'>Editar</a>
            </td>
            
            <td><?=$item['nome']?></td>

            <td>
                <?php
                    if ($item['graduacao'] == 1){
                        print "Branca/Cinza";
                    }
                ?>
            
                <?php
                    if ($item['graduacao'] == 2){
                        print "Amarela/Laranja/Verde";
                    }
                ?>
            
                <?php
                    if ($item['graduacao'] == 3){
                        print "Azul";
                    }
                ?>

                <?php
                    if ($item['graduacao'] == 4){
                        print "Roxa";
                    }
                ?>
                <?php
                    if ($item['graduacao'] == 5){
                        print "Marrom";
                    }
                ?>
                <?php
                    if ($item['graduacao'] == 6){
                        print "Preta";
                    }
                ?>
            </td>

            <td>
                <?php
                    if ($item['genero'] == 1){
                        print "Feminino";
                    }
                ?>
            
                <?php
                    if ($item['genero'] == 2){
                        print "Masculino";
                    }
                ?>
            </td>

            <td>
                <?php
                    if ($item['idade'] == 1){
                        print "Pré-mirim-1";
                    }
                ?>
            
                <?php
                    if ($item['idade'] == 2){
                        print "Pré-mirim-2";
                    }
                ?>
            
                <?php
                    if ($item['idade'] == 3){
                        print "Mirim";
                    }
                ?>

                <?php
                    if ($item['idade'] == 4){
                        print "Infantil";
                    }
                ?>
                <?php
                    if ($item['idade'] == 5){
                        print "Infanto-juvenil-1";
                    }
                ?>
                <?php
                    if ($item['idade'] == 6){
                        print "Infanto-juvenil-2";
                    }
                ?>
                <?php
                    if ($item['idade'] == 7){
                        print "Juvenil";
                    }
                ?>
                <?php
                    if ($item['idade'] == 8){
                        print "Adulto";
                    }
                ?>
                <?php
                    if ($item['idade'] == 9){
                        print "Master-1-2";
                    }
                ?>
                <?php
                    if ($item['idade'] == 10){
                        print "Master-3";
                    }
                ?>
            </td>

            <td>
                <?php
                    if ($item['peso'] == 1){
                        print "Galo";
                    }
                ?>
            
                <?php
                    if ($item['peso'] == 2){
                        print "Pluma";
                    }
                ?>
            
                <?php
                    if ($item['peso'] == 3){
                        print "Pena";
                    }
                ?>

                <?php
                    if ($item['peso'] == 4){
                        print "Leve";
                    }
                ?>
                <?php
                    if ($item['peso'] == 5){
                        print "Médio";
                    }
                ?>
                <?php
                    if ($item['peso'] == 6){
                        print "Meio-pesado";
                    }
                ?>
                <?php
                    if ($item['peso'] == 7){
                        print "Pesado";
                    }
                ?>
                <?php
                    if ($item['peso'] == 8){
                        print "Super-pesado";
                    }
                ?>
                <?php
                    if ($item['peso'] == 9){
                        print "Pesadíssimo";
                    }
                ?>
            </td>

            <td>
                <?php
                    if ($item['kimono'] == 1){
                        print "GI";
                    }
                ?>
            
                <?php
                    if ($item['kimono'] == 2){
                        print "No-GI";
                    }
                ?>
            </td>

            <td>
                <a href='<?=route("categorias/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>