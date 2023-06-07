<?php include 'layout-top.php' ?>

<form method='POST' action='<?=route('equipes/salvar/'._v($data,"id"))?>'>

<label>
    Equipe
    <input type="text" name="equipe" value="<?=_v($data,"equipe")?>" >
</label>

<label>
    Academia
    <input type="text" name="academia" value="<?=_v($data,"academia")?>" >
</label>

<label>
    Professor
    <input type="text" name="professor" value="<?=_v($data,"professor")?>" >
</label>

<button class='btn btn-primary'>Salvar</button>
<a class='btn btn-secondary' href="<?=route("equipes")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Equipe</th>
        <th>Academia</th>
        <th>Professor</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("equipes/index/{$item['id']}")?>'>Editar</a>
            </td>

            <td><?=$item['equipe']?></td>

            <td><?=$item['academia']?></td>

            <td><?=$item['professor']?></td>

           
            <td>
                <a href='<?=route("equipes/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>